<?php

require_once '../vendor/autoload.php';
require_once '/core/app.php';
require_once '/core/Controller.php';
require_once '/core/View.php';
foreach (glob("/core/controllers/*.php") as $filename)
{
    require_once $filename;
}



?>