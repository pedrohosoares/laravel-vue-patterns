<?php

namespace Tests\Feature\Blog\Controllers\Api;

use App\Blog\Models\Post;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    // php artisan test --filter test_getPostsPage
    public function test_getPostsPage()
    {
        $response = $this->get('/api/v1/posts');
        $response->assertJsonStructure([
            "success",
            "data"=>[
                "current_page",
                "data",
                "first_page_url",
                "from",
                "last_page",
                "last_page_url",
                "links",
                "next_page_url",
                "path",
                "per_page",
                "prev_page_url",
                "to",
                "total"
            ]
        ]);
        $response->assertStatus(200);
    }


    // php artisan test --filter test_findSpecificPost
    public function test_findSpecificPost()
    {
        $posts = Post::factory()->create();
        $response = $this->get("/api/v1/posts/{$posts->id}");
        $response->assertStatus(200);
        $response->assertJson([
            'success'=>true,
            'data'=>[
                'id'=>$posts->id,
                'content'=>$posts->content,
                'resume'=>$posts->resume,
                'title'=>$posts->title,
                'slug'=>$posts->slug,
                'thumb'=>$posts->thumb,
                'user_id'=>$posts->user_id
            ]
        ]);
    }
    

    // php artisan test --filter test_createPost
    public function test_createPost()
    {   
        $data = Post::factory()->make()->toArray();
        $response = $this->post('/api/v1/posts',$data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('posts', [
            'id' => $response->json('data.id'),
            'content' => $data['content'],
            'resume' => $data['resume'],
            'title' => $data['title'],
            'slug' => $data['slug'],
            'thumb' => $data['thumb'],
            'user_id' => $data['user_id'],
            'schedule_at' => $data['schedule_at']
        ]);
        
    }

    // php artisan test --filter test_updatePost
    public function test_updatePost()
    {   
        $data_post = Post::factory()->create();
        $data_update = Post::factory()->make()->toArray();
        $response = $this->put("/api/v1/posts/{$data_post->id}",$data_update);
        $response->assertStatus(200);
        $this->assertDatabaseHas('posts', [
            'id' => $response->json('data.id'),
            'content' => $data_update['content'],
            'resume' => $data_update['resume'],
            'title' => $data_update['title'],
            'slug' => $data_update['slug'],
            'thumb' => $data_update['thumb'],
            'user_id' => $data_update['user_id'],
            'schedule_at' => $data_update['schedule_at']
        ]);
        
    }


    // php artisan test --filter test_deletePost
    public function test_deletePost()
    {   
        $data_post = Post::factory()->create();
        $response = $this->delete("/api/v1/posts/{$data_post->id}");
        $response->assertStatus(200);
        $response->assertJson([
            'success'=>true,
            'data'=>1
        ]);
        
    }
    
}
