<?php

class RoutesCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function openPageByRoute(FunctionalTester $I)
    {
        $I->amOnRoute('posts.index');
        $I->seeCurrentUrlEquals('/posts');
        $I->seeCurrentActionIs('App\Http\Controllers\PostsController@index');
    }

    public function openPageByAction(FunctionalTester $I)
    {
        $I->amOnAction('App\Http\Controllers\PostsController@index');
        $I->seeCurrentUrlEquals('/posts');
        $I->seeCurrentRouteIs('posts.index');
    }
}