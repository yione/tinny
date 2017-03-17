<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menues', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name",30)->default('');
            $table->string("url",100)->default('');
            $table->integer("sort")->default(0);
            $table->integer("aid")->default(0);
            $table->string("curr_menu",50)->default('');
            $table->string("curr_submenu",100)->default('');
            $table->string("icon",'100')->default('');
            $table->integer("parent_id")->default(0);
            $table->tinyInteger("state")->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('menues');
    }
}
