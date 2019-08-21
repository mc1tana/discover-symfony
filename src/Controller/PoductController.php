<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PoductController extends AbstractController
{
    private $products=[];
    private $rand;
    
    public function __construct(){

        $this->products = [
            ['name'=>' iphone X ', 'slug'=>'iphone-x','description'=>' un iphone de 2017 ','prix'=>' 999 '],
            ['name'=>' iphone R ', 'slug'=>'iphone-xr','description'=>' un iphone de 2018 ','prix'=>' 1099 '],
            ['name'=>' iphone S ', 'slug'=>'iphone-xs','description'=>' un iphone de 2019 ','prix'=>' 1199 ']
        ];
       
    }
    /**
     * @Route ("/product/random")
     */
    public function rand(){
        $rand=array_rand($this->products);
        $random=$this->products[$rand];
        $b=explode(',', implode(',', $random));
        $name=$b[0];
        $slug=$b[1];
        $description=$b[2];
        $prix=$b[3];
     
       return $this->render('product/show.html.twig',[
        'name'=>$name,
        'slug'=>$slug,
        'prix'=>$prix,
        'description'=>$description

    ]);

    }
    /**
     * @Route ("/product")
     */
    public function list(){
        
            
           
            return $this->render('product/list.html.twig',[
                'products'=>$this->products,
            ]);
        
        
    }
     /**
      *@Route("/product/{slug}")
      */
    public function show($slug){
        foreach($this->products as $product){
            if($product['slug']=== $slug){
                

                return $this->render('product/slug.html.twig',[
                    'product'=>$product,
                ]);
            };

        }
        throw $this->createNotFoundException();
        
    }
    /**
     * @Route ("/product/creation")
     */
    public function creat(){

        return $this->render('product/todo.html.twig');
    }
    /**
     * @Route ("/product.json")
     */
    public function api(){

        return $this->json($this->products);
    }
   
    

   
    
}
