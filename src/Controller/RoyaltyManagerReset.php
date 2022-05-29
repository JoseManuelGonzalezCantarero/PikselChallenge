<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\DeleteRoyalties;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Attributes as OA;

#[AsController]
#[Route(path: '/royaltymanager')]
final class RoyaltyManagerReset extends AbstractController
{
    public function __construct(private DeleteRoyalties $deleteRoyalties)
    {
    }

    /**
     * Reset the internal state of the system
     */
    #[Route(path: '/reset', name: 'reset', methods: ['POST'])]
    #[OA\Tag(name: 'Reset')]
    #[OA\Response(response: 202, description: 'Reset operation done')]
    public function __invoke(): JsonResponse
    {
        $this->deleteRoyalties->resetTable();
        return new JsonResponse('', 202);
    }
}
