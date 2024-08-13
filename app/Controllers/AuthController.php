<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function login()
    {
        return view('signIn');
    }
    public function authenticate()
    {
        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first(); 
        if ($user && password_verify($password, $user['password'])) {
            $this->setUserSession($user);
            return redirect()->to('/');
        } else {
            return redirect()->back()->with('error', 'Email atau password salah');
        }
    }

    private function setUserSession($user)
    {
        $sessionData = [
            'user_id' => $user['id_magang'],
            'email' => $user['email'],
            'logged_in' => true
        ];
        session()->set($sessionData);
    }

    public function signUp()
    {
        return view('signUp');
    }
    public function tambahUser()
    {

        $userModel = new UserModel();

        if ($this->request->getMethod() == 'POST') {
            $aturan = [
                'Nama' => [
                    'label' => 'Nama lengkap',
                    'rules' => 'required|min_length[3]|max_length[255]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'min_length' => '{field} minimal 3 karakter.',
                        'max_lentgh' => '{field} maksimal 255 karakter'
                    ]
                ],
                'asal_institusi' => [
                    'label' => 'Asal institusi',
                    'rules' => 'required',
                    'errors' => '{field} harus diisi'
                ],
                'Jenis_kelamin' => [
                    'label' => 'Jenis kelamin',
                    'rules' => 'required',
                    'errors' => '{field} harus dipilih'
                ],
                'Nomor_telepon' => [
                    'label' => 'Nomor telepon',
                    'rules' => 'required',
                    'errors' => '{field} harus diisi'
                ],
                'email' => [
                    'label' => 'Email',
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'valid_email' => 'Email tidak valid'
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required|min_length[8]|regex_match[/(?=.*[0-9])(?=.*[\W])/]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'min_length' => 'Password minimal 8 karakter terdiri dari huruf, angka dan karakter spesial(@,#,!,?,dll) ',
                        'regex_match' => 'Password harus terdiri dari huruf, angka dan karakter spesial(@,#,!,?,dll).'
                    ]
                ],
                'alamat ' => [
                    'label' => 'Alamat',
                    'rules' => 'required',
                    'errors' => '{field} harus diisi'
                ]
            ];

            if ($this->validate($aturan)) {
                $dataUser = [
                    'Nama' => $this->request->getPost('Nama'),
                    'asal_institusi' => $this->request->getPost('asal_institusi'),
                    'Jenis_kelamin' => $this->request->getPost('Jenis_kelamin'),
                    'Nomor_telepon' => $this->request->getPost('Nomor_telepon'),
                    'email' => $this->request->getPost('email'),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                    'alamat' => $this->request->getPost('alamat'),
                    'role' => 'user',

                ];

                if ($userModel->save($dataUser)) {
                    return redirect()->to('/login')->with('message', 'Data berhasil disimpan');
                } else {
                    $data['eror'] = 'Terjadi kesalahan saat menyimpan data';
                }
            } else {
                $data['validation'] = $this->validator;
            }

            $data['user_Data'] = $userModel->findAll();

            echo view('/signUp', $data);
        }
    }
}
