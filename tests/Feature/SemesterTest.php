<?php

use App\Models\Semester;
use function Pest\Laravel\deleteJson;
use function Pest\Laravel\get;
use function Pest\Laravel\postJson;
use function Pest\Laravel\put;

/**
 * Crud Test
 */
it('can create a semester ', function () {
    $semester = Semester::factory()->raw();
    $response = postJson(
        '/api/v1/semester/create',
        $semester
    );
    $response->assertStatus(200)
    ->assertSee($semester['name']);
});

it('can List all Semesters ', function () {
    $response = get('/api/v1/semester');
    $response->assertStatus(200);
});

it('can Edit a semester ', function () {
    $semester = Semester::factory()->create();

    $response = put('/api/v1/semester/'.$semester->id.'/edit',
        [
            'name' => 'TestingTest',
        ]);
    $response->assertSee('TestingTest')
    ->assertStatus(200);
});

it('can Delete a semester ', function () {
    $semester = Semester::factory()->create();
    $response = deleteJson('/api/v1/semester/'.$semester->id.'/delete');
    $response->assertSee('Item Deleted')
     ->assertStatus(200);
});

it('can Show a semester ', function () {
    $semester = Semester::factory()->create();
    $response = get('/api/v1/semester/'.$semester->id);
    $response->assertSee($semester->name)
    ->assertStatus(200);
});

/**
 * End Crud Test
 */
/**
 * Test Create semester
 */

//Name Field
it('cant create a semester if the name is not provided', function () {
    $semester = Semester::factory()->raw();
    $semester['name'] = '';
    $response = postJson('/api/v1/semester/create', $semester);
    $response->assertStatus(422);
});

it('cant create a semester if the name is not alphabetic', function () {
    $semester = Semester::factory()->raw();
    $semester['name'] = 'Mohammed!@';
    $response = postJson('/api/v1/semester/create', $semester);
    $response->assertStatus(422);
});

it('cant create a semester if the name is not unique', function () {
    $semester = Semester::factory()->raw();
    $semester['name'] = 'TestingTest';
    $response = postJson('/api/v1/semester/create', $semester);
    $response->assertStatus(422);
});

//acadimic_year_id Field

it('cant create  if the acadimic year is not Provided', function () {
    $semester = Semester::factory()->raw();
    $semester['acadimic_year_id'] = '';
    $response = postJson('/api/v1/semester/create', $semester);
    $response->assertStatus(422);
});

it('cant create a semester if the acadimic year is not a number', function () {
    $semester = Semester::factory()->raw();
    $semester['acadimic_year_id'] = 'mohammed';
    $response = postJson('/api/v1/semester/create', $semester);
    $response->assertStatus(422);
});

it('cant create a semester if the acadimic year id does not exist in acadimic year table', function () {
    $semester = Semester::factory()->raw();
    $semester['acadimic_year_id'] = 123456789987654321;
    $response = postJson('/api/v1/semester/create', $semester);
    $response->assertStatus(422);
});

/**
 * End Test Create Semester
 */

/**
 * Test Edit Semester
 */

//Name Field
it('cant update a semester if the name is not provided', function () {
    $semester = Semester::factory()->create();
    $semesterRaw = Semester::factory()->raw();
    $semesterRaw['name'] = '';
    $response = put('/api/v1/semester/'.$semester->id.'/edit/', $semesterRaw);
    $response->assertStatus(302);
    $semester->delete();
});

//acadimic_year_id Field

it('cant update a semester if the acadimic year is not Provided', function () {
    $semester = Semester::factory()->create();
    $semesterRaw = Semester::factory()->raw();
    $semesterRaw['acadimic_year_id'] = '';
    $response = put('/api/v1/semester/'.$semester->id.'/edit/', $semesterRaw);
    $response->assertStatus(302);
    $semester->delete();
});

it('cant update a semester if the acadimic_year_id is not a number', function () {
    $semester = Semester::factory()->create();
    $semesterRaw = Semester::factory()->raw();
    $semesterRaw['acadimic_year_id'] = 'Mohammed1234';
    $response = put('/api/v1/semester/'.$semester->id.'/edit/', $semesterRaw);
    $response->assertStatus(302);
    $semester->delete();
});

it('cant update a semester if the acadimic_year_id does not exist in acadimic year table', function () {
    $semester = Semester::factory()->create();
    $semesterRaw = Semester::factory()->raw();
    $semesterRaw['acadimic_year_id'] = '123456789987654321';
    $response = put('/api/v1/semester/'.$semester->id.'/edit/', $semesterRaw);
    $response->assertStatus(302);
    $semester->delete();
});

//is_available_for_students
it('cant update a semester if the is_available_for_students was not provided', function () {
    $semester = Semester::factory()->create();
    $semesterRaw = Semester::factory()->raw();
    $semesterRaw['is_available_for_students'] = '';
    $response = put('/api/v1/semester/'.$semester->id.'/edit/', $semesterRaw);
    $response->assertStatus(302);
    $semester->delete();
});

it('cant update a semester if the is_available_for_students not a boolean', function () {
    $semester = Semester::factory()->create();
    $semesterRaw = Semester::factory()->raw();
    $semesterRaw['acadimic_year_id'] = '123456789987654321';
    $response = put('/api/v1/semester/'.$semester->id.'/edit/', $semesterRaw);
    $response->assertStatus(302);
    $semester->delete();
});
/**
 * End Test Edit Semester
 */
