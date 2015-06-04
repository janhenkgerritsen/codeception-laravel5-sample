<?php

class HelpersCest
{

    public function routeBeforeRequest(FunctionalTester $I)
    {
        $I->assertEquals('http://myapp.com/posts', route('posts.index'));
    }

    public function routeAfterRequest(FunctionalTester $I)
    {
        $I->amOnRoute('posts.index');
        $I->assertEquals('http://myapp.com/posts', route('posts.index'));
    }

}