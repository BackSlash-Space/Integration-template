<?php

namespace App\Controller;

use App\Entity\Reclamation;
use App\Form\ReclamationType;
use App\Repository\ReclamationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



class ReclamationController extends AbstractController
{
    /**
     * @Route("/reclamation", name="reclamation")
     */
    public function index(): Response
    {
        return $this->render('reclamation/index.html.twig', [
            'controller_name' => 'ReclamationController',
        ]);
    }
    /**
     * @param ReclamationRepository $repository
     * @return Response
     * @Route ("/AfficheReclamation",name="AfficheReclamation")
     */
    public  function Affiche(ReclamationRepository $repository){ //appeler repo
        //$repo=$this->getDoctrine()->getRepository(Classroom::class);//apeler le repository
        $User=$repository->findAll(); // on a recupereée notre objet classroom
        return $this->render('Reclamation/Affiche.html.twig',
            ['Reclamation'=>$User]);
    }
    /**
     * @Route("/supp/{id}",name="d")
     */
    function Delete($id,ReclamationRepository $repository){
        $User=$repository->find($id);
        $em=$this->getDoctrine()->getManager();//acceder a entité manager
        $em->remove($User);//supprimer le classroom selon id
        $em->flush();// refrechir la base de donnée
        return $this->redirectToRoute('AfficheReclamation');
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route ("/AjouteREC",name="AR")
     */
    function Add(Request $request ){
        $Reclamation=new Reclamation();
        $form=$this->createForm(ReclamationType::class,$Reclamation);
        $form->add('Ajouter',SubmitType::class);
        $form->handleRequest($request);//gerer notre requete

        if ($form->isSubmitted()&& $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($Reclamation);
            $em->flush();
            return $this->redirectToRoute('AfficheReclamation');

        }
        return $this->render('Reclamation/Add.html.twig',
            ['form'=>$form->createView()]);
    }

    /**
     * @Route("/Upd/{nom}",name="update")
     */
    function Update(ReclamationRepository $repository,$nom,Request $request){
        $Reclamation=$repository->find ($nom);
        $form=$this->createform(ReclamationType::class,$Reclamation);
        $form->add ('Update',SubmitType::class);
        $form->handleRequest ($request);
        if ($form->isSubmitted ()&& $form->isValid ()){
            $em=$this->getDoctrine ()->getManager ();
            $em->flush ();
            return $this->redirectToRoute ("AfficheReclamation");
        }
        return $this->render ('Reclamation/update.html.twig',
            [
                'f'=>$form->createView ()
            ]);

    }
}
