<?php

use App\User;

class ModelFactoryCest
{
    public function testHave(FunctionalTester $I)
    {
        $user = $I->have(User::class, ['email' => 'johndoe@example.com']);

        $I->assertEquals('johndoe@example.com', $user->email);
        $I->seeRecord('users', ['email' => 'johndoe@example.com']);
    }

    public function testHaveWithName(FunctionalTester $I)
    {
        $I->have(User::class, [], 'admin');
    }

    public function testHaveMultiple(FunctionalTester $I)
    {
        $users = $I->haveMultiple(User::class, 3);

        $I->assertEquals(3, count($users));
    }
}
