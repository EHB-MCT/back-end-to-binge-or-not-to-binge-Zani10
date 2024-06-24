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
            if (!Schema::hasColumn('videos', 'title')) {
                $table->index('title', 'videos_title_index');
            }
        });
    }

    public function down()
    {
        Schema::table('videos', function (Blueprint $table) {
            if (Schema::hasIndex('videos', 'videos_title_index')) {
                $table->dropIndex(['videos_title_index']);
            }
        });
    }




};
