<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DatabaseFoundation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrators', function (Blueprint $table) {
            $table->increments('id');
			$table->string('fullname');
			$table->string('email')->unique();
            $table->string('password');
            $table->date('dob')->nullable();
            $table->string('phone', 50)->nullable();
            $table->enum('status', ['enabled', 'disabled', 'pending', 'deleted'])->default('pending');
            $table->rememberToken();
            $table->timestamps();
        });
        //
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname', 100);
            $table->string('email', 100);
            $table->string('password', 100);
            $table->date('dob')->nullable();
            $table->string('phone', 50)->nullable();
            $table->enum('status', ['enabled', 'disabled', 'pending', 'deleted'])->default('pending');
            $table->enum('email_verification', [0,1])->default(0);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('user_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('attribute', 50);
            $table->string('value', 2500);
            $table->timestamps();
            //foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('brand');
            $table->string('model');
            $table->string('tag');
            $table->string('problem');
            $table->integer('owner')->unsigned();
            $table->date('due_date');
            $table->dateTime('checked_in');
            $table->dateTime('checked_out');
            $table->timestamps();
            //foreign keys
            $table->foreign('owner')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('item_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->unsigned();
            $table->string('attribute', 50);
            $table->string('value', 2500);
            $table->timestamps();
            //foreign keys
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('repair_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->unsigned();
            $table->integer('technician')->unsigned();
            $table->integer('reviewer')->unsigned();
            $table->enum('technician_fix_confirmation', [0,1])->default(0);
            $table->enum('reviewer_fix_confirmation', [0,1])->default(0);
            $table->enum('status', ['fixed', 'pending'])->default('pending');
            //foreign keys
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('technician')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('reviewer')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('action_trails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('action');
            $table->integer('doer')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->integer('receiver')->unsigned();
            //foreign keys
            $table->foreign('doer')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('receiver')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('users');
        Schema::drop('user_attributes');
        Schema::drop('items');
        Schema::drop('item_attributes');
        Schema::drop('repair_requests');
        Schema::drop('action_trails');
    }
}
