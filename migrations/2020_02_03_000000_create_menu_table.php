<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->comment("菜单名称");
            $table->string('icon')->default('')->comment("菜单图标");
            $table->string('component')->default('')->comment("菜单vue组件");
            $table->string('parent_component')->default('')->comment("菜单vue父级组件");
            $table->string('uri')->default('')->comment("菜单的uri");
            $table->string('permission')->default('')->comment("对应的权限");
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `menus` comment '菜单主表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
