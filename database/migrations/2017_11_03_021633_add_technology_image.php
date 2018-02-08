<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTechnologyImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('technology', function (Blueprint $table) {
            $table->string('image', 500)->charset('utf8')->nullable(true)->default(null);
            $table->string('description')->nullable(true)->change();
            $table->string('description')->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('technology', function (Blueprint $table) {
            $table->dropColumn(['image']);
            $table->string('description')->nullable(false)->change();
            $table->string('description')->default('')->change();
        });
    }
}
