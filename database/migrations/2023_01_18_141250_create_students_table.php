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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('profile');
            $table->string('nama');
            $table->string('npm', 8);
            $table->string('kelas', 10);
            $table->enum('fakultas', ['Ilmu Komputer & Teknologi Informasi', 'Keguruan & Ilmu Pendidikan', 'Manajemen Retail']);
            $table->enum('jurusan', ['Teknik Informatika', 'Sistem Informasi', 'Teknologi Informasi', 'Manajemen Informatika', 'Pendidikan Teknologi Informasi', 'Manajemen']);
            $table->softDeletes();
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
        Schema::dropIfExists('students');
    }
};
