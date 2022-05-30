<?php

declare(strict_types=1);

namespace App\Tests\Behat;

use App\Controller\RoyaltyManagerPayments;
use App\Service\FindRoyalties;
use Behat\Behat\Context\Context;
use PHPUnit\Framework\TestCase;

final class RoyaltyManagerPaymentsContext extends TestCase implements Context
{
    public function __construct(private readonly FindRoyalties $findRoyalties)
    {
        parent::__construct();
    }

    /**
     * @When the user sends a GET request to the payments endpoint
     */
    public function theUserSendsAGetRequestToThePaymentsEndpoint(): void
    {
        $this->response = new RoyaltyManagerPayments($this->findRoyalties);
    }

    /**
     * @Then the response should be :httpResponseCode
     */
    public function theResponseShouldBe(int $httpResponseCode): void
    {
        self::assertEquals($httpResponseCode, $this->response->getAllPayments()->getStatusCode());
    }

    /**
     * @Then I should have a Json body
     */
    public function iShouldHaveAJsonBody(): void
    {
        self::assertJson($this->response->getAllPayments()->getContent());
    }

    /**
     * @When the user sends a GET request to the payment endpoint
     */
    public function theUserSendsAGetRequestToThePaymentEndpoint(): void
    {
        $this->response = new RoyaltyManagerPayments($this->findRoyalties);
    }

    /**
     * @Then the response should be :httpResponseCode using :rightsownerId as rightsownerId
     */
    public function theResponseShouldBeUsingAsRightsownerid(int $httpResponseCode, string $rightsownerId): void
    {
        self::assertEquals($httpResponseCode, $this->response->getPayment($rightsownerId)->getStatusCode());
    }
}
