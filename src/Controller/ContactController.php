<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactType;
use App\Entity\Contact;



class ContactController extends AbstractController{
     /** 
      * @Route("/contact")
     */
    public function contact(Request $request,\Swift_Mailer $mailer)
        {
                $contact=new Contact();

            $form = $this->createForm(ContactType::class, $contact);
                
            //
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){
                
                $this->addFlash('success', 'nous avons pris en compte votre demande'.$contact->getEmail());
                
               
                    $message = (new \Swift_Message('Hello Email'))
                        ->setFrom('michel-cardon@laposte.net')
                        ->setTo('recipient@example.com')
                        ->setBody(
                           'mon mess'
                        
                
                       
                        )
                    ;
                
                    $mailer->send($message);
                    return $this->redirectToRoute('app_contact_contact');
                
                  
                }
                return $this->render('contact.html.twig', 
                ['form' => $form->createView(),]
            );
            }

            
            }           
        


