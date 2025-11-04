<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function categoryList()
    {
        $category = Category::all();

        return response()->json([
            'message' => 'category List fetched successfully',
            'status' => 200,
            'data' => CategoryResource::collection($category),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function categoryStore(CategoryRequest $request)
    {   
        try{
            // Validate the request data
            $data = $request->validated();

            // Prepare File Name & Path
            $image = $request->file('image');
            
            //File upload handling
            $fileName = $image->getClientOriginalName();
            $imagePath = "storage/uploads/{$fileName}";

            //move the uploaded file to the desired location
            $image->move(public_path('storage/uploads'), $imagePath);

            // Create Category
            $category = Category::create($data + ['image' => $imagePath]);

            return response()->json([
                'message' => 'Category created successfully',
                'status' => 201,
                'data' => new CategoryResource($category),
            ], 201);

        }catch(\Exception $e){
            return response()->json([
                'message' =>  $e->getMessage(),
                'status'  => 500,
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function categoryShow(string $id)
    {
        $category = Category::find($id);

        if(! $category){
            return response()->json([
                'success' => false,
                'message' => 'category not found',
                'status' => 404
            ], 404);
        }

        return response()->json([
            'message' => 'category fetched successfully',
            'status' => 200,
            'data' => new CategoryResource($category),
        ], 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function categoryUpdate(CategoryRequest $request, $id)
    {   
        try{
            //category find by id
            $category = Category::find($id);

            if(!$category){
                return response()->json([
                    'success' => false,
                    'message' => 'category not Found',
                    'status' => 404
                ], 404);
            }

            // Validate the request data
            $data = $request->validated();

            // Handle image update if a new file is uploaded
            if($request->hasFile('image')){
                
                //upload new file
                $image = $request->file('image');
                $fileName = time() . '_' . $image->getClientOriginalName();
                $imagePath = "storage/uploads/{$fileName}";

                //move the uploaded file to the desired location
                $image->move(public_path('storage/uploads'), $imagePath);

                //delete old image file if exists
                if (!empty($category->image) && file_exists(public_path($category->image))) {
                    unlink(public_path($category->image));
                }

                //update image path in data array
                $data['image'] = $imagePath;
            }

            //update other category 
            $category->update($data);

            return response()->json([
                'message' => 'Category updated successfully',
                'status' => 200,
                'data' => new CategoryResource ($category),
            ], 200);

        }catch(\Exception $e){
            return response()->json([
                'message' =>  $e->getMessage(),
                'status'  => 500,
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function categoryDestroy(string $id)
    {
        try{
            //category find by id
            $category = Category::find($id);

            if(!$category){
                return response()->json([
                    'success' => false,
                    'message' => 'category not found',
                    'status' => 404
                ], 404);
            }

            //delete all data
            $category->delete();

            return response()->json([
                'success' => true,
                'message' => 'category deleted successfully',
                'status' => 200
            ], 200);

        }catch(\Exception $e){
            return response()->json([
                'message' =>  $e->getMessage(),
                'status'  => 500,
            ], 500);
        }   
    }
}
