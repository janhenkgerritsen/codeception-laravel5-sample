<?php

use App\User;

class EventsCest
{

    public function disablingModelEvents(FunctionalTester $I)
    {
        $user = User::create([
            'email' => 'john@doe.com',
            'password' => Hash::make('password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);

        User::saving(function ($user) {
            return false;
        });

        $I->disableModelEvents();

        $user->email = 'updated@example.com';
        $user->save();

        $I->seeRecord('users', ['email' => 'updated@example.com']);
    }

    public function disablingEvents(FunctionalTester $I)
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
        $I->seeEventTriggered('App\Events\TestEvent', 'App\Events\OtherTestEvent');
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
