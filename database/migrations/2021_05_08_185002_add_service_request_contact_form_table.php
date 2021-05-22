<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddServiceRequestContactFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bravo_space_request_contact_form', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('message')->nullable();
            $table->string('event_date', 255)->nullable();
            $table->text('event_type')->nullable();
            $table->string('status', 50)->nullable();
            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();

            $table->string('user_id')->nullable()->defaul(1);

            $table->string('attendee_id')->nullable();

            $table->string('location_id')->nullable();

            $table->string('budget_id')->nullable();

            $table->string('space_type_id')->nullable();
            $table->string('duration_id')->nullable();




            $table->string('requirement_id')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('bravo_space_request_contact_form');

    }
}
