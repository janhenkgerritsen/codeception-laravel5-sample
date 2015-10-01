<?php

class InternalDomainsCest
{

    public function testExternalDomainThrowsException(FunctionalTester $I)
    {
        try {
            $I->amOnPage('https://www.google.com');
            $I->fail('Visiting an external URL should throw an ExternalUrlException');
        } catch (\Codeception\Exception\ExternalUrlException $ignored) {}
    }

    public function testWithDomain(FunctionalTester $I)
    {
        $I->amOnPage('http://example.com');
        $I->see('Domain route');
    }

    public function testWithSubdomain(FunctionalTester $I)
    {
        $I->amOnPage('http://subdomain.example.com');
        $I->see('Subdomain route');
    }

    public function testWithWildcardInDomain(FunctionalTester $I)
    {
        $I->amOnPage('http://wildcard.example.com');
        $I->see('Wildcard route');
    }

    public function testWithMultipleWildcardsInDomain(FunctionalTester $I)
    {
        $I->amOnPage('http://wild.card.example.com');
        $I->see('Multiple wildcards route');
    }

}
