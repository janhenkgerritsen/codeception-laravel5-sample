<?php
$I = new FunctionalTester($scenario);
$I->wantTo('login as a user');

$I->haveRecord('users', [
    'email' =>  'john@doe.com',
    'password' => bcrypt('password'),
    'created_at' => new DateTime(),
    'updated_at' => new DateTime(),
]);

$I->amOnPage('/login');
$I->fillField('email', 'john@doe.com');
$I->fillField('password', 'password');
$I->click('button[type=submit]');

$I->seeCurrentUrlEquals('');
$I->amOnPage('/posts');
$I->seeAuthentication();
$I->see('Logged in as john@doe.com');