<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('title');
            $table->string('author');
            $table->string('publisher');
            $table->dateTime('publish_at');
            $table->text('description');
            $table->string('cover')->nullable();
            $table->unsignedBigInteger('rack_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('rack_id')->references('id')->on('racks')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
