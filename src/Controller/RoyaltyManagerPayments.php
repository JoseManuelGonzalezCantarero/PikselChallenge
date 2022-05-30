<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\FindRoyalties;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;

#[AsController]
#[Route(path: '/royaltymanager')]
final class RoyaltyManagerPayments extends AbstractController
{
    public function __construct(private readonly FindRoyalties $findRoyalties)
    {
    }

    /**
     * Get all payments
     * @Route("/payments", name="get_all_payments", methods={"GET"})
     *
     * @OA\Tag(name="Payments")
     * @OA\Response(
     *     response="200",
     *     description="Response body",
     *     @OA\JsonContent(
     *          type="object",
     *          @OA\Property(property="rightsownerId", type="string"),
     *          @OA\Property(property="rightsowner", type="string"),
     *          @OA\Property(property="royalty", type="float"),
     *          @OA\Property(property="viewings", type="integer"),
     *     )
     * )
     */
    public function getAllPayments(): JsonResponse
    {
        $payments = $this->findRoyalties->findAllRoyalties();
        return new JsonResponse($payments, Response::HTTP_OK);
    }

    /**
     * Get a payment, given its rightsownerId
     * @Route("/payments/{rightsownerId}", name="get_payment", methods={"GET"})
     *
     * @OA\Tag(name="Payments")
     * @OA\Response(
     *     response="200",
     *     description="Response body",
     *     @OA\JsonContent(
     *          type="object",
     *          @OA\Property(property="rightsownerId", type="string"),
     *          @OA\Property(property="rightsowner", type="string"),
     *          @OA\Property(property="royalty", type="float"),
     *          @OA\Property(property="viewings", type="integer"),
     *     )
     * )
     * @OA\Response(response="404", description="RightsownerId not found!")
     */
    public function getPayment(string $rightsownerId): JsonResponse
    {
        $royalty = $this->findRoyalties->findRoyaltyByRightsOwnerId($rightsownerId);

        if (null === $royalty) {
            throw new NotFoundHttpException('RightsownerId not found!');
        }

        $data = [
            'rightsownerId' => $royalty->getRightsownerId(),
            'rightsowner' => $royalty->getRightsowner(),
            'royalty' => $royalty->getRoyalty().' GBP',
            'viewings' => $royalty->getViewings()
        ];

        return new JsonResponse($data, Response::HTTP_OK);
    }
}
