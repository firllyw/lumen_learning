<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class CourseController extends BaseController
{
    public function index(Request $request)
    {
        $result = Course::get();
        foreach($request->all() as $field => $value){
            $result = Course::where($field, $value)->get();
        }
        return response()->json([
            'status' => 'Sources Found',
            'source'=> $result,    
        ]);
    }

    public function show($id)
    {
        try{
            $result = Course::findorFail($id)->toArray();
            return response()->json([
                'status' => 'Source Found',
                'source'=> $result,    
            ]);
        }
        catch(\Throwable $ex){
            return response()->json([
                'status' => 'Source Failed to Show',
                'error' => $ex->getMessage()
            ]);
        }
    }

    public function store(Request $request)
    {
        try{
            $data = Course::firstOrCreate($request->all());
            return response()->json([
                'status' => 'Source Created',
                'source' => $data,
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
            $data = Course::find($id)->update($request->all());
            return response()->json([
                'status' => 'Source Updated',
                'source' => Course::find($id)->toArray(),
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
            $data = Course::findOrFail($id)->toArray();
            $result = Course::destroy($id);
            return response()->json([
                'status' => 'Source Deleted',
                'source' => $data,
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
