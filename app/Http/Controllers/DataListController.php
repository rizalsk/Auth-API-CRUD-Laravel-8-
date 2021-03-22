<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Crud;

class DataListController extends Controller
{
    public function userList(){
    	$users = User::all();
    	if(count($users) == 0){
    		$users = User::factory(10)->create();
    		foreach ($users as $i => $v) {
    			$v->createToken('api-access');
    		}
    	}
    	return view('user', compact('users'));
    }

    public function crudList(){
    	$cruds = Crud::all();
    	if(count($cruds) == 0){
    		$cruds = Crud::factory(10)->create();
    	}

    	return view('crud', compact('cruds'));
    }
}
