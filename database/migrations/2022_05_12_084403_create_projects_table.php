<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('projects', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('title');
    //         $table->string('priority')->default('low');
    //         $table->text('description');
    //         $table->string('status')->default('open');
    //         $table->string('created_by');
    //         $table->string('Assigned_to');
    //         $table->string('end_time')->nullable();
    //         $table->timestamps();
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  *
    //  * @return void
    //  */
    // public function down()
    // {
    //     Schema::dropIfExists('projects');
    // }
}
