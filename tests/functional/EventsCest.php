<?php

class EventsCest
{

    public function disablingAndEnablingEvents(FunctionalTester $I)
    {
        $I->disableEvents();

        $I->amOnPage('fire-event');
        $I->dontSeeRecord('users', ['email' => 'johndoe@example.com']);
    }

    public function seeEventTriggered(FunctionalTester $I)
    {
        $I->amOnPage('fire-event');
        $I->seeEventTriggered('App\Events\TestEvent');
    }

    public function seeEventTriggeredWithMultipleEvents(FunctionalTester $I)
    {
        $I->amOnPage('fire-event');
        $I->seeEventTriggered('App\Events\TestEvent', 'kernel.handled');
    }

    public function seeEventTriggeredWithEventObject(FunctionalTester $I)
    {
        $I->amOnPage('fire-event');
        $I->seeEventTriggered(new \App\Events\TestEvent());
    }

    public function seeEventTriggeredWhenEventsAreDisabled(FunctionalTester $I)
    {
        $I->disableEvents();

        $I->amOnPage('fire-event');
        $I->seeEventTriggered('App\Events\TestEvent');
    }

    public function dontSeeEventTriggered(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->dontSeeEventTriggered('App\Events\TestEvent');
    }

    public function dontSeeEventTriggeredWithEventObject(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->dontSeeEventTriggered(new \App\Events\TestEvent());
    }
}
