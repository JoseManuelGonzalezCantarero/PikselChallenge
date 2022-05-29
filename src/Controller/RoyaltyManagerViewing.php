<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\FindEpisodes;
use App\Service\SaveRoyalties;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;

#[AsController]
#[Route(path: "/royaltymanager")]
final class RoyaltyManagerViewing extends AbstractController
{
    public function __construct(private readonly FindEpisodes $findEpisodes, private readonly SaveRoyalties $saveRoyalties)
    {
    }

    /**
     * Add tracking info of the customer viewing
     * @Route("/viewing", name="viewing", methods={"POST"})
     *
     * @OA\Tag(name="Viewing")
     *
     * @OA\RequestBody(
     *     description="JSON Payload",
     *     required=true,
     *     @OA\JsonContent(
     *          example={
     *              "episode": "GUID",
     *              "customer": "GUID"
     *          },
     *          @OA\Schema(
     *              type="object",
     *              @OA\Property(property="episode", type="string", description="Episode GUID"),
     *              @OA\Property(property="customer", type="string", description="Customer GUID")
     *          )
     *     )
     * )
     *
     * @OA\Response(response="202", description="Info added correctly")
     * @OA\Response(response="400", description="Bad request")
     */
    public function __invoke(Request $request): JsonResponse
    {
        $requestData = json_decode($request->getContent(), true);

        if (null === $requestData) {
            $requestData = $request->request->all();
        }

        if (empty($requestData['episode']) || empty(['customer'])) {
            throw new BadRequestHttpException('Expecting mandatory parameters!');
        }

        $episode = $this->findEpisodes->findEpisodeById($requestData['episode']);

        if (null === $episode) {
            throw new BadRequestHttpException('Episode not found!');
        }

        $this->saveRoyalties->saveRoyalties($episode);

        return new JsonResponse('', Response::HTTP_ACCEPTED);
    }
}
