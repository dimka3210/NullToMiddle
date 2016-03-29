<?php

namespace MainBundle\Controller;

use MainBundle\Entity\Post;
use MainBundle\Form\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PostController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('MainBundle:Post');
        $models = $repository->findAll();

        return $this->render('MainBundle:Post:index.html.twig', ['models' => $models]);
    }

    public function newAction(Request $request)
    {
        $model = new Post();
        $form = $this->createForm(PostType::class, $model);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($model);
            $manager->flush();
            return $this->redirect($this->generateUrl('post_index'));
        }

        return $this->render('MainBundle:Post:new.html.twig', ['form' => $form->createView()]);
    }

}