<?php

namespace App\Controllers;

class signin extends BaseController {
    public function index(){
        return view('Signin/signin');
    }
    public function login(){
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $model = new \App\Models\UserModel;
        $user = $model->where('username', $username)->first();


        if ($user === null){
            return redirect()->back()->withInput()->with('errors', ['wrong Username or password ']);
        }
        else{
            if(password_verify($password, $user->hash_password)){
                if(! $user->is_active){
                    return redirect()->back()->with('errors', [ "Activate the user"]);
                }
                $session = session();
                $session->set('user_id', $user->id);

                return redirect()->to('/task')->with('info', 'user is loged in');
            }else{
                return redirect()->back()->with('errors', [ "wrong username or password"]);
            }
        }
    }
    public function logout(){
        session()->destroy();
        return redirect()->to('/'); 
    }
}