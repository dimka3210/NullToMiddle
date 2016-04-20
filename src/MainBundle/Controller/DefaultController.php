<?php

namespace MainBundle\Controller;

use MainBundle\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        /** @var PostRepository $manager */
        $repository = $this->getDoctrine()->getRepository('MainBundle:Post');
        $models = $repository->findBy([], ['dateCreated' => 'DESC'], 20);

        return $this->render('MainBundle:Default:index.html.twig', ['models' => $models]);
    }

    public function loginAction()
    {
        $authenticationUtils = $this->get('security.authentication_utils');
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            'MainBundle:Default:login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $lastUsername,
                'error'         => $error,
            )
        );
    }
}
