<?php

namespace Tests\Unit\Bridgenote;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use App\Http\Resources\CrudResource;

use App\Models\User;
use App\Models\Crud;

class ApiTest extends TestCase
{

    //test fetch data
    public function test_can_list_cruds() {

    	Sanctum::actingAs(
	        User::factory()->create(),
	        ['*']
	    );

    	//seeding fake data
        $crud = Crud::factory(5)->create();

		$response = $this->json('GET', '/api/crud/' , []);
        $response->assertStatus(200);
        $response->assertJson([
            'data' => collect($crud)->toArray(),
            'message' => 'Retrieved successfully'
        ]);
    }
    
	//test create data
    public function test_can_create_crud() {
    	Sanctum::actingAs(
	        User::factory()->create(),
	        ['*']
	    );

	    $data = [
	        'status' => 'active',
	        'position' => 'Manager'
	    ];

		$this->json('POST','/api/crud', $data)
            ->assertStatus(201);

    }

    //test update data
    public function test_can_update_crud() {

    	Sanctum::actingAs(
	        User::factory()->create(),
	        ['*']
	    );

        $crud = Crud::factory()->create();

        $data = [
            'status' => 'inactive',
            'position' => 'Director', 
        ];

        $response = $this->json('patch', 'api/crud/'.$crud->user_id, $data);
		$response->assertStatus(200);

    }
    
    //test show data
    public function test_can_show_crud() {
    	Sanctum::actingAs(
	        User::factory()->create(),
	        ['*']
	    );

        $crud = Crud::factory()->create();

        $response = $this->json('GET', '/api/crud/'.$crud->user_id)
		            ->assertStatus(200);
    }

    //test delete data
    public function test_can_delete_crud() {
    	Sanctum::actingAs(
	        User::factory()->create(),
	        ['*']
	    );

        $crud = Crud::factory()->create();

        $response = $this->json('delete' ,'/api/crud/'.$crud->user_id)
		            ->assertStatus(204);
    }

    
}
