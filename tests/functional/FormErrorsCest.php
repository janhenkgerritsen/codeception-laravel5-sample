<?php

class FormErrorsCest
{

    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('/register');
        $I->click('button[type=submit]');
    }

    public function testSeeFormHasErrors(FunctionalTester $I)
    {
        $I->seeFormHasErrors();
    }

    public function testDontSeeFormErrors(FunctionalTester $I)
    {
        $I->amOnPage('');
        $I->dontSeeFormErrors();
    }

    public function testSeeFormErrorMessage(FunctionalTester $I)
    {
        $I->seeFormErrorMessage('name');
        $I->seeFormErrorMessage('name', 'required');
        $I->seeFormErrorMessage('name', 'The name field is required.');
    }

    public function testSeeFormErrorMessages(FunctionalTester $I)
    {
        $I->seeFormErrorMessages(array(
            'name' => null,
            'email' => null,
        ));

        $I->seeFormErrorMessages(array(
            'name' => 'required',
            'email' => 'required',
        ));

        $I->seeFormErrorMessages(array(
            'name' => 'The name field is required.',
            'email' => 'The email field is required.'
        ));
    }

}
