<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubmitCommentTest extends TestCase
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

    public function testUserCanSubmitComment()
    {

      // Given a Guesta
      $guest = factory('App\User')->create();
      // make guest to Authenticate user
      $user = $this->be($guest);
      // and Post is Exists
      $post = factory('App\Post')->create();
      // and Giving comment object
      $comment = factory('App\Comment')->make();
      // when the user submit comment to the post
      $this->post("/blog/$post->id/comment", $comment->toArray());
      // then they should see comment
      $this->get("/blog/$post->id")->assertSee($comment->body);
    }

    public function testUserCanNotSubmitComment()
    {

      // Given a Guesta
      $guest = factory('App\User')->create();
      // and Post is Exists
      $post = factory('App\Post')->create();
      // and Giving comment object
      $comment = factory('App\Comment')->make();
      // when the user submit comment to the post
      $this->post("/blog/$post->id/comment", $comment->toArray());
      // then they should see comment
      $this->get("/blog/$post->id")->assertDontSee($comment->body);
    }
}
