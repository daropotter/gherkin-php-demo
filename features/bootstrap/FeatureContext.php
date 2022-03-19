<?php

use App\Kernel;
use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use PHPUnit\Framework\Assert;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use Symfony\Component\HttpFoundation\Response;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private Kernel $kernel;
    private Response $response;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->kernel = new Kernel('test', true);
        $this->kernel->boot();
    }

    /**
     * @Given I am an unauthenticated user
     */
    public function iAmAnUnauthenticatedUser()
    {
        // do nothing
    }

    /**
     * @When I send a :method request to :path
     */
    public function iSendRequest(string $method, string $path)
    {
        $this->response = $this->sendRequest($method, $path);
    }

    /**
     * @Then ~^The response code should be (\d+)$~
     */
    public function theResponseCodeShouldBe(int $code)
    {
        Assert::assertSame($code, $this->response->getStatusCode());
    }

    /**
     * @Then The response should be the following JSON:
     */
    public function theResponseShouldBeTheFollowingJson(PyStringNode $jsonResponse)
    {
        Assert::assertSame(json_decode($jsonResponse->getRaw(), true), json_decode($this->response->getContent(), true));
    }

    /**
     * @Then The response should form the following table:
     */
    public function theResponseShouldFormTheFollowingTable(TableNode $table)
    {
        $response = json_decode($this->response->getContent(), true);
        Assert::assertSame($table->getColumnsHash(), $response);
    }


    private function sendRequest(string $method, string $path, ?string $body = null, array $headers = []): Response
    {
        $request = SymfonyRequest::create($path, $method, [], [], [], [], $body);

        array_walk($headers, fn($value, $header) => $request->headers->add([$header => $value]));

//        foreach ($headers as $header => $value) {
//            $request->headers->add([$header => $value]);
//        }

        return $this->kernel->handle($request);
    }

    /**
     * @When /^I am "([^"]*)"$/
     */
    public function iAm($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given /^I am authorised as "([^"]*)"$/
     */
    public function iAmAuthorisedAs($userName)
    {
        $this->loginAs($userName);
    }

}
