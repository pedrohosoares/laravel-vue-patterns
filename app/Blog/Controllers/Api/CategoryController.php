<?php

namespace App\Blog\Controllers\Api;

use App\Blog\Services\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;
use App\Traits\ApiResponseJson;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ApiResponseJson;

    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) : JsonResponse
    {
        try {
            $response = $this->categoryService->getAllPosts($request->all());
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
    public function store(CategoryRequest $request)
    {
        try {
            $response = $this->categoryService->createPost($request->all());
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
        $response = $this->categoryService->getPostById($id);
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
    public function update(CategoryRequest $data, $id)
    {
        try {
            $response = $this->categoryService->updatePost($id,$data);
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
            $response = $this->categoryService->deletePost($id);
            return $this->successResponse($response);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage()); 
        }
    }
}
