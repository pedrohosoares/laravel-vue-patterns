<?php

namespace Tests\Feature\Blog\Controllers\Api;

use App\Blog\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    // php artisan test --filter test_getCategorysPage
    public function test_getCategorysPage()
    {
        $response = $this->get('/api/v1/categories');
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


    // php artisan test --filter test_findSpecificCategory
    public function test_findSpecificCategory()
    {
        $category = Category::factory()->create();
        $response = $this->get("/api/v1/categories/{$category->id}");
        $response->assertStatus(200);
        $response->assertJson([
            'success'=>true,
            'data'=>[
                'id'=>$category->id,
                'name'=>$category->name,
                'user_id'=>$category->user_id
            ]
        ]);
    }
    

    // php artisan test --filter test_createCategory
    public function test_createCategory()
    {   
        $data = Category::factory()->make()->toArray();
        $response = $this->post('/api/v1/categories',$data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('categories', [
            'id' => $response->json('data.id'),
            'name' => $data['name'],
            'user_id' => $data['user_id']
        ]);
        
    }

    // php artisan test --filter test_updateCategory
    public function test_updateCategory()
    {   
        $data_Category = Category::factory()->create();
        $data_update = Category::factory()->make()->toArray();
        $response = $this->put("/api/v1/categories/{$data_Category->id}",$data_update);
        $response->assertStatus(200);
        $this->assertDatabaseHas('categories', [
            'id' => $response->json('data.id'),
            'name' => $data_update['name'],
            'user_id' => $data_update['user_id']
        ]);
        
    }


    // php artisan test --filter test_deleteCategory
    public function test_deleteCategory()
    {   
        $data_Category = Category::factory()->create();
        $response = $this->delete("/api/v1/categories/{$data_Category->id}");
        $response->assertStatus(200);
        $response->assertJson([
            'success'=>true,
            'data'=>1
        ]);
        
    }
}
