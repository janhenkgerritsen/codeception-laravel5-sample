<?php

class SessionCest
{
    public function seeInSession(FunctionalTester $I)
    {
        $I->amOnPage('/session/My%20Message');
        $I->seeInSession('message');
        $I->seeInSession('message', 'My Message');
    }

    public function seeSessionHasValues(FunctionalTester $I)
    {
        $I->amOnPage('/session/My%20Message');
        $I->seeSessionHasValues(['message']);
        $I->seeSessionHasValues(['message' => 'My Message']);
    }
}
