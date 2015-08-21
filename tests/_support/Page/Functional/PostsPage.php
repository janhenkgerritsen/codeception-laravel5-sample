<?php

namespace Page\Functional;

use FunctionalTester;

class PostsPage
{
    public static $url = '/posts';

    public static function route($param)
    {
        return static::$url . $param;
    }

    public static $formFields = ['title' => '#title', 'body' => 'Body:'];

    /**
     * @var FunctionalTester;
     */
    protected $tester;

    public function __construct(FunctionalTester $I)
    {
        $this->tester = $I;
    }

    public function createPost($fields = [])
    {
        $I = $this->tester;
        $I->amOnPage(static::$url);
        $I->click('Add new post');
        $this->fillFormFields($fields);
        $I->click('Submit');
    }

    public function editPost($id, $fields = [])
    {
        $I = $this->tester;
        $I->amOnPage(self::route("/$id/edit"));
        $I->see('Edit Post', 'h1');
        $this->fillFormFields($fields);
        $I->click('Update');
    }

    public function deletePost($id)
    {
        $I = $this->tester;
        $I->amOnPage(self::route("/$id"));
        $I->click('Delete');
    }

    protected function fillFormFields($data)
    {
        foreach ($data as $field => $value) {
            if (!isset(static::$formFields[$field])) {
                throw new \Exception("Form field  $field does not exist");
            }
            $this->tester->fillField(static::$formFields[$field], $value);
        }
    }

}