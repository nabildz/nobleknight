<?php

namespace noble\Controllers;
Use View as View;
use Illuminate\Database\Eloquent\Model as Eloquent;
class Controller
{


    public function view($viewName, $data)
    {
		
        $view = new View($viewName, $data);
        echo $view;
    }

 
    public function model($model)
    {
        require_once '../app/models/' . ucfirst($model) . '.php';
        return new $model();
    }
}
