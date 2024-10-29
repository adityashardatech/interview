<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class Usermanagement extends BaseController
{
    public function index()
    {
        $client     = \Config\Services::curlrequest();
        $response   = $client->get(base_url('api/users/list'));
        if ($response->getStatusCode() == 200) {
            $data = json_decode($response->getBody(), true);
            $data['title'] = 'Dashboard - Users List';
            //echo "<pre>"; print_r($data); die;
            return view('admin/users/list', $data);
        } else {
            return view('error_page', ['message' => 'Failed to load users list']);
        }
    }
}
