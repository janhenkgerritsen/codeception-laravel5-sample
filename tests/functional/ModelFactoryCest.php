<?php

use App\User;

class ModelFactoryCest
{
    public function testHaveModel(FunctionalTester $I)
    {
        $user = $I->haveModel(User::class, ['email' => 'johndoe@example.com']);

        $I->assertEquals('johndoe@example.com', $user->email);
        $I->seeRecord('users', ['email' => 'johndoe@example.com']);
    }

    public function testHaveModelWithName(FunctionalTester $I)
    {
        $I->haveModel(User::class, [], 'admin');
    }

    public function testHaveModelWithCount(FunctionalTester $I)
    {
        $users = $I->haveModel(User::class, [], 'admin', 3);

        $I->assertEquals(3, count($users));
    }

    public function testMakeModel(FunctionalTester $I)
    {
        $user = $I->makeModel(User::class, ['email' => 'johndoe@example.com']);

        $I->assertEquals('johndoe@example.com', $user->email);
        $I->dontSeeRecord('users', ['email' => 'johndoe@example.com']);
    }

    public function testMakeModelWithName(FunctionalTester $I)
    {
        $I->makeModel(User::class, [], 'admin');
    }

    public function testMakeModelWithCount(FunctionalTester $I)
    {
        $users = $I->makeModel(User::class, [], 'admin', 3);

        $I->assertEquals(3, count($users));
    }
}
