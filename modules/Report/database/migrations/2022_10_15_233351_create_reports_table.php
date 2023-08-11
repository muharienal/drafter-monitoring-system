<?php

use App\Models\User;
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
        Schema::create('reports', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('unit')->default(0);
            $table->longText('nama')->nullable();

            $table->date('tgl')->nullable();
            $table->json('upload_foto')->nullable();
            $table->string('lokasi_barang')->nullable();
            $table->longText('deskripsi_pekerjaan')->nullable();
            $table->string('status')->default('Belom');

            $table->string('prioritas')->default('medium');
            $table->string('drafter');

            $table->longText('equipment')->nullable();
            $table->foreignIdFor(User::class);
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
        Schema::dropIfExists('reports');
    }
};
