<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settingwebs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('INFORMATICS')->nullable();
            $table->string('sort_title')->default('IF')->nullable();
            $table->string('footer_title')->default('Copyright © 2024  Dibuat oleh Admin and Team')->nullable();
            $table->string('logo')->nullable();
            $table->string('count_down')->nullable();
            $table->string('link_maps')->nullable();
            $table->string('title_hero')->nullable();
            $table->integer('htm')->nullable();
            $table->boolean('galery')->nullable()->default(false);
            $table->boolean('admin_profile')->nullable()->default(false);
            $table->boolean('menus')->nullable()->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settingwebs');
    }
};