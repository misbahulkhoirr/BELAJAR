<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('kategori_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->text('excerpt'); // untuk membuat read more
            $table->text('body');
            $table->timestamp('publish_at')->nullable(); // timestamp(tipedata) untuk membuat kapan postingan di publish
            $table->timestamps(); // timestamps(untuk created_at dan updated_at) untuk melihat kapan postingan di buat
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
