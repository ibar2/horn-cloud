<?php

namespace App\Controllers;

class Task extends Basecontroller{
    public function index(){
        if (session()->has('user_id')){
            $model = new \App\Models\TaskModel;
            $all = $model->where('user_id', session('user_id'))->findAll();
            return view('Task/task', ['tasks'=>$all]);
        }else{
            return redirect()->to('/signin');
        }
    }

    public function create(){
        if (session()->has('user_id')){
            $model = new \App\Models\TaskModel;
            $data =  $this->request->getPost('description');
            $user_id = session('user_id');
            $result = $model->insert([ 'descripsion' => $data, 'user_id' => $user_id]);
            if ($result === false){
                return redirect()->back()->with('errors', $model->errors());
            }
            else {
                return redirect()->to('/task');
            }
    }else{
        return redirect()->to('/signin');
    }
    }

    public function delete($id){
        $model = new \App\Models\TaskModel;
        $data = $model->find($id);
        return view('Task/delete', ['task'=>$data]);
    }

    public function yes($id){
        $model = new \App\Models\TaskModel;
        $data = $model->find($id);
        $model->delete($id);
        return redirect()->to('/task')->with('info', 'Deleted successfully');
    }
    public function edit($id){
        $model = new \App\Models\TaskModel;
        $data = $model->find($id);
        return view('Task/Edit', ['task'=>$data]);
    }
    public function update($id){
        $model = new \App\Models\TaskModel;
        $data =  $this->request->getPost('descripsion');
        $result = $model->update($id, [ 'descripsion' => $data]);
        if ($result === false){
            return redirect()->back()->with('errors', $model->errors());
        }
        else {
            
            return redirect()->to("/task")->with('info', 'Sucessfuly updated');
        }
    }
}