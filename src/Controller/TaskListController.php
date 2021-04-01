<?php

namespace App\Controller;

use App\Entity\TaskList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class TaskListController extends AbstractController
{
    /**
     * @Route("/task/", name="task_list_list")
     */
    public function list(): Response
    {
        $lists = $this->getDoctrine()
        ->getRepository(TaskList::class)
        ->findAll();

        return $this->render('task_list/index.html.twig', [
            'lists' => $lists
        ]);
    }

    /**
     * @Route("/task/{id}", name="task_list_details")
     */
    public function details($id): Response
    {
        $list = $this->getDoctrine()
        ->getRepository(TaskList::class)
        ->find($id);

        if(is_null($list)){
            throw new NotFoundHttpException("No such Task-list!");
        }

        return $this->render('task_list/tasks.html.twig', [
            'list' => $list
        ]);
    }
}
