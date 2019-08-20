<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class WelcomeController extends AbstractController{
    /**
     * @Route("/hello", name="hello") 
     */
    public function hello(Request $request)
    {
        $name='mathieu';
        dump($request);
        return $this->render('welcome/hello.html.twig', [
            'name'=>$name,
        ]);

    }
}