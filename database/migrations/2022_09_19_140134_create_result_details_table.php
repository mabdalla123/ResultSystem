<?php

use App\Models\Result;
use App\Models\Subject;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_details', function (Blueprint $table) {
            $table->id();

            $table->double("avarege");
            $table->string("mark");
            $table->double("point");
            $table->double("student_certified_hours");

            //Relationship
            $table->foreignIdFor(Result::class)
                ->onDelete('cascade');

            $table->foreignIdFor(Subject::class)
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('result_details');
    }
};
