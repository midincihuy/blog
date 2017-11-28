<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testAPostCanAddAComments()
    {
      // Giving a Post
      $post = factory('App\Post')->create();
      // Add a comment
      $post->storeComment([
        'body' => 'Testing',
        'user_id' => 1
      ]);
      // Then post should have a comment
      $this->assertCount(1,$post->comment);
    }

    public function testPostHasACreator()
    {
      // Giving a Post
      $post = factory('App\Post')->create();
      // expect found User who create post
      $this->assertInstanceOf('App\User', $post->creator);
    }
}
