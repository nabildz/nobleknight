<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as DBase;                         

class Admin extends Controller
{

  public function index($name = 'nabil', $mood = 'normal')
    {
        $user = $this->model('user');
        $user->name = $name;


        $this->view('home/index', [
            'name' => $user->name,
            'mood' => $mood,
            'page' => "Admin"
        ]);
    }

      public function test()
    {

         $users = DBase::table('studets')->get();


//print_r($users);
for ($i=0; $i < 3; $i++) { 
    echo "---------";
    echo "<br>";
    echo $users[$i]['id'] ."    |    ". $users[$i]['name'];
    echo "<br>";
}

    }

    public function search($id)
    {

         $user = DBase::table('studets')->find($id);
         

//echo $user['name'];
$this->view('home/search', [
            'name' => $user['name'],
        ]);


    }


}


