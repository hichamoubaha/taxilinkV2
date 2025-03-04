<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAmountToTripsTable extends Migration
{
    public function up()
    {
        Schema::table('trips', function (Blueprint $table) {
            $table->decimal('amount', 8, 2)->default(0); // Adjust precision and scale as needed
        });
    }
    
    public function down()
    {
        Schema::table('trips', function (Blueprint $table) {
            $table->dropColumn('amount');
        });
    }


}