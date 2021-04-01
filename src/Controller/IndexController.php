<?php

namespace App\Controller;

use App\Entity\TaskList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $lists = $this->getDoctrine()
        ->getRepository(TaskList::class)
        ->findAll();

        return $this->render('index/index.html.twig', [
            'lists' => $lists
        ]);
    }
}
