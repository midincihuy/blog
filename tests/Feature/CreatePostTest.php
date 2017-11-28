<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreatePostTest extends TestCase
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

    public function testAUserCanCreatePost()
    {
      $this->withoutExceptionHandling();
      // Given a guest
      $guest = factory('App\User')->create();
      // make a guest become a user
      $user = $this->be($guest);
      // and giving a Post object
      $post = factory('App\Post')->make();
      // when the user create Post
      $this->post("/post", $post->toArray());
      // when they visit
      $response = $this->get("/blog/$post->id");
      // then they should see post
      $response->assertSee($post->title);
    }

    public function testAGuestCanNotCreatePost()
    {
      $this->withoutExceptionHandling();
      $this->expectException('Illuminate\Auth\AuthenticationException');
      $guest = factory('App\User')->create();
      $post = factory('App\Post')->make();
      $this->post('/post', $post->toArray());
    }

    public function testAGuestCanNotAccessCreatePostPage()
    {
      $this->get('/blog/create')
        ->assertRedirect('/login');
    }
}
