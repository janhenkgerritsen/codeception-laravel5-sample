<?php
$I = new FunctionalTester($scenario);

$I->haveApplicationHandler(function($app) {
    $app->make('config')->set(['test_value' => 10]);
});
$I->sendGET('/test-value');
$I->see('Test value is 10');

$I->haveApplicationHandler(function($app) {
    $app->make('config')->set(['test_value' => 15]);
});
$I->sendGET('/test-value');
$I->see('Test value is 15');

$I->clearApplicationHandlers();
$I->sendGET('/test-value');
$I->see('Test value is 5'); // 5 is the default value
