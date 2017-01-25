<?php

use App\User;

class DatabaseSeederCest
{
    public function firstTest(SeederTester $I)
    {
        $I->assertCount(1, User::all());
    }

    public function secondTest(SeederTester $I)
    {
        $I->assertCount(1, User::all());
    }
}
