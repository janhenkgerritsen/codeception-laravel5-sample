<?php
$I = new FunctionalTester($scenario);
$I->wantTo('test form error assertions');

$I->amOnPage('/auth/register');
$I->click('button[type=submit]');

$I->seeCurrentUrlEquals('/auth/register');
$I->seeFormHasErrors();
$I->seeFormErrorMessage('name', 'The name field is required.');
$I->seeFormErrorMessages(array(
    'name' => 'The name field is required.',
    'email' => 'The email field is required.'
));

$I->fillField('name', 'John Doe');
$I->fillField('email', 'johndoe@example.com');
$I->fillField('password',  'password');
$I->fillField('password_confirmation',  'password');
$I->click('button[type=submit]');

$I->dontSeeFormErrors();