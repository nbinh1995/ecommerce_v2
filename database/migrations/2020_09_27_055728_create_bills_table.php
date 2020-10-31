<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('provider_id');
            $table->string('name');
            $table->string('email');
            $table->text('address');
            $table->string('phone');
            $table->double('delivery')->default(0);
            $table->text('note')->nullable();
            $table->double('total_bill');
            $table->enum('status', ['Cancel', 'Pending', 'Confirmed', 'Completed'])->default('Pending');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
