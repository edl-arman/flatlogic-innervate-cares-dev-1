<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Migration1675081394060 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

                Schema::create('users', function (Blueprint $table) {
                    $table->id();
                    $table->unsignedBigInteger('created_by_user')->nullable();
                    $table->unsignedBigInteger('updated_by_user')->nullable();
                    $table->timestamps();
                });

                Schema::table('users', function (Blueprint $table) {
                    $table->string('firstName')->nullable();

                });

                Schema::table('users', function (Blueprint $table) {
                    $table->string('lastName')->nullable();

                });

                Schema::table('users', function (Blueprint $table) {
                    $table->string('phoneNumber')->nullable();

                });

                Schema::table('users', function (Blueprint $table) {
                    $table->string('email')->nullable();

                });

                Schema::table('users', function (Blueprint $table) {
                    $table->enum('role', ['admin','user'])->nullable();

                });

                Schema::table('users', function (Blueprint $table) {
                    $table->boolean('disabled')->nullable();

                });

                Schema::table('users', function (Blueprint $table) {
                    $table->string('password')->nullable();

                });

                Schema::table('users', function (Blueprint $table) {
                    $table->boolean('emailVerified')->nullable();

                });

                Schema::table('users', function (Blueprint $table) {
                    $table->string('emailVerificationToken')->nullable();

                });

                Schema::table('users', function (Blueprint $table) {
                    $table->timestamp('emailVerificationTokenExpiresAt')->nullable();

                });

                Schema::table('users', function (Blueprint $table) {
                    $table->string('passwordResetToken')->nullable();

                });

                Schema::table('users', function (Blueprint $table) {
                    $table->timestamp('passwordResetTokenExpiresAt')->nullable();

                });

                Schema::table('users', function (Blueprint $table) {
                    $table->string('provider')->nullable();

                });

    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {

                Schema::table('users', function(Blueprint $table) {
                    $table->dropColumn('provider');
                });

                Schema::table('users', function(Blueprint $table) {
                    $table->dropColumn('passwordResetTokenExpiresAt');
                });

                Schema::table('users', function(Blueprint $table) {
                    $table->dropColumn('passwordResetToken');
                });

                Schema::table('users', function(Blueprint $table) {
                    $table->dropColumn('emailVerificationTokenExpiresAt');
                });

                Schema::table('users', function(Blueprint $table) {
                    $table->dropColumn('emailVerificationToken');
                });

                Schema::table('users', function(Blueprint $table) {
                    $table->dropColumn('emailVerified');
                });

                Schema::table('users', function(Blueprint $table) {
                    $table->dropColumn('password');
                });

                Schema::table('users', function(Blueprint $table) {
                    $table->dropColumn('avatar');
                });

                Schema::table('users', function(Blueprint $table) {
                    $table->dropColumn('disabled');
                });

                Schema::table('users', function(Blueprint $table) {
                    $table->dropColumn('role');
                });

                Schema::table('users', function(Blueprint $table) {
                    $table->dropColumn('email');
                });

                Schema::table('users', function(Blueprint $table) {
                    $table->dropColumn('phoneNumber');
                });

                Schema::table('users', function(Blueprint $table) {
                    $table->dropColumn('lastName');
                });

                Schema::table('users', function(Blueprint $table) {
                    $table->dropColumn('firstName');
                });

                Schema::drop('users');

    }
}
