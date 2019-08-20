<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class WelcomeController{

    public function hello()
    {
        $name='mathieu';
        return new Response('slt '.$name);
    }
}