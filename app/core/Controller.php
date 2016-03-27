<?php


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
