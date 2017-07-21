<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
// use App\Members;

class MemberTest extends TestCase
{
   //  use DatabaseMigrations;
   //  /**
   //   * A basic test example.
   //   *
   //   * @return void
   //   */
   //  public function testExample(){
   //      $this->assertTrue(true);
   // }
   //   public function testGetListMember()
   //  {
   //      $response = $this->get('list');
   //      $response->assertStatus(200);
   //  }
   //  public function testAddNewMember()
   //  {
   //      $data = [
   //          'name' => 'Testing',
   //          'address' => 'localhost',
   //          'age' => '23',
   //          'photo' => null,
   //      ];
   //      $response = $this->call('POST', 'add', $data);
   //      $this->assertDatabaseHas('members', [
   //          'name' => $data['name'],
   //          'address' => $data['address'],
   //          'age' => $data['age'],
   //      ]);
   //      $response->assertStatus(200);
   //  }
   //  public function testEditMember(){
   //  	$member = factory(\App\Members::class)->create([
   //          'name' => 'Test edit',
   //          'address' => 'localhost',
   //          'age' => '23',
   //          'images'=>'',
   //      ]);
   //      $memberId = $member->id;
   //      $dataEdit = [
   //          'name' => 'New Edit',
   //          'address' => 'local near host',
   //          'age' => '24',
   //      ];
   //      $response = $this->call('POST', 'edit/'.$memberId, $dataEdit);
   //      $this->assertDatabaseHas('members', [
   //          'name' => $dataEdit['name'],
   //          'address' => $dataEdit['address'],
   //          'age' => $dataEdit['age'],

   //      ]);
   //      $response->assertStatus(200);
   //  }
   //  public function testDelete(){
   //  	$member = factory(\App\Members::class)->create([
   //          'name' => 'Test edit',
   //          'address' => 'localhost',
   //          'age' => '23',
   //          'images'=>'',
   //      ]);
   //      $memberId = $member->id;
   //      $response = $this->call('GET', 'delete/'.$memberId);
   //      $this->assertDatabaseMissing('members', [
   //          'name' => $member->name,
   //          'address' => $member->address,
   //          'age' => $member->age,
   //      ]);
   //      $response->assertStatus(200);

   //  }
}
