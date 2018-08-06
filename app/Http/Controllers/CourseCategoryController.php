<?php

namespace App\Http\Controllers;

use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class CourseCategoryController extends BaseController
{
    public function index(Request $request)
    {
        $result = CourseCategory::get()->toArray();
        return response()->json($result);
    }

    public function show($id)
    {
        $result = CourseCategory::find($id)->toArray();
        return response()->json($result);
    }

    public function store(Request $request)
    {
        try{
            $data = CourseCategory::create($request->all());
            return response()->json([
                'status' => 'Source Created'
            ]);
        }
        catch(\Throwable $ex){
            return response()->json([
                'status' => 'Source Creation Failed',
                'error' => $ex->getMessage()
            ]);
        }
        
    }

    public function update(Request $request, $id)
    {
        try{
            $data = CourseCategory::find($id)->update($request->all());
            return response()->json([
                'status' => 'Source Updated'
            ]);
        }
        catch(\Throwable $ex){
            return response()->json([
                'status' => 'Source Update Failed',
                'error' => $ex->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try{
            $result = CourseCategory::destroy($id);
            return response()->json([
                'status' => 'Source Deleted'
            ]);
        }
        catch(\Throwable $ex){
            return response()->json([
                'status' => 'Failed',
                'error' => $ex->getMessage()
            ]);
        }
        
    }

}
