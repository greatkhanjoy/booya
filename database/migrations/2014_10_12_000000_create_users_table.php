<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('username')->unique()->nullable();
            $table->bigInteger('account_number')->unique();
            $table->string('routing')->nullable();
            $table->unsignedInteger('account_status')->default('1')->comment('1 = Active, 2 = Pending, 3 = Suspended, 4 = Rejected, 0 = Ban');
            $table->string('currency')->comment('$');
            $table->unsignedInteger('account_balance');
            $table->string('access_code')->nullable();
            $table->string('tax_code')->nullable();
            $table->string('ref_code')->nullable();
            $table->string('tf_msg')->nullable();
            $table->string('question1')->nullable();
            $table->string('question2')->nullable();
            $table->string('question3')->nullable();
            $table->string('answer1')->nullable();
            $table->string('answer2')->nullable();
            $table->string('answer3')->nullable();
            $table->string('title')->nullable();
            $table->tinyInteger('user_level')->default('1')->comment('1=USER, 2 = ADMIN');
            $table->date('dob')->comment('Date of Birth');
            $table->text('address');
            $table->string('postcode');
            $table->string('country');
            $table->string('phone');
            $table->string('photo')->nullable;
            $table->dateTime('last_login');
            $table->ipAddress('ip_address');
            $table->rememberToken();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('customer_id')->nullable();
            $table->unsignedInteger('pin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
