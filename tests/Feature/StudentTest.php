<?php

use App\Models\Student;

use function Pest\Laravel\deleteJson;
use function Pest\Laravel\get;
use function Pest\Laravel\postJson;
use function Pest\Laravel\put;

it("can create a student ", function(){
    $student = Student::factory()->raw([
        "name"=>"Test"
    ]);
    $response = postJson("/api/v1/student/create",
    $student);
    $response->assertSee("Test");
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
    $response->assertSee("TestingTest");
});

it("can Delete a student ", function(){

    $student = Student::factory()->create();
    $response = deleteJson("/api/v1/student/".$student->id."/delete");
    $response->assertSee("Item Deleted");
});

it("can Show a student ", function(){

    $student = Student::factory()->create();
    $response = get("/api/v1/student/".$student->id);
    $response->assertSee($student->name);
});
