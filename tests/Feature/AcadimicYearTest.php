<?php

use App\Models\AcadimicYear;

use function Pest\Laravel\deleteJson;
use function Pest\Laravel\get;
use function Pest\Laravel\postJson;
use function Pest\Laravel\put;



/**
 * Crud Operation
*/
it("can Create a acadimicyear", function () {

    $acadimicyear = AcadimicYear::factory()->raw();
    $response =  postJson(
        "/api/v1/acadimicyear/create",
        $acadimicyear
    )
        ->assertStatus(200)
        ->json("acadimicyear");
});


it("can show a acadimicyear", function () {


    $response =  get("/api/v1/acadimicyear/" . AcadimicYear::first()->id)
        ->assertStatus(200)
        ->json("acadimicyear");
});

it("can edit a acadimicyear", function () {

    $acadimicyear = Acadimicyear::first();
    $data = AcadimicYear::factory()->raw();
    $response =  put("/api/v1/acadimicyear/" . $acadimicyear->id . "/edit",$data)
        ->assertStatus(200);
        //->assertSee($data)
});

it("can delete Acadimicyear", function () {

    $acadimicyear = AcadimicYear::factory()->create();
    $response =  deleteJson("/api/v1/acadimicyear/" . $acadimicyear->id . "/delete")
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

it("cant create a acadimicyear if name is not provided ",function(){
   
   $acadimicyear = AcadimicYear::factory([
        "name"=>""
   ])->raw();
    $response =  postJson(
        "/api/v1/acadimicyear/create",$acadimicyear )
        ->assertStatus(422);
        

});

it("cant create a acadimicyear if department_id is not provided ",function(){
   
   $acadimicyear = AcadimicYear::factory([
        "department_id"=>""
   ])->raw();
    $response =  postJson(
        "/api/v1/acadimicyear/create",$acadimicyear )
        ->assertStatus(422);
        

});


it("should not create  if department_id contains a letter",function(){
   
   $acadimicyear = AcadimicYear::factory([
            "department_id"=>"Test123"
        ])->raw();
    $response =  postJson(
        "/api/v1/acadimicyear/create",
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

it("cant edit if department_id is not a number", function () {

    $acadimicyear = AcadimicYear::first();
    $data = AcadimicYear::factory([
        "department_id"=>"123test"
    ])->raw();
    $response =  put("/api/v1/acadimicyear/" . $acadimicyear->id . "/edit",$data)
        ->assertStatus(302);
        
});

it("cant edit if department_id does not exist", function () {

    $acadimicyear = AcadimicYear::first();
    $data = AcadimicYear::factory([
        "department_id"=>"123456789987654321"
    ])->raw();
    $response =  put("/api/v1/acadimicyear/" . $acadimicyear->id . "/edit",$data)
        ->assertStatus(302);
        
});


it("cant edit if acadimicyear name is not unique", function () {

    $acadimicyear = AcadimicYear::first();
    
    $response =  put("/api/v1/acadimicyear/" . $acadimicyear->id . "/edit",[
        "name"=>$acadimicyear->name
    ])
        ->assertStatus(302);
        
});


/**
 * End Test Update Rules
 */