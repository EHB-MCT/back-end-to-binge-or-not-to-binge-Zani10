<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('videos', function (Blueprint $table) {
            // Verwijder de duplicaatindex als deze bestaat
            if (Schema::hasColumn('videos', 'title')) {
                $table->dropIndex(['title']);
            }

            // Voeg de index opnieuw toe
            $table->index('title', 'videos_title_index');
        });
    }

    public function down()
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->dropIndex(['title']);
        });
    }


};
