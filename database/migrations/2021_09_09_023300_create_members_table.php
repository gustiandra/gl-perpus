<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('no_hp')->nullable();
            $table->string('address')->nullable();
            $table->string('job')->nullable();
            $table->string('photo_IdCard')->nullable();
            $table->string('photo')->nullable();
            $table->enum('status', ['NONE', 'AKTIF', 'MENUNGGU', 'DIBLOKIR']);
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
        Schema::dropIfExists('members');
    }
}
