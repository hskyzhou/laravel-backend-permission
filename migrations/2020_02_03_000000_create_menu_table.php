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
            $table->string('title')->comment("菜单名称");
            $table->string('icon')->default('')->nullable()->comment("菜单图标");
            $table->string('url')->default('')->nullable()->comment("菜单的uri");
            $table->string('permission')->default('')->nullable()->comment("对应的权限");
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `menus` comment '菜单主表'");


         Schema::create('menu_recursives', function (Blueprint $table) {
            $table->unsignedBigInteger('menu_id');
            $table->unsignedBigInteger('parent_menu_id');
            $table->integer('sort');
            $table->timestamps();

            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            $table->foreign('parent_menu_id')->references('id')->on('menus')->onDelete('cascade');

            $table->index(['menu_id', 'parent_menu_id']);
        });

        DB::statement("ALTER TABLE `menu_recursives` comment '菜单关系表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_recursives');
        Schema::dropIfExists('menus');
    }
}
