<?php

namespace App\Controller;

use App\Entity\News;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class NewsController extends Controller
{
    /**
     * @return Response
     */
    public function index(): Response
    {
        $news = $this->getDoctrine()
            ->getRepository(News::class)
            ->findAll();

        return $this->render('news/index.html.twig', [
            'news' => $news,
        ]);
    }
}
