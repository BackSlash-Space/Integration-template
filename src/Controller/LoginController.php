<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Form\UserType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function index(): Response
    {
        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController',
        ]);
    }

    /**
     * @param UserRepository $repository
     * @return Response
     * @Route ("/Afficheclient",name="AfficheClient")
     */
    public  function Affiche(UserRepository $repository){ //appeler repo
        //$repo=$this->getDoctrine()->getRepository(Classroom::class);//apeler le repository
        $User=$repository->findAll(); // on a recupereée notre objet classroom
        return $this->render('login/Affiche.html.twig',
            ['User'=>$User]);
    }
    /**
     * @Route("/supp/{id}",name="d")
     */
    function Delete($id,UserRepository $repository){
        $User=$repository->find($id);
        $em=$this->getDoctrine()->getManager();//acceder a entité manager
        $em->remove($User);//supprimer le classroom selon id
        $em->flush();// refrechir la base de donnée
        return $this->redirectToRoute('AfficheClient');
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route ("/InscrireC",name="A")
     */
    function Add(Request $request ){
        $User=new User();
        $form=$this->createForm(UserType::class,$User);
        $form->add('Ajouter',SubmitType::class);
        $form->handleRequest($request);//gerer notre requete

        if ($form->isSubmitted()&& $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($User);
            $em->flush();
            return $this->redirectToRoute('AfficheClient');

        }
        return $this->render('Login/Add.html.twig',
            ['form'=>$form->createView()]);
    }

    /**
     * @Route("/Update/{id}",name="U")
     */
  function Update(UserRepository $repository,$id,Request $request){
      $User=$repository->find ($id);
      $form=$this->createform(UserType::class,$User);
      $form->add ('Update',SubmitType::class);
      $form->handleRequest ($request);
      if ($form->isSubmitted ()&& $form->isValid ()){
          $em=$this->getDoctrine ()->getManager ();
          $em->flush ();
          return $this->redirectToRoute ("AfficheClient");
      }
      return $this->render ('Login/Update.html.twig',
      [
          'f'=>$form->createView ()
      ]);

  }
}
