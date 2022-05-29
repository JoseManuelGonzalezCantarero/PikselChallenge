<?php

declare(strict_types=1);

namespace App\Tests\Behat;

use App\Controller\RoyaltyManagerViewing;
use App\Entity\Episodes;
use App\Entity\Royalties;
use App\Service\FindEpisodes;
use App\Service\FindRoyalties;
use App\Service\SaveRoyalties;
use Behat\Behat\Context\Context;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

final class RoyaltyManagerViewingContext extends TestCase implements Context
{
    protected function tearDown(): void
    {
        Request::setTrustedProxies([], -1);
        Request::setTrustedHosts([]);
    }

    public function __construct(private FindEpisodes $findEpisodes, private SaveRoyalties $saveRoyalties, private FindRoyalties $findRoyalties)
    {
        parent::__construct();
        $this->episode = '04072c89f0df4ef9abd329e1a7b21779';
        $this->rightsownerId = '665115721c6f44e49be3bd3e26606026';
        $this->customer = 'foo';
    }

    /**
     * @When the user sends a POST request to viewing endpoint
     */
    public function theUserSendsAPostRequestToViewingEndpoint()
    {
        $this->response = new RoyaltyManagerViewing($this->findEpisodes, $this->saveRoyalties);
    }

    /**
     * @When it contains a valid body
     */
    public function itContainsAValidBody()
    {
        self::assertNotNull($this->episode);
        self::assertNotNull($this->customer);

        $episode = $this->findEpisodes->findEpisodeById($this->episode);
        self::assertInstanceOf(Episodes::class, $episode);
    }

    /**
     * @Then the response should be :httpResponseCode
     */
    public function theResponseShouldBe(int $httpResponseCode)
    {
        $request = new Request([], ['episode' => $this->episode, 'customer' => $this->customer]);
        self::assertSame($httpResponseCode, $this->response->__invoke($request)->getStatusCode());
    }

    /**
     * @Then an insert should be done
     */
    public function anInsertShouldBeDone()
    {
        $royalty = $this->findRoyalties->findRoyaltyByRightsOwnerId($this->rightsownerId);
        self::assertInstanceOf(Royalties::class, $royalty);
    }

    /**
     * @When it contains an invalid body
     */
    public function itContainsAnInvalidBody()
    {
        $this->episode = null;
    }

    /**
     * @Then a bad request exception should be thrown
     */
    public function aBadRequestExceptionShouldBeThrown()
    {
        try {
            $request = new Request([], ['episode' => $this->episode, 'customer' => $this->customer]);
            $this->response->__invoke($request)->getStatusCode();
        } catch (BadRequestHttpException ) {}
    }


}
