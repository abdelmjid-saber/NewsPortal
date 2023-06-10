<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('logo');
            $table->text('favicon');
            $table->text('title_categories');
            $table->text('description_categories');
            $table->text('title_newsletter');
            $table->text('description_newsletter');
            $table->text('text_bottom_newsletter');
            $table->text('photo_newsletter');
            $table->text('analytic_id');
            $table->text('analytic_status');
            $table->text('disqus_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
