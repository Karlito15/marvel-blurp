<?php

namespace KarlitoWeb\Blurp\Controller;

use KarlitoWeb\Blurp\Trait\ControllerTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Class DashboardController
 *
 * @package KarlitoWeb\Blurp\Controller
 */
#[Route(
    path: '/blurp',
    name: 'kw.blurp.dashboard.',
    methods: ['GET'],
    format: 'html',
    utf8: true
)]
final class DashboardController extends AbstractController
{
    use ControllerTrait;

    #[Route(path: '/index.php', name: 'index')]
    public function index(): Response
    {
        // Variables
        $title      = $this->translator->trans('text.homepage');

        return $this->render('@Blurp/dashboard/index.html.twig', [
            'controller_name' => 'Welcome to Blurp',
            'breadcrumb'      => [
                'level1' => $this->translator->trans('text.homepage'),
                'level2' => $title
            ],
            'container'       => 'container-fluid',
        ]);
    }
}
