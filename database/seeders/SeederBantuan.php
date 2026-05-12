<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SeederBantuan extends Seeder
{
    public function run(): void
    {

        DB::table('users')->insert([

            [
                'username' => 'admin',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'username' => 'petugas',
                'password' => Hash::make('12345678'),
                'role' => 'petugas',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);

        DB::table('jabatan')->insert([
            ['nama_jabatan' => 'Kepala Keluarga'],
            ['nama_jabatan' => 'Warga']
        ]);

        DB::table('pangkat')->insert([
            ['nama_pangkat' => 'Golongan I'],
            ['nama_pangkat' => 'Golongan II']
        ]);

        DB::table('status')->insert([
            ['nama_status' => 'Aktif'],
            ['nama_status' => 'Tidak Aktif']
        ]);

        DB::table('wilayah')->insert([
            ['nama_wilayah' => 'Medan'],
            ['nama_wilayah' => 'Binjai']
        ]);

        DB::table('kategori_bantuan')->insert([
            ['nama_kategori' => 'Tunai'],
            ['nama_kategori' => 'Sembako']
        ]);

        DB::table('jenis_bantuan')->insert([

            [
                'id_kategori_bantuan' => 1,
                'nama_bantuan' => 'BLT'
            ],

            [
                'id_kategori_bantuan' => 2,
                'nama_bantuan' => 'Beras'
            ]

        ]);

        DB::table('status_pengajuan')->insert([
            ['nama_status_pengajuan' => 'Menunggu'],
            ['nama_status_pengajuan' => 'Disetujui'],
            ['nama_status_pengajuan' => 'Ditolak']
        ]);

        DB::table('penerima')->insert([

            [
                'nik' => '12710001',
                'nama_penerima' => 'Kasih Atayya',
                'alamat' => 'Medan',
                'id_jabatan' => 1,
                'id_pangkat' => 1,
                'id_status' => 1,
                'id_wilayah' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);

        DB::table('pengajuan')->insert([

            [
                'id_penerima' => 1,
                'id_jenis_bantuan' => 1,
                'id_status_pengajuan' => 2,
                'tanggal_pengajuan' => now(),
                'keterangan' => 'Disetujui',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);

        DB::table('verifikasi')->insert([

            [
                'id_pengajuan' => 1,
                'id_user' => 2,
                'tanggal_verifikasi' => now(),
                'hasil_verifikasi' => 'Valid',
                'catatan' => 'Lengkap',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);

        DB::table('penyaluran')->insert([

            [
                'id_pengajuan' => 1,
                'tanggal_penyaluran' => now(),
                'jumlah_bantuan' => 500000,
                'keterangan' => 'Sudah disalurkan',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);

        DB::table('bukti_penyaluran')->insert([

            [
                'id_penyaluran' => 1,
                'foto_bukti' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);

        DB::table('berita')->insert([

            [
                'judul' => 'Bantuan Sosial Cair',
                'isi_berita' => 'Penyaluran bantuan dimulai.',
                'gambar' => 'berita.jpg',
                'tanggal_berita' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);

        DB::table('komentar')->insert([

            [
                'id_berita' => 1,
                'nama_pengomentar' => 'Atayya',
                'isi_komentar' => 'Semoga bermanfaat',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}