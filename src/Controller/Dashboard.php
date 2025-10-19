<?php

namespace Blurp\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Class DashboardController
 *
 * @package KarlitoWeb\Layouts\Controller
 */
#[Route(path: '/blurp/dashboard', name: 'blurp.dashboard.', methods: ['GET'], format: 'html', utf8: true)]
final class Dashboard extends AbstractController
{
    #[Route(path: '/index.php', name: 'index')]
    public function index(): Response
    {
        return $this->render('@App/dashboard/index.html.twig', [
            'controller_name' => 'Welcome to Blurp',
        ]);
    }
}
