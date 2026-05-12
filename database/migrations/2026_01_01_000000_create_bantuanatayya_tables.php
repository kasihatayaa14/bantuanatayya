<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('username')->unique();
            $table->string('password');

            $table->enum('role', ['admin', 'petugas']);

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('jabatan', function (Blueprint $table) {
            $table->id('id_jabatan');
            $table->string('nama_jabatan');
            $table->timestamps();
        });

        Schema::create('pangkat', function (Blueprint $table) {
            $table->id('id_pangkat');
            $table->string('nama_pangkat');
            $table->timestamps();
        });

        Schema::create('status', function (Blueprint $table) {
            $table->id('id_status');
            $table->string('nama_status');
            $table->timestamps();
        });

        Schema::create('wilayah', function (Blueprint $table) {
            $table->id('id_wilayah');
            $table->string('nama_wilayah');
            $table->timestamps();
        });

        Schema::create('penerima', function (Blueprint $table) {
            $table->id('id_penerima');

            $table->string('nik')->unique();
            $table->string('nama_penerima');

            $table->text('alamat');

            $table->unsignedBigInteger('id_jabatan');
            $table->unsignedBigInteger('id_pangkat');
            $table->unsignedBigInteger('id_status');
            $table->unsignedBigInteger('id_wilayah');

            $table->timestamps();

            $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatan');
            $table->foreign('id_pangkat')->references('id_pangkat')->on('pangkat');
            $table->foreign('id_status')->references('id_status')->on('status');
            $table->foreign('id_wilayah')->references('id_wilayah')->on('wilayah');
        });

        Schema::create('kategori_bantuan', function (Blueprint $table) {
            $table->id('id_kategori_bantuan');
            $table->string('nama_kategori');
            $table->timestamps();
        });

        Schema::create('jenis_bantuan', function (Blueprint $table) {
            $table->id('id_jenis_bantuan');

            $table->unsignedBigInteger('id_kategori_bantuan');

            $table->string('nama_bantuan');

            $table->timestamps();

            $table->foreign('id_kategori_bantuan')
                ->references('id_kategori_bantuan')
                ->on('kategori_bantuan');
        });

        Schema::create('status_pengajuan', function (Blueprint $table) {
            $table->id('id_status_pengajuan');
            $table->string('nama_status_pengajuan');
            $table->timestamps();
        });

        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id('id_pengajuan');

            $table->unsignedBigInteger('id_penerima');
            $table->unsignedBigInteger('id_jenis_bantuan');
            $table->unsignedBigInteger('id_status_pengajuan');

            $table->date('tanggal_pengajuan');

            $table->text('keterangan')->nullable();

            $table->timestamps();

            $table->foreign('id_penerima')
                ->references('id_penerima')
                ->on('penerima');

            $table->foreign('id_jenis_bantuan')
                ->references('id_jenis_bantuan')
                ->on('jenis_bantuan');

            $table->foreign('id_status_pengajuan')
                ->references('id_status_pengajuan')
                ->on('status_pengajuan');
        });

        Schema::create('verifikasi', function (Blueprint $table) {
            $table->id('id_verifikasi');

            $table->unsignedBigInteger('id_pengajuan');
            $table->unsignedBigInteger('id_user');

            $table->date('tanggal_verifikasi');

            $table->string('hasil_verifikasi');

            $table->text('catatan')->nullable();

            $table->timestamps();

            $table->foreign('id_pengajuan')
                ->references('id_pengajuan')
                ->on('pengajuan');

            $table->foreign('id_user')
                ->references('id')
                ->on('users');
        });

        Schema::create('penyaluran', function (Blueprint $table) {
            $table->id('id_penyaluran');

            $table->unsignedBigInteger('id_pengajuan');

            $table->date('tanggal_penyaluran');

            $table->decimal('jumlah_bantuan', 15, 2);

            $table->text('keterangan')->nullable();

            $table->timestamps();

            $table->foreign('id_pengajuan')
                ->references('id_pengajuan')
                ->on('pengajuan');
        });

        Schema::create('bukti_penyaluran', function (Blueprint $table) {
            $table->id('id_bukti_penyaluran');

            $table->unsignedBigInteger('id_penyaluran');

            $table->string('foto_bukti');

            $table->timestamps();

            $table->foreign('id_penyaluran')
                ->references('id_penyaluran')
                ->on('penyaluran');
        });

        Schema::create('berita', function (Blueprint $table) {
            $table->id('id_berita');

            $table->string('judul');

            $table->text('isi_berita');

            $table->string('gambar')->nullable();

            $table->date('tanggal_berita');

            $table->timestamps();
        });

        Schema::create('komentar', function (Blueprint $table) {
            $table->id('id_komentar');

            $table->unsignedBigInteger('id_berita');

            $table->string('nama_pengomentar');

            $table->text('isi_komentar');

            $table->timestamps();

            $table->foreign('id_berita')
                ->references('id_berita')
                ->on('berita');
        });

        Schema::create('login_history', function (Blueprint $table) {
            $table->id('id_login_history');

            $table->unsignedBigInteger('id_user');

            $table->timestamp('login_time');

            $table->string('ip_address');

            $table->timestamps();

            $table->foreign('id_user')
                ->references('id')
                ->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('login_history');
        Schema::dropIfExists('komentar');
        Schema::dropIfExists('berita');
        Schema::dropIfExists('bukti_penyaluran');
        Schema::dropIfExists('penyaluran');
        Schema::dropIfExists('verifikasi');
        Schema::dropIfExists('pengajuan');
        Schema::dropIfExists('status_pengajuan');
        Schema::dropIfExists('jenis_bantuan');
        Schema::dropIfExists('kategori_bantuan');
        Schema::dropIfExists('penerima');
        Schema::dropIfExists('wilayah');
        Schema::dropIfExists('status');
        Schema::dropIfExists('pangkat');
        Schema::dropIfExists('jabatan');
        Schema::dropIfExists('users');
    }
};