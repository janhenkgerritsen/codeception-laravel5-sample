<?php

class RecordCest
{
    protected $userAttributes = [
        'email' => 'johndoe@example.com',
        'password' => 'password',
        'created_at' => '',
        'updated_at' => ''
    ];

    public function testHaveRecordWithTableName(FunctionalTester $I)
    {
        $id = $I->haveRecord('users', $this->userAttributes);

        $I->seeRecord('users', ['id' => $id, 'email' => 'johndoe@example.com']);
        $I->dontSeeRecord('users', ['id' => $id, 'email' => 'janedoe@example.com']);
    }

    public function testHaveRecordWithModel(FunctionalTester $I)
    {
        $user = $I->haveRecord('App\User', $this->userAttributes);

        $I->seeRecord('App\User', ['id' => $user->id, 'email' => 'johndoe@example.com']);
        $I->dontSeeRecord('App\User', ['id' => $user->id, 'email' => 'janedoe@example.com']);
    }

    public function testGrabRecordWithTableName(FunctionalTester $I)
    {
        $I->haveRecord('App\User', $this->userAttributes);

        $record = $I->grabRecord('users', ['email' => 'johndoe@example.com']);

        $I->assertTrue(is_array($record));
    }

    public function testGrabRecordWithModel(FunctionalTester $I)
    {
        $I->haveRecord('App\User', $this->userAttributes);

        $model = $I->grabRecord('App\User', ['email' => 'johndoe@example.com']);

        $I->assertTrue($model instanceof App\User);
    }
}
