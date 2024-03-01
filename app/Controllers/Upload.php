<?php

namespace App\Controllers;

class Upload extends BaseController
{
    public function index(): string
    {
        return view('uploads/uploadpage');
    }

    public function image() {
        if(session()->has('user_id')){
        $file = $this->request->getFile('image');
        if (! $file->isValid()){
            $errors = $file->getError();
            if ($errors == UPLOAD_ERR_NO_FILE){
                return redirect()->back()->with('warning', ['no file uploaded']);
            }
            throw new \RuntimeException($file->getErrorString(). " " . $errors );
        }

        $size = $file->getSizeByUnit('mb');

        if($size > 2){
            return redirect()->back()->with('warning', ['file is too large']);
        }

        $type = $file->getMimeType();
        if (! in_array($type, ['image/png', 'image/jpeg', 'image/jpg'])){
            return redirect()->back()->with('warning', ['only images are accepted']);
        }

        $filePath = $file->store('profile');
        $model =  new \App\Models\UserModel;
        $user = $model->find(session('user_id'));
        $user-> profile_url = $file->getName();
        $model->save($user);


    }
    else{
        return redirect()->to('/signin');
    }
}
    public function view(){
        if(session()->has('user_id')){
            $model = new \App\Models\UserModel;
            $user = $model->find(session('user_id'));
            $fileName = $user->profile_url;
            $path = WRITEPATH .'uploads/profile/' . $fileName;
            $sfinfo = new \finfo(FILEINFO_MIME);
            $type = $sfinfo->file($path);
            header("Content-Type:$type");
            readfile($path);
            exit;
        }else{
            return redirect()->to('/signin');
        }
    }
    public function display(){
        return view('Uploads/view');
    }
}
