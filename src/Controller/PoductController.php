<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PoductController extends AbstractController
{
    /**
     * 
     *
     * @Route("/product/{page}", name="product", requirements={"page"="\d+"})
     */
    public function list($page){
        return new reponse('<body>liste des produits'.$page.'</body>');
    }
    /** 
     * @Route("/poduct/{slug}", name="poduct_show")
     */
    public function show($slug)
    {
            dump($slug);
            {
                return $this->render('poduct/show.html.twig');
            }
    }
}
