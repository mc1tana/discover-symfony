<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class WelcomeController{
    /**
     * @Route("/hello", name="hello") 
     */
    public function hello(Request $request)
    {
        $name='mathieu';
        dump($request);
        return new Response('<body>slt '.$name.'</body>');

    }
}