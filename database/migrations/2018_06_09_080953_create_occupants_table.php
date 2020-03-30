<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOccupantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('occupants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('room_id')->unsigned();
            $table->integer('duration');
            $table->date('arrival_date');
            $table->date('checkout_date');
            $table->mediumText('notes')->nullable();
            $table->enum('status', ['checked_in', 'left', 'cancelled', 'pending'])->default('pending');
            $table->bigInteger('amount_paid')->default(0);
            $table->enum('payment_status', ['paid', 'half_paid', 'pending'])->default('pending');
            $table->timestamps();       

            $table->foreign('room_id')->references('id')->on('rooms')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('customer_id')->references('id')->on('customers')
                ->onUpdate('cascade')
                ->onDelete('no action');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('occupants');
    }
}
