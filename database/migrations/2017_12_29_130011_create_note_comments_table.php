<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoteCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('author');
            $table->string('content');
            $table->unsignedInteger('note_id');
            $table->timestamps();

            $table->foreign('note_id')
                ->references('id')->on('notes')
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
        Schema::dropIfExists('note_comments');
    }
}
