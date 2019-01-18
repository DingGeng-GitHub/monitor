<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryToIpList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ip_list', function (Blueprint $table) {
            $table->tinyInteger('categroy')->after('id')->nullable()->default(0)->comment('服务器分类：0 币服务器    1 web服务器');
            $table->string('item')->after('categroy')->nullable()->comment('项目名');
            $table->string('currency')->after('item')->nullable()->comment('币种');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ip_list', function (Blueprint $table) {
            //
        });
    }
}
