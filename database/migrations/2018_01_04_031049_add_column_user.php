<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table){
            $table->enum('department', [
                'Programmer', 
                'Multimedia',
                'Imers',
                'Cyber',
                'StaffPondokIT'
            ]);
            $table->text('address')->nullable();
            $table->string('hp')->nullable();
            $table->integer('level')->nullable();
            $table->text('dream')->nullable();
            $table->enum('gender', ['Pria', 'Wanita']);
            $table->string('hobby')->nullable();
            $table->text('experience')->nullable();
            $table->string('creation')->nullable();
            $table->string('photo')->nullable();
            $table->date('date_birth')->nullable();
            $table->string('birth_place')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
