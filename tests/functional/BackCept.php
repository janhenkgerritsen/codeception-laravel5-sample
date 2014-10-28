<?php
$I = new FunctionalTester($scenario);
$I->wantTo('redirect back using /back route');
$I->amOnPage('/');
$I->amOnPage('/back');
$I->expect('I am redirected back to /');
$I->seeCurrentUrlEquals('/');