<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use App\Entity\Product;
use App\Form\ProductType;

class ProductController extends AbstractController
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
     * @Route("/product/creation")
     */
    public function create(Request $request)
    {
            $product=new Product();

        $form = $this->createForm(ProductType::class, $product);
            
        //
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            dump($form->getData());

        }

        return $this->render('product/create.html.twig', 
            ['form' => $form->createView(),]
        );
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
     * @Route ("/product/{page}",requirements={"page"="\d+"})
     */
    public function list($page=1){
        
        $products=$this->products;
       
       $products = array_slice($products, ($page-1)*2 , 2);
           $maxpage=ceil(count($this->products)/2);
           if( $page <= $maxpage){
            return $this->render('product/list.html.twig',[
                'products'=>$products,
                'current_page'=> $page,
                'maxpage'=>$maxpage,
            ]);
            }

            throw $this->createNotFoundException();
        
    }

    /**
     * 
     *
     * @Route("/product/order/{slug}")
     */
    public function order($slug){
        $product=array_filter($this->products,function($product) use ($slug){
            return $product['slug']===$slug;

        });
        $product = array_values($product);
        $product = $product[0];
        
        $this->addFlash('success', 'nous avons pris en compte votre demande');
        
        return $this->redirectToRoute('app_product_list');
    } 

    



   


     /**
      *@Route("/product/{slug}", name="show")
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
     * @Route ("/product.json")
     */
    public function api(){

        return $this->json($this->products);
    }

    
   
    

   
    
}
