<?php

namespace App\Controllers;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class Home extends BaseController
{
    public function index()
    {
        $theme = $this->request->getGet('theme'); 
        $backgroundImage = ($theme == 'dark') ? base_url('public/assets/media/auth/bg10-dark.jpg') : base_url('public/assets/media/auth/bg10.jpg');
        return view('login', ['backgroundImage' => $backgroundImage]);
    }
    public function login()
    {
        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user = $userModel->where('email', $email)->where('status', 'Active')->first();
        if ($user && password_verify($password, $user->password)) {
            $userModel->update($user->id, ['last_login' => date('Y-m-d H:i:s')]);
            $session = session ();
            $login_data = [
                'id'            => $user->id,
                'first_name'    => $user->first_name,
                'role'          => $user->role,
                'email'         => $user->email,
                'logged_in'     => true,
                'last_login'    => $user->last_login
            ];
            $session->set ("loggedIn_data", $login_data);
            $session_data = $session->get('loggedIn_data');
            if($session_data['role'] == 'Admin') {
                return redirect()->to('/admin/dashboard');
            } else {
                return redirect()->to('user/dashboard');
            }
        } else {
            return redirect()->to('/')->with('error', 'Invalid email or password');
        }
    }
    public function logout()
    {
        $session = session ();
		$session->destroy ();
		return redirect ()->to ( '/' );
    }
}
