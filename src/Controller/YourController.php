<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class YourController extends AbstractController
{
    #[Route('/your', name: 'app_your')]
    public function index(): Response
    {
        return $this->render('your/index.html.twig', [
            'controller_name' => 'YourController',
        ]);
    }
}
