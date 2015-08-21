<?php

class EventsCest
{

    public function disablingAndEnablingEvents(FunctionalTester $I)
    {
        $I->disableEvents();

        $I->amOnPage('fire-event');
        $I->dontSeeRecord('users', ['email' => 'johndoe@example.com']);

        $I->enableEvents();

        $I->amOnPage('fire-event');
        $I->seeRecord('users', ['email' => 'johndoe@example.com']);
    }

    public function expectEvents(FunctionalTester $I)
    {
        $I->expectEvents('App\Events\TestEvent');
        $I->amOnPage('fire-event');
    }

    public function expectEventsWhenEventsAreDisabled(FunctionalTester $I)
    {
        $I->disableEvents();
        $I->expectEvents('App\Events\TestEvent');
        $I->amOnPage('fire-event');
    }
}
