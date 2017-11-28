<?php

namespace Tests\Feature;

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

    public function test_a_guest_can_access_blog_index()
    {
      // $this->assertTrue(false);

      $response = $this->get('/blog'); //make GET access to blog route

      $response->assertStatus(200); //assert http status return is 200
    }

    public function testWhenCreatePost()
    {
      $post = factory('App\Post')->create();
      $response = $this->get('/blog');
      $response->assertSee($post->title);
    }

    public function testGuestCanSeeSinglePost()
    {
      $post = factory('App\Post')->create();
      $response = $this->get("/blog/$post->id");
      $response->assertSee($post->title);
    }

    public function testGuestCanSeeCommentWhenVisitSinglePost()
    {
      // Given a Post
      $post = factory('App\Post')->create();
      // and Post have comments
      $comment = factory('App\Comment')->create(['post_id' => $post->id]);
      // then I visit single post page
      $response = $this->get('blog/'.$post->id);
      // I've see the comment
      $response->assertSee($comment->body);
    }
}
