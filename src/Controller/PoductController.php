<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PoductController extends AbstractController
{
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
