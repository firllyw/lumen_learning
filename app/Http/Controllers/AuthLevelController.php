<?php

namespace App\Http\Controllers;

use App\Models\AuthLevel;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class AuthLevelController extends BaseController
{

    public function index(Request $request)
    {   
        $result = AuthLevel::get();
        foreach($request->all() as $field => $value){
            $result = AuthLevel::selectRaw()->get();
        }

        return $result;
    }

    public function show($id)
    {
        $result = AuthLevel::find($id)->toArray();
        return response()->json($result);
    }

    public function store(Request $request)
    {
        try{
            $data = AuthLevel::create($request->all());
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
            $data = AuthLevel::find($id)->update($request->all());
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
            $result = AuthLevel::destroy($id);
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
