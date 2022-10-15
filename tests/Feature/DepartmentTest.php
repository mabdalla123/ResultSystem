    <?php

use App\Models\Department;
use App\Models\AcadimicYear;
use function Pest\Laravel\deleteJson;
use function Pest\Laravel\get;
use function Pest\Laravel\postJson;
use function Pest\Laravel\put;

use Illuminate\Support\Str;


/**
 * Crud Operation
 */
it('can load department End point correctly', function () {
    $response = $this->get('/api/v1/department');
    $response->assertSuccessful()
        ->assertSee('departments');
});

it('can Create a department', function () {
    $dept = Department::factory([
        "acadimicyear_id"=>AcadimicYear::first()->id,
        "name"=>chr(rand(97,122)),
    ])->raw();
    $response = postJson(
        '/api/v1/department/create',
        $dept
    )
        ->assertStatus(200)
        ->json('department');
});

it('can show a Department', function () {
    $response = get('/api/v1/department/'.Department::first()->id)
        ->assertStatus(200)
        ->json('department');
});

it('can edit a Department', function () {
    $dept = Department::first();
    $data = Department::factory([
        "name"=>"test",
        "acadimicyear_id"=>AcadimicYear::first()->id
    ])->raw();
    $response = put('/api/v1/department/'.$dept->id.'/edit', $data)
        ->assertStatus(200)
        ->assertSee($data);
});


/**
 * End Crud Operation
 */

/**
 * Test Create Rules
 */
it('cant create a department if name is not provided ', function () {
    $response = postJson(
        '/api/v1/department/create',
        [
            'name' => '',
        ]
    )
        ->assertStatus(422);
});

it('should not create a department if name contains a Number', function () {
    $dept = Department::factory([
        'name' => 'Test123',
        "acadimicyear_id"=>AcadimicYear::first()->id
    ])->raw();
    $response = postJson(
        '/api/v1/department/create',
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
it('cant edit if Department contain numbers', function () {
    $dept = Department::first();
    $data = [
        'name' => 'Test123',
    ];
    $response = put('/api/v1/department/'.$dept->id.'/edit', $data)
        ->assertStatus(302);
});

it('cant edit if Department name is not unique', function () {
    $dept = Department::first();

    $response = put('/api/v1/department/'.$dept->id.'/edit', [
        'name' => $dept->name,
    ])
        ->assertStatus(302);
});

/**
 * End Test Update Rules
 */


it('can delete a Department', function () {
    $dept = Department::first();
    $response = deleteJson('/api/v1/department/'.$dept->id.'/delete')
        ->assertStatus(200)
        ->assertSee([
            'Message' => 'Item Deleted',
        ]);
});