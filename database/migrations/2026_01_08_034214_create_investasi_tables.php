<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tabel untuk Menu Potensi
        Schema::create('potensis', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('kategori'); // e.g., Pertanian, Industri
            $table->text('deskripsi');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });

        // Tabel untuk Menu Peluang (Proyek Investasi)
        Schema::create('peluangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_proyek');

            // Foreign Key ke tabel sektors (Pastikan file sektors jam 01:00 sudah ada)
            $table->foreignId('sektor_id')->nullable()->constrained('sektors')->onDelete('set null');

            // Foreign Key ke tabel kecamatans (Pastikan file kecamatans jam 01:00 sudah ada)
            $table->foreignId('kecamatan_id')->nullable()->constrained('kecamatans')->onDelete('set null');

            // BigInteger sangat tepat untuk nominal Rupiah dalam jumlah besar
            $table->bigInteger('nilai_investasi')->default(0);

            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->string('status')->default('Tersedia');

            // Koordinat geografis untuk pemetaan Leaflet/Google Maps
            $table->decimal('lat', 10, 8)->nullable();
            $table->decimal('lng', 11, 8)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Nonaktifkan foreign key check sementara agar drop table lancar
        Schema::disableForeignKeyConstraints();
        
        Schema::dropIfExists('peluangs');
        Schema::dropIfExists('potensis');
        
        Schema::enableForeignKeyConstraints();
    }
};