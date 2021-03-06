<?php

namespace App\Controller;

use App\Entity\Hotel;
use App\Form\HotelType;
use App\Repository\HotelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HotelControllerlerController extends AbstractController
{
    /**
     * @Route("/hotel", name="hotel")
     */
    public function index(): Response
    {
        return $this->render('hotel_controllerler/index.html.twig', [
            'controller_name' => 'HotelControllerlerController',
        ]);
    }
    /**
     * @param HotelRepository $repository
     * @return Response
     * @Route ("/AfficheHotel",name="AH")
     */
    public  function Affiche(HotelRepository $repository){ //appeler repo
        //$repo=$this->getDoctrine()->getRepository(Classroom::class);//apeler le repository
        $Hotel=$repository->findAll(); // on a recupereée notre objet classroom
        return $this->render('Hotel_controllerler/Affiche.html.twig',
            ['Hotel'=>$Hotel]);
    }
    /**
     * @Route("/supp/{id}",name="d")
     */
    function Delete($id,HotelRepository $repository){
        $Hotel=$repository->find($id);
        $em=$this->getDoctrine()->getManager();//acceder a entité manager
        $em->remove($Hotel);//supprimer le classroom selon id
        $em->flush();// refrechir la base de donnée
        return $this->redirectToRoute('AH');
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route ("/AjouterHotel",name="AjouterH")
     */
    function Add(Request $request ){
        $Hotel= new Hotel();
        $form=$this->createForm(HotelType::class,$Hotel);
        $form->add('Ajouter',SubmitType::class);
        $form->handleRequest($request);//gerer notre requete

        if ($form->isSubmitted()&& $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($Hotel);
            $em->flush();
            return $this->redirectToRoute('AH');

        }
        return $this->render('Hotel_controllerler/Add.html.twig',
            ['form'=>$form->createView()]);
    }

    /**
     * @Route("/Update/{id}",name="U")
     * @param HotelRepository $repository
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    function Update(HotelRepository $repository,$id,Request $request){
        $Hotel=$repository->find ($id);
        $form=$this->createform(HotelType::class,$Hotel);
        $form->add ('Update',SubmitType::class);
        $form->handleRequest ($request);
        if ($form->isSubmitted ()&& $form->isValid ()){
            $em=$this->getDoctrine ()->getManager ();
            $em->flush ();
            return $this->redirectToRoute ("AH");
        }
        return $this->render ('Hotel_controllerler/Update.html.twig',
            [
                'f'=>$form->createView ()
            ]);

    }
}
