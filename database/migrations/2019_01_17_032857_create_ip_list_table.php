<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ip_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role')->nullable()->comment('角色');
            $table->string('IP')->nullable()->comment('公网IP');
            $table->string('Intranet_ip')->nullable()->comment('内网IP');
            $table->string('system_type')->nullable()->comment('操作系统类型');
            $table->tinyInteger('status')->nullable()->default(0)->comment('状态：0 启用    1 弃用');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `ip_list` comment '服务器列表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ip_list');
    }
}
