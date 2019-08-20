<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class DemoController extends AbstractController
{
    /**
     * @Route("/urls")
     */
    public function urlgenerate()
    { //permet de generer dans abstract controller une url à partir du nom d'une route
        $url=$this->generateUrl('hello');
        dump($url);
        
    }
        /**
     * @Route("/redirect")
     */
    public function redirection()
    {
       return $this->redirectToRoute('hello');
    }
        /**
     * @Route("/notfound")
     */
    public function notfound()
    {
        throw $this->createNotFoundException();
    }

    
    
    /**
     * @Route("/voir-session" , name="show_session")
     */
    public function showSession(SessionInterface $session)
    {
        $name=$session->get('name');
        dump($name);
        return new Response("nom session :".$name);
    }
     /**
     * @Route("/mettre-en-session/{name}", name="put_session")
     */
    public function putSession(SessionInterface $session, $name)
    {
       $session->set('name', $name);
       return new Response("nom session :".$name);
        
    }
}
