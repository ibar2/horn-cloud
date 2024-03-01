<?php

namespace App\Controllers;

class signup extends BaseController {
    public function index(){
        return view('Signup/signup');
    }
    public function create(){
        $userEntity = new \App\Entities\User($this->request->getPost());
        $model = new \App\Models\UserModel;
        $userEntity->hash_save();
        $user = $model->insert($userEntity);
        $this->send_activation($userEntity);
        if ($user){
            return redirect()->to('task');  
        }
        else {
            return redirect()->back()->with('errors', $model->errors());
        }
        

    }

    public function activate($token){
        $model = new \App\Models\UserModel;
        $hash = hash_hmac('sha256', $token, 'SJuK4kjDzBwzQdz6uDg68D939Yl3zbzX' );
        $user = $model->where('hash_activate', $hash)->first();
        if ($user){
            $user-> is_active = true;
            $user-> hash_activate = null;
            $model->save($user);
            echo 'activation success';
        }else {
            echo 'activation failed';
        }

    }

    private function send_activation($user){
        $email = service('email');
        $email->setTo($user->email);
        $email->setSubject('testing email');
        $message = view('Signup/activation', ['token' => $user->token]);
        $email->setMessage($message);

        if($email->send()){
            return redirect()->to('/');
        }else {
            echo $email->printDebugger();
        }
    }
}