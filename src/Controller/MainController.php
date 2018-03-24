<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class MainController extends Controller
{
    /**
     * @return Response
     */
    public function home(): Response
    {
        return $this->render('home.html.twig');
    }

    /**
     * @return Response
     */
    public function where(): Response
    {
        return $this->render('where.html.twig');
    }

    /**
     * @return Response
     */
    public function program(): Response
    {
        return $this->render('program.html.twig');
    }

    /**
     * @return Response
     */
    public function details(): Response
    {
        return $this->render('details.html.twig');
    }

    /**
     * @return Response
     */
    public function answer(): Response
    {
        return $this->render('answer.html.twig');
    }

    /**
     * @return Response
     */
    public function contact(): Response
    {
        return $this->render('contact.html.twig');
    }
}
