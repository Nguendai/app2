<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestValidateEdit extends TestCase
{
	use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void$
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    public function testValidateEditName(){
    	$data=[
    		'name'=>"12345678901234567890123456789012345678901234567890123456789012345678901234567890",
    		'age'=>'12',
    		'address'=>'ha noi',
    	];
    	$reponse=$this->call('POST','edit/12',$data);
    	dd($reponse);
    	$this->assertDatabaseHas('members',[
    		'name'=>$data['name'],
    		'age'=>$data['age'],
    		'address'=>$data['address'],
    		]);
    }
    public function testValidateEditAge(){
    	$data=[
    		'name'=>"dung",
    		'age'=>'124',
    		'address'=>'ha noi',
    	];
    	$reponse=$this->call('POST','edit/12',$data);
    	dd($reponse);
    	$this->assertDatabaseHas('members',[
    		'name'=>$data['name'],
    		'age'=>$data['age'],
    		]);
    }
    public function testValidateEditAdrress(){
    	$data=[
    		'name'=>"12345678901234567890123456789012345678901234567890123456789012345678901234567890",
    		'age'=>'12',
    		'address'=>'123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890',
    	];
    	$reponse=$this->call('POST','edit/12',$data);
    	dd($reponse);
    	$this->assertDatabaseHas('members',[
    		'name'=>$data['name'],
    		'age'=>$data['age'],
    		'address'=>$data['address'],
    		]);
    }
    public function testValidateEditNameRequair(){
    	$data=[
    		'name'=>"",
    		'age'=>'12',
    		'address'=>'ha noi',
    	];
    	$reponse=$this->call('POST','edit/12',$data);
    	dd($reponse);
    	$this->assertDatabaseHas('members',[
    		'name'=>$data['name'],
    		'age'=>$data['age'],
    		'address'=>$data['address'],
    		]);
    }
    public function testValidateEditNameRequired(){
    	$data=[
    		'name'=>"",
    		'age'=>'12',
    		'address'=>'ha noi',
    	];
    	$reponse=$this->call('POST','edit/12',$data);
    	dd($reponse);
    	$this->assertDatabaseHas('members',[
    		'name'=>$data['name'],
    		'age'=>$data['age'],
    		'address'=>$data['address'],
    		]);
    }
    public function testValidateEditAgeRequired(){
    	$data=[
    		'name'=>"ok",
    		'age'=>'',
    		'address'=>'ha noi',
    	];
    	$reponse=$this->call('POST','edit/12',$data);
    	dd($reponse);
    	$this->assertDatabaseHas('members',[
    		'name'=>$data['name'],
    		'age'=>$data['age'],
    		'address'=>$data['address'],
    		]);
    }
    public function testValidateEditAddressRequired(){
    	$data=[
    		'name'=>"ok",
    		'age'=>'12',
    		'address'=>'ok',
    	];
    	$reponse=$this->call('POST','edit/12',$data);
    	dd($reponse);
    	$this->assertDatabaseHas('members',[
    		'name'=>$data['name'],
    		'age'=>$data['age'],
    		'address'=>$data['address'],
    		]);
    }
}
