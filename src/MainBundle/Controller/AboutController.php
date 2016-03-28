<?php

namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AboutController extends Controller
{
    public function indexAction()
    {
        return $this->render('MainBundle:About:index.html.twig', array(
            // ...
        ));
    }

    public function helloAction($name = '')
    {
        return $this->render('MainBundle:About:hello.html.twig', array(
            'name' => $name
        ));
    }

}
