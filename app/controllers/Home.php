<?php


class Home extends Controller
{
   
      public function index($name = 'fares', $mood = 'happy')
    {
        $user = $this->model('user');
        $user->name = $name;


        $this->view('home/index', [
            'name' => $user->name,
            'mood' => $mood,
            'page' => "home"
        ]);
    }
    public function test()
    {
        echo "test";
    }
}


