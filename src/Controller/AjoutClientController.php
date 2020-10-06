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

    /**
     * @Route("/liste", name="liste")
     */
    public function listeClients(Request $request)
    {
        $em = $this->getDoctrine();
        $repoClient = $em->getRepository(Client::class);   

        $clients = $repoClient->findBy(array(),array('nomClient'=>'ASC'));
        return $this->render('client/liste_clients.html.twig', [
           'clients'=>$clients
        ]);
    }


      /**
     * @Route("/modif/{id}", name="modif", requirements={"id"="\d+"})
     */
    public function modifClient(int $id, Request $request)
    {
        $em = $this->getDoctrine();
        $repoClient = $em->getRepository(Client::class);
        $client = $repoClient->find($id);

        if($client==null){
            $this->addFlash('notice', "Ce client n'existe pas");
            return $this->redirectToRoute('liste_client');
        }

        $form = $this->createForm(ModifClientType::class,$theme);

        if ($request->isMethod('POST')) {            
            $form->handleRequest($request);            
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($client);
                $em->flush();    

                $this->addFlash('notice', 'client modifié');

            }
            return $this->redirectToRoute('liste_client');
        }        

        return $this->render('client/modif_client.html.twig', [
            'form'=>$form->createView()
        ]);
    }


}
