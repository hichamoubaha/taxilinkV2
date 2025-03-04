<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhoneAndAddressToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('profile_photo'); // Add the phone column
            $table->string('address')->nullable()->after('phone'); // Add the address column
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone'); // Remove the phone column if the migration is rolled back-
            $table->dropColumn('address'); // Remove the address column if the migration is rolled back
        });
    }
}