<?php

class PostsResourceCest
{
    protected $endpoint = '/api/posts';

    // tests
    public function getAllPosts(ApiTester $I)
    {
        $id = (string) $this->havePost($I, ['title' => 'Game of Thrones']);
        $id2 = (string) $this->havePost($I, ['title' => 'Lord of the Rings']);
        $I->sendGET($this->endpoint);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->expect('both items are in response');
        $I->seeResponseContainsJson(['id' => $id, 'title' => 'Game of Thrones', 'body' => 'Body']);
        $I->seeResponseContainsJson(['id' => $id2, 'title' => 'Lord of the Rings', 'body' => 'Body']);
        $I->expect('both items are in root array');
        $I->seeResponseContainsJson([['id' => $id], ['id' => $id2]]);
    }

    public function getSinglePost(ApiTester $I)
    {
        $id = (string) $this->havePost($I, ['title' => 'Starwars']);
        $I->sendGET($this->endpoint."/$id");
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(['id' => $id, 'title' => 'Starwars']);
        $I->expect('there is no root array in response');
        $I->dontSeeResponseContainsJson([['id' => $id]]);
    }

    public function createPost(ApiTester $I)
    {
        $I->sendPOST($this->endpoint, ['title' => 'Game of Rings', 'body' => 'By George Tolkien']);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(['title' => 'Game of Rings']);
        $id = $I->grabDataFromResponseByJsonPath('$.id')[0];
        $I->seeRecord('posts', ['id' => $id, 'title' => 'Game of Rings']);
        $I->sendGET($this->endpoint."/$id");
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(['title' => 'Game of Rings']);
    }

    public function updatePost(ApiTester $I)
    {
        $id = (string) $this->havePost($I, ['title' => 'Game of Thrones']);
        $I->sendPUT($this->endpoint."/$id", ['title' => 'Lord of Thrones']);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(['title' => 'Lord of Thrones']);
        $I->seeRecord('posts', ['title' => 'Lord of Thrones']);
        $I->dontSeeRecord('posts', ['title' => 'Game of Thrones']);
    }

    public function deletePost(ApiTester $I)
    {
        $id = (string) $this->havePost($I, ['title' => 'Game of Thrones']);
        $I->sendDELETE($this->endpoint."/$id");
        $I->seeResponseCodeIs(200);
        $I->dontSeeRecord('posts', ['id' => $id]);
    }

    private function havePost(ApiTester $I, $data = [])
    {
        $data = array_merge([
                'title' => 'Game of Thrones',
                'body' => 'Body',
                'created_at' => new DateTime(),
                'updated_at' => new  DateTime(),
        ], $data);

        return $I->haveRecord('posts', $data);
    }
}