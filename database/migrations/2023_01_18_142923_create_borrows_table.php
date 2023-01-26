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
        Schema::create('borrows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('book_id')->constrained('books')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('peminjaman');
            $table->string('pengembalian');
            $table->foreignId('staff_id')->constrained('staff')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('status');
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
        Schema::dropIfExists('borrows');
    }
};
