<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\DeleteRoyalties;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Attributes as OA;

#[AsController]
#[Route(path: '/royaltymanager')]
final class RoyaltyManagerReset extends AbstractController
{
    public function __construct(private readonly DeleteRoyalties $deleteRoyalties)
    {
    }

    /**
     * Reset the internal state of the system
     */
    #[Route(path: '/reset', name: 'reset', methods: ['POST'])]
    #[OA\Tag(name: 'Reset')]
    #[OA\Response(response: Response::HTTP_ACCEPTED, description: 'Reset operation done')]
    public function __invoke(): JsonResponse
    {
        $this->deleteRoyalties->resetTable();
        return new JsonResponse('', Response::HTTP_ACCEPTED);
    }
}
