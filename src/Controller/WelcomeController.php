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
    /** 
     * @Route("/hello/{name}", name="hello_user",  requirements={"name"="[A-Z]{3,8}"}) 
     */
    public function helloUser(string $name="tout le monde"){
        
        $na=lcfirst ( $name );
        return $this->render('welcome/hello.html.twig',[
            'name'=>$na,
        ]);
        // , requirements="name"="[A-Z]{3-8}"
    }
}