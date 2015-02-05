<?php
$I = new FunctionalTester($scenario);
$I->wantTo('submit a form');
$I->amOnPage('/form');
$I->fillField('message', 'My message!');
$I->click('Submit');

$I->see('Your message: My message!');

$I->fillField('message', 'Another message!');
$I->click('Submit');

$I->see('Your message: Another message!');
