<?php

namespace App\Controller;

use App\Entity\ReservationHotel;
use App\Form\ResHotelType;
use App\Repository\ReservationHotelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReshotelController extends AbstractController
{
    /**
     * @Route("/reshotel", name="reshotel")
     */
    public function index(): Response
    {
        return $this->render('reshotel/index.html.twig', [
            'controller_name' => 'ReshotelController',
        ]);
    }
    /**
     * @param ReservationHotelRepository $repository
     * @return Response
     * @Route ("/AfficheReservationHotel",name="AfficheReservationHotel")
     */
    public  function Affiche(ReservationHotelRepository $repository){ //appeler repo
        //$repo=$this->getDoctrine()->getRepository(Classroom::class);//apeler le repository
        $ReservationHotel=$repository->findAll(); // on a recupereée notre objet classroom
        return $this->render('reshotel/Affiche.html.twig',
            ['ReservationHotel'=>$ReservationHotel]);
    }
    /**
     * @Route("/supp/{id}",name="d")
     */
    function Delete($id,ReservationHotelRepository $repository){
        $ReservationHotel=$repository->find($id);
        $em=$this->getDoctrine()->getManager();//acceder a entité manager
        $em->remove($ReservationHotel);//supprimer le classroom selon id
        $em->flush();// refrechir la base de donnée
        return $this->redirectToRoute('AfficheReservationHotel');
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route ("/AjouterResHotel",name="ARH")
     */
    function Add(Request $request ){
        $ReservationHotel=new ReservationHotel();
        $form=$this->createForm(ResHotelType::class,$ReservationHotel);
        $form->add('Ajouter',SubmitType::class);
        $form->handleRequest($request);//gerer notre requete

        if ($form->isSubmitted()&& $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($ReservationHotel);
            $em->flush();
            return $this->redirectToRoute('AfficheReservationHotel');

        }
        return $this->render('reshotel/Add.html.twig',
            ['form'=>$form->createView()]);
    }

    /**
     * @Route("/Update/{id}",name="U")
     */
    function Update(ReservationHotelRepository $repository,$id,Request $request){
        $ResHotel=$repository->find ($id);
        $form=$this->createform(reshotelType::class,$ResHotel);
        $form->add ('Update',SubmitType::class);
        $form->handleRequest ($request);
        if ($form->isSubmitted ()&& $form->isValid ()){
            $em=$this->getDoctrine ()->getManager ();
            $em->flush ();
            return $this->redirectToRoute ("AfficheReservationHotel");
        }
        return $this->render ('reshotel/Update.html.twig',
            [
                'f'=>$form->createView ()
            ]);

    }
}
