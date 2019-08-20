<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
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
    public function show($slug, LoggerInterface $logger)
    {       
            // je fait un log avec le service monolog
            $logger->info('je log un truck '.$slug);
            dump($slug);
            {
                return $this->render('poduct/show.html.twig');
            }
    }
}
