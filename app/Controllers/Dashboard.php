<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class Dashboard extends BaseController
{
    use ResponseTrait;
    public function __construct() {
        $this->uri = service('uri');
    }
    public function index()
    {
        $session        = session();
        $session_data   = $session->get('loggedIn_data');
        $role           = ucfirst($session_data['role']);
        $userModel      = new UserModel();
        $userCount      = $userModel->countAll();
        $lastFiveUsers  = $userModel->orderBy('created_at', 'DESC')->findAll(5);
        return view('admin/dashboard', ['title' => "$role Dashboard", 'userCount' => $userCount, 'lastFiveUsers' => $lastFiveUsers]);
    }
    public function userDashboard()
    {
        $session        = session();
        $session_data   = $session->get('loggedIn_data');
        $role           = ucfirst($session_data['role']);
        return view('user/dashboard', ['title' => "$role Dashboard"]);
    }
}
