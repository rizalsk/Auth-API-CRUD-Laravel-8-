<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Crud;
use Illuminate\Http\Request;
use App\Http\Resources\CrudResource;
use Illuminate\Support\Facades\Validator;

class PlainCrudController extends Controller
{
    public function index()
    {
        $crud = Crud::all();
        return response([ 'data' => CrudResource::collection($crud), 'message' => 'Retrieved successfully'], 200);

    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'status' => 'in:active,inactive',
            'position' => 'max:191'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error'], 405);
        }

        $crud = Crud::create($data);

        return response(['project' => new CrudResource($crud), 'message' => 'Created successfully'], 201);
    }

    public function show($id)
    {
        return response(['data' => new CrudResource(Crud::find($id)), 'message' => 'Retrieved successfully'], 200);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'status' => 'in:active,inactive',
            'position' => 'max:191'
        ]);
        
        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error'], 405);
        }
        
        $crud = Crud::find($id);
        $crud->update($input);
        
        return response()->json([
            "message" => "Updated successfully.",
            "data" => $crud
        ]);
    }

    public function destroy($id)
    {
        $crud = Crud::find($id);

        if($crud->delete()){
            return response(['message' => 'Deleted'], 204);
        }

        return $this->customResponse(404);
    }

    private function customResponse($statusCode)
    {
        $response = [];

        switch ($statusCode) {
            case 401:
                $response['message'] = 'Unauthorized';
                break;
            case 403:
                $response['message'] = 'Forbidden';
                break;
            case 404:
                $response['message'] = 'Not Found';
                break;
            case 405:
                $response['message'] = 'Method Not Allowed';
                break;
            default:
                $response['message'] = 'Whoops, looks like something went wrong';
                break;
        }

        $response['status'] = $statusCode;

        return response()->json($response, $statusCode);
    }
}
