<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Client;
use App\Form\AjoutClientType;
use Symfony\Component\HttpFoundation\Request;

class AjoutClientController extends AbstractController
{
    /**
     * @Route("/ajout", name="ajout")
     */
    public function index(Request $request)
    {
        $client = new Client();

        $form = $this->createForm(AjoutClientType::class,$client);

        if ($request->isMethod('POST')) {            
            $form->handleRequest($request);            
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($client);
                $em->flush();    

                $this->addFlash('notice', 'Client inséré');

            }
            return $this->redirectToRoute('ajout');
        }        

        return $this->render('ajout_client/index.html.twig', [
            'form'=>$form->createView()
        ]);
    }

}
