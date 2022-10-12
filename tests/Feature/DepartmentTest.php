    <?php

use App\Models\Department;

use function Pest\Laravel\deleteJson;
use function Pest\Laravel\get;
use function Pest\Laravel\postJson;
use function Pest\Laravel\put;

/**
 * Crud Operation
 */

it("can load department End point correctly", function () {
    $response = $this->get("/api/v1/department");
    $response->assertSuccessful()
        ->assertSee("departments");
});

it("can Create a department", function () {

    $dept = Department::factory()->raw();
    $response =  postJson(
        "/api/v1/department/create",
        $dept
    )
        ->assertStatus(200)
        ->json("department");
});

it("can show a Department", function () {


    $response =  get("/api/v1/department/" . Department::first()->id)
        ->assertStatus(200)
        ->json("department");
});

it("can edit a Department", function () {

    $dept = Department::first();
    $data = Department::factory()->raw();
    $response =  put("/api/v1/department/" . $dept->id . "/edit",$data)
        ->assertStatus(200)
        ->assertSee($data);
});

it("can delete Departments", function () {

    $dept = Department::factory()->create();
    $response =  deleteJson("/api/v1/department/" . $dept->id . "/delete")
        ->assertStatus(200)
        ->assertSee([
            "Message" => "Item Deleted"
        ]);
});


/**
 * End Crud Operation
 */

/**
 * Test Create Rules
 */

it("cant create a department if name is not provided ",function(){
   
    $response =  postJson(
        "/api/v1/department/create",
        [
            "name"=>""
        ]
    )
        ->assertStatus(422);
        

});

it("should not create a department if name contains a Number",function(){
   
   $dept = Department::factory([
            "name"=>"Test123"
        ])->raw();
    $response =  postJson(
        "/api/v1/department/create",
        $dept
    )
        ->assertStatus(422);
        

});
/**
 * End Test Create Rules
 */

/**
 * Test Update Rules
 */
it("cant edit if Department contain numbers", function () {

    $dept = Department::first();
    $data = [
        "name"=>"Test123"
    ];
    $response =  put("/api/v1/department/" . $dept->id . "/edit",$data)
        ->assertStatus(302);
        
});

it("cant edit if Department name is not unique", function () {

    $dept = Department::first();
    
    $response =  put("/api/v1/department/" . $dept->id . "/edit",[
        "name"=>$dept->name
    ])
        ->assertStatus(302);
        
});

/**
 * End Test Update Rules
 */