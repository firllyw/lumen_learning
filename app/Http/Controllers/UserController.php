<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class UserController extends BaseController
{

    public function index(Request $request)
    {   
        $result = User::get();
        foreach($request->all() as $field => $value){
            $result = User::selectRaw()->get();
        }

        return response()->json([
            'status' => 'Sources Found',
            'source'=> $result,    
        ]);
    }

    public function show($id)
    {
        $result = User::find($id)->toArray();
        return response()->json([
            'status' => 'Source Found',
            'source'=> $result,    
        ]);
    }

    public function store(Request $request)
    {
        try{
            $data = User::firstOrCreate($request->all());
            return response()->json([
                'status' => 'Sources Found',
                'source'=> $data,    
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
            $data = User::find($id)->update($request->all());
            return response()->json([
                'status' => 'Source Updated',
                'source' => User::find($id)->toArray(),
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
            $data = User::findOrFail($id)->toArray();
            $result = User::destroy($id);
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
