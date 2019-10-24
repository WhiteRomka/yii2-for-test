<?php

namespace tests\unit\models;

use app\models\Post;
use app\models\User;
use Codeception\Stub;
use Codeception\Test\Unit;
use Codeception\Util\Fixtures;
use yii\db\ActiveQuery;
use UnitTester;

class PostTest extends Unit
{
    /**
     * @var UnitTester $tester
     */
    protected $tester;

    protected function _before()
    {
        Fixtures::add('Rom', ['name' => 'Rom']);
        parent::_before();
    }

    /*public function testGetAuthor()
    {
        $post = Post::findOne(['id' => 1]);
        $author = $post->author;
        $this->assertInstanceOf(User::class , $author);

        $author = $post->getAuthor();
        $this->assertInstanceOf(ActiveQuery::class , $author);
    }

    public function testSave()
    {
        $post = new Post();
        $post->title = 's22111';
        $post->text = 'd f bhgfdgf g fd gfdgd';
        $post->author_id = 1;

        $r = $post->save(false);
        $this->assertTrue($r);
        $this->tester->seeRecord('app\models\Post', ['title'=>'s22111']);
    }*/

    public function testGetTitle()
    {
       // $post = Post::findOne(['id' => 11]);
       /* $post = Stub::make(Post::class, [
            'id' => 1,
            'title' => 'sss',
            'text' => 'eee'
        ]);*/

       // Mocks
        $post = $this->make(Post::class, [
            'id' => 3,
            'title' => 'sss',
            'text' => 'eee',
            'getTitleAndText' => function () { return true;}
        ]);

       // $this->assertEquals('ssseee', $post->getTitleAndText());
        $this->assertTrue($post->getTitleAndText());
        $this->assertEquals(3, $post->id);
    }



    public function testMock()
    {
        $post = $this->make(new Post(), [
            'id' => 5,
            'title' => 't'
        ]);
        $this->assertEquals('t', $post->title);
    }

    public function testFixures()
    {
        $rom = Fixtures::get('Rom');
        $this->assertEquals('Rom', $rom['name']);
    }
}