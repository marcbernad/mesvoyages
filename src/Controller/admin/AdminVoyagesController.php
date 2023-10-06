<?php

namespace App\Controller\admin;

use App\Repository\VisiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Description of AdminVoyagesController
 *
 * @author marcb
 */
class AdminVoyagesController extends AbstractController {
    
    /**
     * @Route("/admin", name="admin.voyages")
     * @return Response
     */
    public function index(): Response{
        $visites = $this->repository->findAllOrderBy('datecreation', 'DESC');
        return $this->render("admin/admin.voyages.html.twig", [
            'visites' => $visites
        ]);
    }
    
    /**
     * 
     * @var VisiteRepository
     */
    private VisiteRepository $repository;
    
    /**
     * 
     * @param VisiteRepository $repository
     */
    public function __construct(VisiteRepository $repository) {
        $this->repository = $repository;
    }
    
    /**
     * @Route("/admin/suppr/{id}", name="admin.voyage.suppr")
     * @param int $id
     * @return Response
     */
    public function suppr(int $id): Response{
        $visite = $this->repository->find($id);
        $this->repository->remove($visite, true);
        return $this->redirectToRoute('admin.voyages');
    }

    
}
