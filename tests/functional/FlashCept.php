<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('see a flash message');
$I->amOnPage('/flash');
$I->see("It's a flash", ".flash");
