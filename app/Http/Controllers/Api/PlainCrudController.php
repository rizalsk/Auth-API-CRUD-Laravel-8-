<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Crud;
use Illuminate\Http\Request;
use App\Http\Resources\CrudResource;
use Illuminate\Support\Facades\Validator;

class PlainCrudController extends Controller
{
    /**
     *      @OA\Examples(
     *        summary="Crud1",
     *        example = "Crud1",
     *       value = {
     *           "status": "inactive",
     *           "position": "Staff"
     *         },
     *      )
    */



    /**
     * @OA\Get(
     *      path="/api/v1/plain-crud",
     *      operationId="getCrudList",
     *      tags={"Crud"},
     *      summary="Get list of crud",
     *      description="Returns list of crud",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     */
    public function index()
    {
        $crud = Crud::all();
        if(count($crud) == 0){
            $crud = Crud::factory(10)->create();
        }
        return response([ 'data' => CrudResource::collection($crud), 'message' => 'Retrieved successfully'], 200);

    }

    /**
     * @OA\Post(
     *      path="/api/v1/plain-crud",
     *      operationId="storeCrud",
     *      tags={"Crud"},
     *      summary="Store new crud",
     *      description="Returns crud data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreCrudRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Crud")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */

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

        return response(['data' => new CrudResource($crud), 'message' => 'Created successfully'], 201);
    }


    /**
     * @OA\Get(
     *      path="/api/v1/plain-crud/{user_id}",
     *      operationId="getCrudByUserId",
     *      tags={"Crud"},
     *      summary="Get crud information",
     *      description="Returns crud data",
     *      @OA\Parameter(
     *          name="user_id",
     *          description="Crud User ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Crud")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function show($user_id)
    {
        return response(['data' => new CrudResource(Crud::find($user_id)), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * @OA\Put(
     *      path="/api/v1/plain-crud/{user_id}",
     *      operationId="updateCrud",
     *      tags={"Crud"},
     *      summary="Update existing crud",
     *      description="Returns updated crud data",
     *      @OA\Parameter(
     *          name="user_id",
     *          description="User id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateCrudRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Crud")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */

    public function update(Request $request, $user_id)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'status' => 'in:active,inactive',
            'position' => 'max:191'
        ]);
        
        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error'], 405);
        }
        
        $crud = Crud::find($user_id);
        $crud->update($input);
        
        return response()->json([
            "message" => "Updated successfully.",
            "user_id" => $user_id,
            "data" => $crud,
        ]);

    }

    /**
     * @OA\Delete(
     *      path="/api/v1/plain-crud/{user_id}",
     *      operationId="deleteCrud",
     *      tags={"Crud"},
     *      summary="Delete existing crud",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="user_id",
     *          description="User id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function destroy($user_id)
    {
        $crud = Crud::find($user_id);

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
