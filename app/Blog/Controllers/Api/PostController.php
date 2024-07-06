<?php

namespace App\Blog\Controllers\Api;

use App\Blog\Models\Post;
use App\Blog\Services\PostService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\PostRequest;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Traits\ApiResponseJson;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{

    use ApiResponseJson;

    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) : JsonResponse
    {
        try {
            $response = $this->postService->getAllPosts($request->all());
            return $this->successResponse($response);
        } catch (Exception $th) {
            return $this->errorResponse($th->getMessage());  
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        try {
            $response = $this->postService->createPost($request->all());
            return $this->successResponse($response); 
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage()); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $params,int $id)
    {
        $response = $this->postService->getPostById($id);
        try {
            return $this->successResponse($response);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage()); 
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $data, $id)
    {
        try {
            $response = $this->postService->updatePost($id,$data);
            return $this->successResponse($response);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage()); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id) : object
    {
        try {
            $response = $this->postService->deletePost($id);
            return $this->successResponse($response);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage()); 
        }
    }
}
