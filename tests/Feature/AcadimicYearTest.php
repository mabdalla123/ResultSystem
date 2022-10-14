<?php

use App\Models\AcadimicYear;
use App\Models\Department;
use function Pest\Laravel\deleteJson;
use function Pest\Laravel\get;
use function Pest\Laravel\postJson;
use function Pest\Laravel\put;

/**
 * Crud Operation
 */

it('can Create a acadimicyear', function () {
    $acadimicyear =Acadimicyear::factory([
        "department_id"=>Department::first()->id
    ])->raw();
    $response = postJson(
        '/api/v1/acadimicyear/create',
        $acadimicyear
    )
        ->assertStatus(200)
        ->json('acadimicyear');

        $this->acadimicyear = $acadimicyear;
});

it('can show a acadimicyear', function () {
    $response = get('/api/v1/acadimicyear/'.Acadimicyear::first()->id)
        ->assertStatus(200)
        ->json('acadimicyear');
});

it('can edit a acadimicyear', function () {
    
    $data = AcadimicYear::factory()->raw();
    $response = put('/api/v1/acadimicyear/'.Acadimicyear::first()->id.'/edit', $data)
        ->assertStatus(200);
    //->assertSee($data)
});



/**
 * End Crud Operation
 */

/**
 * Test Create Rules
 */
it('cant create a acadimicyear if name is not provided ', function () {
    $acadimicyear = AcadimicYear::factory([
        'name' => '',
    ])->raw();
    $response = postJson(
        '/api/v1/acadimicyear/create', $acadimicyear)
        ->assertStatus(422);
});

it('cant create a acadimicyear if department_id is not provided ', function () {
    $acadimicyear = AcadimicYear::factory([
        'department_id' => '',
    ])->raw();
    $response = postJson(
        '/api/v1/acadimicyear/create', $acadimicyear)
        ->assertStatus(422);
});

it('should not create  if department_id contains a letter', function () {
    $acadimicyear = AcadimicYear::factory([
        'department_id' => 'Test123',
    ])->raw();
    $response = postJson(
        '/api/v1/acadimicyear/create',
        $acadimicyear
    )
        ->assertStatus(422);
});
/**
 * End Test Create Rules
 */

/**
 * Test Update Rules
 */
it('cant edit if department_id is not a number', function () {
    $acadimicyear = AcadimicYear::first();
    $data = AcadimicYear::factory([
        'department_id' => '123test',
    ])->raw();
    $response = put('/api/v1/acadimicyear/'.Acadimicyear::first()->id.'/edit', $data)
        ->assertStatus(302);
});

it('cant edit if department_id does not exist', function () {
    $acadimicyear = AcadimicYear::first();
    $data = AcadimicYear::factory([
        'department_id' => '123456789987654321',
    ])->raw();
    $response = put('/api/v1/acadimicyear/'.Acadimicyear::first()->id.'/edit', $data)
        ->assertStatus(302);
});

it('cant edit if acadimicyear name is not unique', function () {
    $acadimicyear = AcadimicYear::first();

    $response = put('/api/v1/acadimicyear/'.Acadimicyear::first()->id.'/edit', [
        'name' => $acadimicyear->name,
    ])
        ->assertStatus(302);
});


it('can delete Acadimicyear', function () {
   
    $response = deleteJson('/api/v1/acadimicyear/'.Acadimicyear::first()->id.'/delete')
        ->assertStatus(200)
        ->assertSee([
            'Message' => 'Item Deleted',
        ]);
});


/**
 * End Test Update Rules
 */
