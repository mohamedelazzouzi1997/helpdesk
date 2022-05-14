<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('priority')->default('low');
            $table->text('description');
            $table->string('status')->default('open');
            $table->string('image')->nullable();
            // $table->unsignedBigInteger('project_id');
            $table->foreignId('project_id')->constrained('projects')->onUpdate('cascade')->onDelete('cascade')->nullable();
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
        $table->dropForeign(['project_id']);
        Schema::dropIfExists('tickets');
    }
}
