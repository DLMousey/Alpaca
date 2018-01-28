<?php

namespace App\Controller;

use Framework\Controller\BaseController;

class HomeController extends BaseController
{
    public function index($message)
    {
        die(dump($message));
        echo 'Home controller index action';
    }

    public function message($id)
    {
        return $this->view('index.tpl.php');
    }

    public function forumIndex()
    {
        echo 'Home controller forumIndex action';
    }
}