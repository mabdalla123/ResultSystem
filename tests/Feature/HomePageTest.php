<?php
namespace Tests\Feature;

use App\Http\Livewire\SearchTable;
use Livewire\Livewire;



it('can render Search form', function () {
    Livewire::test(SearchTable::class)
        ->assertFormExists();
});

// visable componants

it("can see Department", function () {

    Livewire::test(SearchTable::class)
        ->assertFormFieldExists('department');
});

it("can see acadimic years", function () {

    Livewire::test(SearchTable::class)
        ->assertFormFieldExists('acadimicyear');
});

it("can see semester", function () {

    Livewire::test(SearchTable::class)
        ->assertFormFieldExists('semester');
});


it("can see students", function () {

    Livewire::test(SearchTable::class)
        ->assertFormFieldExists('student');
});
