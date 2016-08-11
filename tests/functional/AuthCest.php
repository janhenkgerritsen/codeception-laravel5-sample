<?php
use App\User;
use Illuminate\Support\Facades\Hash;
use Page\Functional\PostsPage;

class AuthCest
{
    private $userAttributes;

    public function _before()
    {
        $this->userAttributes = [
            'email' =>  'john@doe.com',
            'password' => Hash::make('password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
    }

    public function loginUsingUserRecord(FunctionalTester $I)
    {
        $I->amLoggedAs(User::create($this->userAttributes));

        $I->amOnPage(PostsPage::$url);

        $I->seeCurrentUrlEquals(PostsPage::$url);
        $I->seeAuthentication();

        // Login should persist between requests
        $I->amOnPage(PostsPage::$url);

        $I->seeAuthentication();
    }

    public function loginUsingCredentials(FunctionalTester $I)
    {
        $I->haveRecord('users', $this->userAttributes);
        $I->amLoggedAs(['email' => 'john@doe.com', 'password' => 'password']);

        $I->amOnPage(PostsPage::$url);

        $I->seeCurrentUrlEquals(PostsPage::$url);
        $I->seeAuthentication();

        // Login should persist between requests
        $I->amOnPage(PostsPage::$url);

        $I->seeAuthentication();
    }

    public function secureRouteWithoutAuthenticatedUser(FunctionalTester $I)
    {
        $I->amOnPage('/secure');

        $I->seeCurrentUrlEquals('/login');
    }

    public function secureRouteWithAuthenticatedUser(FunctionalTester $I)
    {
        $I->amLoggedAs(User::create($this->userAttributes));

        $I->amOnPage('/secure');

        $I->see('Hello World');
    }

}