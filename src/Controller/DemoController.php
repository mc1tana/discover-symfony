<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

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
}
