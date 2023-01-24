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
        Schema::table('todo_tag', function (Blueprint $table) {
            $table->foreign('todo_id')
                ->references('id')
                ->on('to_dos')
                ->onDelete('cascade');

            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('todo_tag', function (Blueprint $table) {
            $table->dropForeign('todo_id');
            $table->dropForeign('tag_id');
        });
    }
};
