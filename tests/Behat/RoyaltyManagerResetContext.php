<?php

declare(strict_types=1);

namespace App\Tests\Behat;

use App\Controller\RoyaltyManagerReset;
use App\Service\DeleteRoyalties;
use App\Service\FindRoyalties;
use Behat\Behat\Context\Context;
use PHPUnit\Framework\TestCase;

final class RoyaltyManagerResetContext extends TestCase implements Context
{
    public function __construct(private DeleteRoyalties $deleteRoyalties, private FindRoyalties $findRoyalties)
    {
        parent::__construct();
        $this->rightsownerId = '665115721c6f44e49be3bd3e26606026';
    }

    /**
     * @When the user sends a POST request to reset endpoint
     */
    public function theUserSendsAPostRequestToResetEndpoint()
    {
        $this->response = new RoyaltyManagerReset($this->deleteRoyalties);
    }

    /**
     * @Then the response should be :httpResponseCode
     */
    public function theResponseShouldBe(int $httpResponseCode)
    {
        self::assertSame($httpResponseCode, $this->response->__invoke()->getStatusCode());
    }

    /**
     * @Then the royalties table should be clean
     */
    public function theRoyaltiesTableShouldBeClean()
    {
        $royalty = $this->findRoyalties->findRoyaltyByRightsOwnerId($this->rightsownerId);
        self::assertSame(null, $royalty);
    }
}
