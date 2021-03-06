<?php
namespace App\Controller;

use App\Entity\VoyageVirtuelle;
use App\Repository\VoyageVirtuelleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VoyageVirtuelleController extends AbstractController {
    /**
     * @var VoyageVirtuelleRepository
     */
    private $repository;
    /**
     * @var EntityManagerInterface
     */
    private $em;


    /**
     * VoyageVirtuelleController constructor.
     */
    public function __construct(VoyageVirtuelleRepository $repository , EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }


    /**
     * @Route ("/VoyageVirtuelle" , name="VoyageVirtuelle.index")
     * @return Response
     */
    public function index():Response{

        $voyageVirtuelles = $this->repository->findAll();
        return $this->render('VoyageVirtuelle/index.html.twig' , [
            'voyageVirtuelles' => $voyageVirtuelles,
            'current_menu' => 'voyagevirtuelle'
        ]);
    }
}