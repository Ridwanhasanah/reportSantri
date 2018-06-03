<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('invoice');
            $table->string('package');
            $table->integer('amount_month');
            $table->integer('price');
            $table->string('user_name');
            $table->string('user_santri');
            $table->string('address');
            $table->string('hp')->nullable();
            $table->enum('conrim',[
                'confirm',
                'unconfirm'
            ])->nullable();
            $table->enum('status',[
                'canceled',
                'paid',
                'unpaid',
                'refunded'

            ]);
            $table->timestamps();

            $table->foreign('user_id')
           ->references('id')
           ->on('users')
           ->onUpdate('cascade')
           ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
