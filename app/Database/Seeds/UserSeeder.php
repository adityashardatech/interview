<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'first_name' => 'Aditya',
            'last_name'  => 'Tiwari',
            'email'      => 'aditya.tiwari@gmail.com',
            'password'   => password_hash('123456', PASSWORD_DEFAULT), 
            'role'       => 'Admin',
            'status'     => 'Active',
            'created_at' => Time::now(),
            'updated_at' => Time::now(),
        ];
        $this->db->table('users')->insert($data);
    }
}
