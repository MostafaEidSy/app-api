<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsThreadsTable extends Migration
{
    public function up()
    {
        Schema::create('details_threads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('thread_id')->constrained('threads')->onDelete('cascade');
            $table->string('detail');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('details_threads');
    }
}
