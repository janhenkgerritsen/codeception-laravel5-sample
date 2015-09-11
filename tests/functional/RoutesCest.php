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

    public function routesWithTrailingSlashes(FunctionalTester $I)
    {
        $I->amOnPage('/redirect');
        $I->seeCurrentRouteIs('homepage');
    }

}