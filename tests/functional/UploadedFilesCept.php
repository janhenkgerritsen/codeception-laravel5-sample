<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('upload a file');
$I->amOnPage(''); // Necessary to prevent LogicException with message "The page history is empty".
$I->sendPOST('upload', [], ['file' => codecept_data_dir('logo.jpg')]);
$I->see('Success');