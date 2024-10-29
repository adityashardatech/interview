<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class UserApiController extends BaseController
{
    use ResponseTrait;
    public function __construct() {
        $this->uri = service('uri');
    }
    public function usersList()
    {
        $userModel = new UserModel();
        $userCount = $userModel->countAll();
        $users_list = $userModel->orderBy('created_at', 'DESC')->findAll();
        $data = [
            'userCount' => $userCount,
            'users_list' => $users_list
        ];
        return $this->respond($data);
    }
    public function createUser()
    {
        $validation = \Config\Services::validation();
        $id = $this->request->getPost('id');
        $userModel = new UserModel();
        $emailRule = 'required|valid_email' . (empty($id) ? '|is_unique[users.email]' : '|is_unique[users.email,id,{id}]');
        $validation->setRules([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         =>  'required',
            'password'      => 'required|min_length[6]',
            'role'          => 'required|in_list[Admin,Customer]',
            'status'        => 'required|in_list[Active,Inactive]',
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return $this->respondCreated(['status' => 400, $validation->getErrors()]);
        } else {
            $data = [
                'first_name' => $this->request->getPost('first_name'),
                'last_name'  => $this->request->getPost('last_name'),
                'email'      => $this->request->getPost('email'),
                'password'   => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'role'       => $this->request->getPost('role'),
                'status'     => $this->request->getPost('status'),
                'created_at' => date('Y-m-d H:i:s')
            ];
            if($id > 0) {
                unset($data['created_at']);
                $data['updated_at'] = date('Y-m-d H:i:s');
                $updateStatus = $userModel->update($id, $data);
                if ($updateStatus) {
                    return $this->respondCreated(['status' => 200, 'message' => 'Record Updated Successfully']);
                } else {
                    return $this->respondCreated(['status' => 400, 'message' => 'Record could not be updated']);
                }
            } else {
                $insertedId = $userModel->save($data);
                if($insertedId > 0) {
                    return $this->respondCreated(['status' => 200, 'message' => 'Records Created Successfully']);
                } else {
                    return $this->respondCreated(['status' => 400, 'message' => 'Records could not be created']);
                }
            }
        }
    }
    public function deleteUser()
    {
        $id = $this->request->getPost('id');
        $userModel = new UserModel();
        if ($userModel->delete($id)) {
            return $this->respondDeleted(['status' => 200, 'message' => 'User soft deleted successfully']);
        } else {
            return $this->respond(['status' => 400, 'message' => 'Failed to soft delete user'], 400);
        }
    }
    public function getRecords()
    {
        $id = $this->request->getPost('id');
        $userModel = new UserModel();
        $data = $userModel->getSingleRecord($id);
        if($data) {
            return $this->response->setJSON($data);
        } else {
            return $this->response->setJSON(['error' => 'Record not found']);
        }
    }
}
