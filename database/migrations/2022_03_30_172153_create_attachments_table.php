<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->id('aid');
            $table->unsignedBigInteger('bid');
            $table->foreign('bid')->references('bid')->on('board');
            $table->string('md5Name')->comment('인코딩 후 파일명');
            $table->string('fileName')->comment('실제 파일명');
            $table->string('fileExt')->nullable()->comment('파일 확장자');
            $table->string('fileSize')->comment('파일 크기');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attachments');
    }
}
