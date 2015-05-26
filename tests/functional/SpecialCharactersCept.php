<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('test for text that uses special characters');

$I->amOnPage('/special-characters');

$I->see('Straße', 'p.character');
$I->see('Straße', 'p.html-encoded');

$I->click('Straße', 'a.character');
$I->click('Straße', 'a.html-encoded');
