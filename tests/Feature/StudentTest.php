<?php

use App\Models\Student;

use function Pest\Laravel\deleteJson;
use function Pest\Laravel\get;
use function Pest\Laravel\postJson;
use function Pest\Laravel\put;

/**
 * Crud Test
 */
it("can create a student ", function(){
    $student = Student::factory()->raw([
        "name"=>"Test"
    ]);
    $response = postJson(
        "/api/v1/student/create",
        $student
    );
    $response->assertStatus(200)
    ->assertSee("Test");
});

it("can List all students ", function(){

    $response = get("/api/v1/student");
    $response->assertSee("Test");
});


it("can Edit a student ", function(){
    $student = Student::factory()->create();

    $response = put("/api/v1/student/".$student->id."/edit",
    [
        "name"=>"TestingTest"
    ]);
    $response->assertSee("TestingTest")
    ->assertStatus(200);
});

it("can Delete a student ", function(){

    $student = Student::factory()->create();
    $response = deleteJson("/api/v1/student/".$student->id."/delete");
    $response->assertSee("Item Deleted")
     ->assertStatus(200);
});

it("can Show a student ", function(){

    $student = Student::factory()->create();
    $response = get("/api/v1/student/".$student->id);
    $response->assertSee($student->name)
    ->assertStatus(200);
});

/**
 * End Crud Test
 */
/**
 * Test Create Student 
 */

//Name Field
it("cant create a student if the name is not provided",function(){

    $student = Student::factory()->raw();
    $student["name"] = "";
    $response = postJson("/api/v1/student/create",$student);
    $response->assertStatus(422);
});

it("cant create a student if the name is not alphabetic",function(){

    $student = Student::factory()->raw();
    $student["name"] = "Mohammed!@";
    $response = postJson("/api/v1/student/create",$student);
    $response->assertStatus(422);
});

//Department Field

it("cant create a student if the department_id is not Provided",function(){

    $student = Student::factory()->raw();
    $student["department_id"] = "";
    $response = postJson("/api/v1/student/create",$student);
    $response->assertStatus(422);
});

it("cant create a student if the department_id is not a number",function(){

    $student = Student::factory()->raw();
    $student["department_id"] = "mohammed";
    $response = postJson("/api/v1/student/create",$student);
    $response->assertStatus(422);
});

it("cant create a student if the department_id does not exist in departments",function(){

    $student = Student::factory()->raw();
    $student["department_id"] = 123456789987654321;
    $response = postJson("/api/v1/student/create",$student);
    $response->assertStatus(422);
});


/**
 * End Test Create Student 
 */

/**
 * Test Edit Student 
 */

//Name Field
it("cant update a student if the name is not provided",function(){

$student = Student::factory()->create();
    $studentRaw = Student::factory()->raw();
    $studentRaw["name"] = "";
    $response = put("/api/v1/student/".$student->id."/edit/",$studentRaw);
    $response->assertStatus(302);
    $student->delete();
});

it("cant update a student if the name is not alphabetic",function(){

    $student = Student::factory()->create();
    $studentRaw = Student::factory()->raw();
    $studentRaw["name"] = "Mohammed1234";
    $response = put("/api/v1/student/".$student->id."/edit/",$studentRaw);
    $response->assertStatus(302);
    $student->delete();

});

//Department Field

it("cant update a student if the department_id is not Provided",function(){

    $student = Student::factory()->create();
    $studentRaw = Student::factory()->raw();
    $studentRaw["department_id"] = "";
    $response = put("/api/v1/student/".$student->id."/edit/",$studentRaw);
    $response->assertStatus(302);
    $student->delete();

});

it("cant update a student if the department_id is not a number",function(){

    $student = Student::factory()->create();
    $studentRaw = Student::factory()->raw();
    $studentRaw["department_id"] = "Mohammed1234";
    $response = put("/api/v1/student/".$student->id."/edit/",$studentRaw);
    $response->assertStatus(302);
    $student->delete();
});

it("cant update a student if the department_id does not exist in departments",function(){

    $student = Student::factory()->create();
    $studentRaw = Student::factory()->raw();
    $studentRaw["department_id"] = "123456789987654321";
    $response = put("/api/v1/student/".$student->id."/edit/",$studentRaw);
    $response->assertStatus(302);
    $student->delete();
});


/**
 * End Test Edit Student 
 */