<?php
namespace App\Controller;

use App\Entity\Destination;
use App\Repository\DestinationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

    class AfficherDestinationController extends AbstractController {
        private $repository;
        /**
         * @var ObjectManager
         */
        private $em;

        /**
         * AfficherDestinationController constructor.
         * @param $repository
         * @param $em
         */
        public function __construct(DestinationRepository $repository, EntityManagerInterface $em)
        {
            $this->repository = $repository;
            $this->em = $em;
        }


        /**
         * @Route  ("/AfficherDestinations" , name="AfficherDestinations")
         * @return Response

         */


    public function index():Response
    {
      $destinations = $this->repository->findAll();

    return $this->render('pages/AfficherDestinations.html.twig', [
        'destinations' => $destinations,
        'current_menu' => 'destination'
        ]);
    }

        /**
         * @Route  ("/AfficherDestinations/{slug}-{id}" , name="destination.show" , requirements={"slug" : "[a-z0-9\-]*" })
         * @return Response
         */

    public function show(Destination $destination , string $slug) : Response
    {
        if ($destination->getSlug() !== $slug){
            return $this->redirectToRoute('destination.show', [
                'id' => $destination->getId(),
                'slug' =>$destination->getSlug()
            ], 301);
        }

        return $this->render('destination/show.html.twig', [
            'destination'=>$destination,
            'current_menu' => 'destinations'
        ]);

    }

}