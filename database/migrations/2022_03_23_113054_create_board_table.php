<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('board', function (Blueprint $table) {
            $table->id('bid');
            $table->string('title')->comment('게시글 제목');
            $table->text('content')->comment('게시글 본문');
            $table->timestamp('reg_time')->useCurrent()->comment('게시글 생성 시간');
            $table->timestamp('edit_time')->default(null)->useCurrentOnUpdate()->nullable()->comment('게시글 수정 시간');
            $table->timestamp('del_time')->default(null)->nullable()->comment('게시글 삭제 시간');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('board');
    }
}
