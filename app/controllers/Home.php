<?php
namespace noble\Controllers;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as DBase;                         
class Home extends Controller
{
   
      public function index($name)
    {

        $this->view('home/index', [
            'name' => 'home',
            'mood' => 'home',
            'page' => "home",
        ]);
    }
    public function test()
    {
      $this->view('home/insert',[]);
    }
    public function showtest($data)
    {
    $insert= DBase::table('studets')->insert(
    array('name' =>$_POST['name'])
);
    if($insert)
    {
        echo "done";
    }
    }
}


