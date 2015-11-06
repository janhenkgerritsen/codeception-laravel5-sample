<?php

class CustomValidationCest
{
    public function testCustomValidationSuccess(FunctionalTester $I)
    {
        $I->amOnPage('validation?postal_code=1234AB');
        $I->see('Validation success');
    }

    public function testCustomValidationError(FunctionalTester $I)
    {
        $I->amOnPage('validation?postal_code=1234');
        $I->seeFormErrorMessage('postal_code');
    }
}
