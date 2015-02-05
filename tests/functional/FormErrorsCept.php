<?php
$I = new FunctionalTester($scenario);
$I->wantTo('test session errors');

$I->amOnPage('/auth/register');
$I->click('button[type=submit]');

$I->seeCurrentUrlEquals('/auth/register');
$I->seeFormHasErrors();
$I->seeFormErrorMessage('name', 'The name field is required.');
$I->seeFormErrorMessages(array(
    'name' => 'The name field is required.',
    'email' => 'The email field is required.'
));
