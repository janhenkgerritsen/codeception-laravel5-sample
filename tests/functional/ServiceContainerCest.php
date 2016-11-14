<?php

class ServiceContainerCest
{
    public function testHaveBinding(FunctionalTester $I)
    {
        $I->haveBinding('App\Test\StringConverter', 'App\Test\ToUppercase');

        $I->amOnPage('service-container');
        $I->seeElement("//p[text()='STRING TO CONVERT']");
    }

    public function testHaveSingleton(FunctionalTester $I)
    {
        $I->haveSingleton('App\Test\StringConverter', 'App\Test\ToUppercase');

        $I->amOnPage('service-container');
        $I->seeElement("//p[text()='STRING TO CONVERT']");
    }

    public function testHaveInstance(FunctionalTester $I)
    {
        $converter = new \App\Test\ToUppercase();
        $I->haveInstance('App\Test\StringConverter', $converter);

        $I->amOnPage('service-container');
        $I->seeElement("//p[text()='STRING TO CONVERT']");
    }

    public function testHaveContextualBinding(FunctionalTester $I)
    {
        $I->haveContextualBinding('App\Test\Repeat', '$times', 3);
        $I->haveBinding('App\Test\StringConverter', 'App\Test\Repeat');

        $I->amOnPage('service-container');
        $I->seeElement("//p[text()='String To ConvertString To ConvertString To Convert']");
    }

}
