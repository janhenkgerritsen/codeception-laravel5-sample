<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('submit a form');
$I->amOnPage('/form');
$I->fillField('message', 'My message!');
$I->click('Submit');
$I->seeCurrentUrlEquals('/form/result');
$I->see('My message!');