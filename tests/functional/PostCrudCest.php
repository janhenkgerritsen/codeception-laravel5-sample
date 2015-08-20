<?php

use Page\Functional\PostsPage;

class PostCrudCest
{

    private $postAttributes;

    public function __construct()
    {
        $this->postAttributes = [
            'title' => 'Hello Universe',
            'body' => 'You are so awesome',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ];
    }

    // tests
    public function createPost(FunctionalTester $I, PostsPage $postsPage)
    {
        $postsPage->createPost(['title' => 'Hello world', 'body' => 'And greetings for all']);
        $I->seeCurrentUrlEquals($postsPage::$url);
        $I->see('Hello world', '.table');
    }

    public function createPostValidationFails(FunctionalTester $I, PostsPage $postsPage)
    {
        $postsPage->createPost();
        $I->seeCurrentUrlEquals($postsPage->route('/create'));
        $I->see('The body field is required.', '.error');
        $I->see('The title field is required.', '.error');
    }

    public function editPost(FunctionalTester $I, PostsPage $postsPage)
    {
        $randTitle = "Edited at " . microtime();
        $id = $I->haveRecord('posts', $this->postAttributes);
        $postsPage->editPost($id, ['title' => 'Edited at ' . $randTitle]);
        $I->seeCurrentUrlEquals($postsPage->route("/$id"));
        $I->see('Show Post', 'h1');
        $I->see($randTitle);
        $I->dontSee('Hello Universe');
    }

    public function deletePost(FunctionalTester $I, PostsPage $postsPage)
    {
        $id = $I->haveRecord('posts', $this->postAttributes);
        $I->amOnPage($postsPage::$url);
        $I->see('Hello Universe');
        $postsPage->deletePost($id);
        $I->seeCurrentUrlEquals($postsPage::$url);
        $I->dontSee('Hello Universe');
    }
}