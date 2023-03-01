<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditNoteDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_note_descriptions', function (Blueprint $table) {
            $table->id();
            $table->integer('credit_note_id');
            $table->string('assign_user_description')->nullable();
            $table->string('assign_user_id')->nullable();
            $table->integer('status')->nullable();
            $table->string('futher_assign_hod_description')->nullable();
            $table->string('futher_assign_user_id')->nullable();
            $table->string('futher_assign_user_description')->nullable();
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
        Schema::dropIfExists('credit_note_descriptions');
    }
}
