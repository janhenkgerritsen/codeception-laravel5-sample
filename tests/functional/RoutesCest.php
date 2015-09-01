<?php

class RoutesCest
{

    public function openPageByRoute(FunctionalTester $I)
    {
        $I->amOnRoute('posts.index');
        $I->seeCurrentUrlEquals('/posts');
        $I->seeCurrentActionIs('PostsController@index');
    }

    public function openPageByAction(FunctionalTester $I)
    {
        $I->amOnAction('PostsController@index');
        $I->seeCurrentUrlEquals('/posts');
        $I->seeCurrentRouteIs('posts.index');
    }

    public function openRouteWithDomainSpecified(FunctionalTester $I)
    {
        $I->amOnRoute('domain');
        $I->seeResponseCodeIs(200);
        $I->see('Domain route');
    }

    public function routesWitTrailingSlashes(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->seeCurrentRouteIs('homepage');

        $I->amOnRoute('homepage');
        $I->seeCurrentRouteIs('homepage');

        $I->amOnPage('/posts');
        $I->seeCurrentRouteIs('posts.index');

        $I->amOnRoute('posts.index');
        $I->seeCurrentRouteIs('posts.index');
    }

}