<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_notes', function (Blueprint $table) {
            $table->id();
            $table->string('crm_id');
            $table->string('reference_number');
            $table->string('customer_name');
            $table->string('credit_note_amount');
            $table->string('invoice_no');
            $table->string('awb');
            $table->string('calculation');
            $table->string('description');
            $table->string('crm_description');
            $table->integer('assign_user');
            $table->integer('status')->nullable();
            $table->integer('user')->nullable();
            $table->integer('futher_explanantion_user')->nullable();
            $table->integer('crdit_note_status')->nullable();
            $table->date('crdit_note_close_date')->nullable();
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
        Schema::dropIfExists('credit_notes');
    }
}
