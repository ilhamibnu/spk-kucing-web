<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Artikel;
use App\Models\DetailPenyakit;
use App\Models\Dokter;
use App\Models\Gejala;
use App\Models\JenisKucing;
use App\Models\Penyakit;
use App\Models\PenyakitKulit;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Role::create([
            'nama' => 'admin',
        ]);

        Role::create([
            'nama' => 'user',
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'google' => '0',
            'password' => bcrypt('admin'),
            'role_id' => 1,
        ]);

        Penyakit::create([
            'kode' => 'P01',
            'nama' => 'Ringworm',
            'deskripsi' => 'Ringworm adalah infeksi jamur pada kulit, rambut, atau kuku yang disebabkan oleh jamur dermatofita. Infeksi ini dapat menyerang siapa saja, baik pria maupun wanita, dan dapat menyebar melalui kontak langsung dengan orang yang terinfeksi atau dengan benda yang terkontaminasi.',
            'solusi' => 'Menggunakan obat antijamur, seperti krim, salep, atau bedak. Obat ini dapat diberikan dalam bentuk salep atau krim yang dioleskan pada kulit yang terinfeksi. Jika infeksi sudah menyebar, dokter mungkin akan memberikan obat antijamur dalam bentuk tablet atau kapsul.',
        ]);

        Penyakit::create([
            'kode' => 'P02',
            'nama' => 'Scabies',
            'deskripsi' => 'Scabies adalah infeksi kulit yang disebabkan oleh
            tungau. Tungau ini menyerang kulit dan menyebabkan gatal-gatal. Infeksi ini dapat menyebar melalui kontak langsung dengan orang yang terinfeksi atau dengan benda yang terkontaminasi.',
            'solusi' => 'Menggunakan obat antijamur, seperti krim, salep, atau bedak. Obat ini dapat diberikan dalam bentuk salep atau krim yang dioleskan pada kulit yang terinfeksi. Jika infeksi sudah menyebar, dokter mungkin akan memberikan obat antijamur dalam bentuk tablet atau kapsul.',
        ]);

        Penyakit::create([
            'kode' => 'P03',
            'nama' => 'Abses',
            'deskripsi' => 'Abses adalah kantung nanah yang terbentuk di dalam jaringan tubuh. Abses dapat terjadi di mana saja di dalam tubuh, dan dapat disebabkan oleh infeksi bakteri, virus, atau jamur. Abses dapat terjadi di kulit, otak, paru-paru, hati, ginjal, atau di dalam rongga mulut.',
            'solusi' => 'Abses dapat diobati dengan cara mengeringkan nanah yang ada di dalamnya. Dokter akan melakukan pembedahan untuk mengeringkan nanah yang ada di dalam abses. Setelah nanah di dalam abses diangkat, dokter akan memberikan antibiotik untuk mencegah infeksi kembali.',
        ]);

        Penyakit::create([
            'kode' => 'P04',
            'nama' => 'Allergic Dermatitis',
            'deskripsi' => 'Allergic dermatitis adalah reaksi alergi yang terjadi pada kulit. Reaksi alergi ini dapat disebabkan oleh kontak dengan bahan kimia, seperti sabun, deterjen, kosmetik, atau obat-obatan. Reaksi alergi ini dapat menyebabkan gatal-gatal, kemerahan, dan bengkak pada kulit.',
            'solusi' => 'Menghindari bahan kimia yang dapat menyebabkan reaksi alergi. Jika reaksi alergi sudah terjadi, dokter akan memberikan obat antihistamin untuk mengurangi gatal-gatal dan bengkak pada kulit.',
        ]);

        Penyakit::create([
            'kode' => 'P05',
            'nama' => 'Pinjal',
            'deskripsi' => 'Pinjal adalah infeksi kulit yang disebabkan oleh cacing parasit. Infeksi ini dapat menyerang siapa saja, baik pria maupun wanita, dan dapat menyebar melalui kontak langsung dengan orang yang terinfeksi atau dengan benda yang terkontaminasi.',
            'solusi' => 'Menggunakan obat antiparasit, seperti albendazol atau mebendazol. Obat ini dapat diberikan dalam bentuk tablet atau kapsul yang diminum.',
        ]);

        Penyakit::create([
            'kode' => 'P06',
            'nama' => 'Feline Acne',
            'deskripsi' => 'Feline acne adalah infeksi kulit yang disebabkan oleh bakteri. Infeksi ini dapat menyerang siapa saja, baik pria maupun wanita, dan dapat menyebar melalui kontak langsung dengan orang yang terinfeksi atau dengan benda yang terkontaminasi.',
            'solusi' => 'Menggunakan obat antibiotik, seperti krim, salep, atau bedak. Obat ini dapat diberikan dalam bentuk salep atau krim yang dioleskan pada kulit yang terinfeksi. Jika infeksi sudah menyebar, dokter mungkin akan memberikan obat antibiotik dalam bentuk tablet atau kapsul.',
        ]);

        Penyakit::create([
            'kode' => 'P07',
            'nama' => 'Kulit Berketombe',
            'deskripsi' => 'Kulit berketombe adalah kondisi kulit yang kering dan bersisik. Kondisi ini dapat disebabkan oleh kekurangan vitamin, kelembapan, atau kebersihan. Kulit berketombe dapat menyerang siapa saja, baik pria maupun wanita, dan dapat menyebar melalui kontak langsung dengan orang yang terinfeksi atau dengan benda yang terkontaminasi.',
            'solusi' => 'Menggunakan sampo anti-ketombe. Sampo ini dapat membantu mengurangi ketombe pada kulit kepala. Jika ketombe sudah parah, dokter mungkin akan memberikan obat anti-ketombe dalam bentuk salep atau krim.',
        ]);

        Penyakit::create([
            'kode' => 'P08',
            'nama' => 'Kutu Bulu',
            'deskripsi' => 'Kutu bulu adalah infeksi kulit yang disebabkan oleh kutu. Infeksi ini dapat menyerang siapa saja, baik pria maupun wanita, dan dapat menyebar melalui kontak langsung dengan orang yang terinfeksi atau dengan benda yang terkontaminasi.',
            'solusi' => 'Menggunakan obat antiparasit, seperti krim, salep, atau bedak. Obat ini dapat diberikan dalam bentuk salep atau krim yang dioleskan pada kulit yang terinfeksi. Jika infeksi sudah menyebar, dokter mungkin akan memberikan obat antiparasit dalam bentuk tablet atau kapsul.',
        ]);

        Penyakit::create([
            'kode' => 'P09',
            'nama' => 'Tungu Telinga',
            'deskripsi' => 'Tungu telinga adalah infeksi kulit yang disebabkan oleh tungau. Infeksi ini dapat menyerang siapa saja, baik pria maupun wanita, dan dapat menyebar melalui kontak langsung dengan orang yang terinfeksi atau dengan benda yang terkontaminasi.',
            'solusi' => 'Menggunakan obat antijamur, seperti krim, salep, atau bedak. Obat ini dapat diberikan dalam bentuk salep atau krim yang dioleskan pada kulit yang terinfeksi. Jika infeksi sudah menyebar, dokter mungkin akan memberikan obat antijamur dalam bentuk tablet atau kapsul.',
        ]);



        Gejala::create([
            'kode' => 'G01',
            'nama' => 'Rambut rontok',
            'foto' => 'gejala1.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+rontok+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G02',
            'nama' => 'Kulit kemerahan',
            'foto' => 'gejala2.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+kulit+kemerahan+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G03',
            'nama' => 'Gatal-gatal',
            'foto' => 'gejala3.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+gatal+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G04',
            'nama' => 'Kerak berbentuk cincin',
            'foto' => 'gejala4.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+kerak+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G05',
            'nama' => 'Botak di area penyakit',
            'foto' => 'gejala5.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+botak+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G06',
            'nama' => 'Kulit berkerak',
            'foto' => 'gejala6.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+berkerak+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G07',
            'nama' => 'Gatal telinga',
            'foto' => 'gejala7.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+gatal+telinga+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G08',
            'nama' => 'Kebotakan pada daerah tubuh',
            'foto' => 'gejala8.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+kebotakan+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G09',
            'nama' => 'Kulit kering',
            'foto' => 'gejala9.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+kulit+kering+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G10',
            'nama' => 'Kerak pada wajah, telinga, kaki, dan ekor',
            'foto' => 'gejala10.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+kerak+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G11',
            'nama' => 'Kulit terluka',
            'foto' => 'gejala11.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+luka+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G12',
            'nama' => 'Bengkak dengan konsistensi lunak',
            'foto' => 'gejala12.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+bengkak+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G13',
            'nama' => 'Respon sakit ketika area luka dipegang',
            'foto' => 'gejala13.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+sakit+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G14',
            'nama' => 'Luka bernanah',
            'foto' => 'gejala14.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+nanah+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G15',
            'nama' => 'Demam',
            'foto' => 'gejala15.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+demam+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G16',
            'nama' => 'Nafsu makan berkurang',
            'foto' => 'gejala16.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+nafsu+makan+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G17',
            'nama' => 'Gangguan pencernaan',
            'foto' => 'gejala17.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+pencernaan+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G18',
            'nama' => 'Kutu loncat pipih',
            'foto' => 'gejala18.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+kutu+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G19',
            'nama' => 'Bulu pada ekor menipis',
            'foto' => 'gejala19.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+bulu+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G20',
            'nama' => 'Ada bintik hitam/merah',
            'foto' => 'gejala20.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+bintik+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G21',
            'nama' => 'Penebalan pada bagian dagu',
            'foto' => 'gejala21.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+penebalan+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G22',
            'nama' => 'Kulit berminyak',
            'foto' => 'gejala22.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+minyak+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G23',
            'nama' => 'Bintik putih di rambut',
            'foto' => 'gejala23.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+bintik+putih+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G24',
            'nama' => 'Terlihat lemah & lesu',
            'foto' => 'gejala24.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+lemah+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G25',
            'nama' => 'Peradangan akibat gigitan',
            'foto' => 'gejala25.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+peradangan+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G26',
            'nama' => 'Mengeluarkan nanah',
            'foto' => 'gejala26.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+nanah+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G27',
            'nama' => 'Menggaruk belakang telinga',
            'foto' => 'gejala27.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+menggaruk+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G28',
            'nama' => 'Benjolan seperti bisul',
            'foto' => 'gejala28.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+benjolan+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G29',
            'nama' => 'Kotoran telinga lebih banyak dari biasanya',
            'foto' => 'gejala29.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+kotoran+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G30',
            'nama' => 'Sering menggaruk',
            'foto' => 'gejala30.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+menggaruk+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G31',
            'nama' => 'Luka berbentuk benjolan',
            'foto' => 'gejala31.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+luka+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G32',
            'nama' => 'Penebalan Kerak',
            'foto' => 'gejala32.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+penebalan+pada+kucing'
        ]);

        Gejala::create([
            'kode' => 'G33',
            'nama' => 'Rambut tidak berkilau',
            'foto' => 'gejala33.jpg',
            'link_penjelasan' => 'https://www.google.com/search?q=penyakit+rambut+pada+kucing'
        ]);

        // Ringworm
        DetailPenyakit::create([
            'penyakit_id' => 1,
            'gejala_id' => 1,
            'value_cf' => 0.4,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 1,
            'gejala_id' => 2,
            'value_cf' => 1,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 1,
            'gejala_id' => 3,
            'value_cf' => 0.4,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 1,
            'gejala_id' => 4,
            'value_cf' => 1,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 1,
            'gejala_id' => 5,
            'value_cf' => 1,
        ]);

        // Scabies
        DetailPenyakit::create([
            'penyakit_id' => 2,
            'gejala_id' => 1,
            'value_cf' => 0.6,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 2,
            'gejala_id' => 2,
            'value_cf' => 0.4,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 2,
            'gejala_id' => 6,
            'value_cf' => 1,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 2,
            'gejala_id' => 3,
            'value_cf' => 0.8,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 2,
            'gejala_id' => 7,
            'value_cf' => 0.4,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 2,
            'gejala_id' => 8,
            'value_cf' => 0.6,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 2,
            'gejala_id' => 9,
            'value_cf' => 0.4,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 2,
            'gejala_id' => 10,
            'value_cf' => 0.6,
        ]);

        # Abses
        DetailPenyakit::create([
            'penyakit_id' => 3,
            'gejala_id' => 11,
            'value_cf' => 0.6,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 3,
            'gejala_id' => 12,
            'value_cf' => 1,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 3,
            'gejala_id' => 13,
            'value_cf' => 0.8,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 3,
            'gejala_id' => 14,
            'value_cf' => 0.6,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 3,
            'gejala_id' => 15,
            'value_cf' => 0.4,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 2,
            'gejala_id' => 16,
            'value_cf' => 0.6,
        ]);

        # Allergic Dermatitis
        DetailPenyakit::create([
            'penyakit_id' => 4,
            'gejala_id' => 1,
            'value_cf' => 0.8,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 4,
            'gejala_id' => 2,
            'value_cf' => 0.8,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 4,
            'gejala_id' => 6,
            'value_cf' => 0.4,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 4,
            'gejala_id' => 3,
            'value_cf' => 0.8,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 4,
            'gejala_id' => 17,
            'value_cf' => 0.4,
        ]);

        #Pinjal
        DetailPenyakit::create([
            'penyakit_id' => 5,
            'gejala_id' => 18,
            'value_cf' => 1,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 5,
            'gejala_id' => 19,
            'value_cf' => 0.2,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 5,
            'gejala_id' => 1,
            'value_cf' => 0.4,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 5,
            'gejala_id' => 2,
            'value_cf' => 0.4,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 5,
            'gejala_id' => 6,
            'value_cf' => 0,
        ]);

        #Feline Acne
        DetailPenyakit::create([
            'penyakit_id' => 6,
            'gejala_id' => 20,
            'value_cf' => 1,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 6,
            'gejala_id' => 30,
            'value_cf' => 0.6,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 6,
            'gejala_id' => 1,
            'value_cf' => 0.6,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 6,
            'gejala_id' => 2,
            'value_cf' => 1,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 6,
            'gejala_id' => 31,
            'value_cf' => 0.2,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 6,
            'gejala_id' => 21,
            'value_cf' => 0.8,
        ]);

        #Kulit Berketombe
        DetailPenyakit::create([
            'penyakit_id' => 7,
            'gejala_id' => 22,
            'value_cf' => 0.8,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 7,
            'gejala_id' => 3,
            'value_cf' => 0.4,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 7,
            'gejala_id' => 2,
            'value_cf' => 0.4,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 7,
            'gejala_id' => 32,
            'value_cf' => 1,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 7,
            'gejala_id' => 33,
            'value_cf' => 1,
        ]);

        #Kutu Bulu
        DetailPenyakit::create([
            'penyakit_id' => 8,
            'gejala_id' => 1,
            'value_cf' => 1,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 8,
            'gejala_id' => 2,
            'value_cf' => 0.6,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 8,
            'gejala_id' => 6,
            'value_cf' => 0.2,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 8,
            'gejala_id' => 23,
            'value_cf' => 1,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 8,
            'gejala_id' => 24,
            'value_cf' => 0.2,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 8,
            'gejala_id' => 25,
            'value_cf' => 0.8,
        ]);

        #Tungu Telinga
        DetailPenyakit::create([
            'penyakit_id' => 9,
            'gejala_id' => 26,
            'value_cf' => 0.2,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 9,
            'gejala_id' => 27,
            'value_cf' => 0.8,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 9,
            'gejala_id' => 28,
            'value_cf' => 0,
        ]);

        DetailPenyakit::create([
            'penyakit_id' => 9,
            'gejala_id' => 29,
            'value_cf' => 0.8,
        ]);

        Artikel::create([
            'judul' => 'Ringworm',
            'slug' => 'Ringworm adalah infeksi jamur pada kulit, rambut, atau kuku yang disebabkan oleh jamur dermatofita.',
            'isi' => 'Ringworm adalah infeksi jamur pada kulit, rambut, atau kuku yang disebabkan oleh jamur dermatofita. Infeksi ini dapat menyerang siapa saja, baik pria maupun wanita, dan dapat menyebar melalui kontak langsung dengan orang yang terinfeksi atau dengan benda yang terkontaminasi.',
            'image' => null,
        ]);

        Artikel::create([
            'judul' => 'Scabies',
            'slug' => 'Scabies adalah infeksi kulit yang disebabkan oleh tungau. Tungau ini menyerang kulit dan menyebabkan gatal-gatal.',
            'isi' => 'Scabies adalah infeksi kulit yang disebabkan oleh tungau. Tungau ini menyerang kulit dan menyebabkan gatal-gatal. Infeksi ini dapat menyebar melalui kontak langsung dengan orang yang terinfeksi atau dengan benda yang terkontaminasi.',
            'image' => null,
        ]);

        Artikel::create([
            'judul' => 'Abses',
            'slug' => 'Abses adalah kantung nanah yang terbentuk di dalam jaringan tubuh. Abses dapat terjadi di mana saja di dalam tubuh, dan dapat disebabkan oleh infeksi bakteri, virus, atau jamur.',
            'isi' => 'Abses adalah kantung nanah yang terbentuk di dalam jaringan tubuh. Abses dapat terjadi di mana saja di dalam tubuh, dan dapat disebabkan oleh infeksi bakteri, virus, atau jamur. Abses dapat terjadi di kulit, otak, paru-paru, hati, ginjal, atau di dalam rongga mulut.',
            'image' => null,
        ]);

        Artikel::create([
            'judul' => 'Allergic Dermatitis',
            'slug' => 'Allergic dermatitis adalah reaksi alergi yang terjadi pada kulit. Reaksi alergi ini dapat disebabkan oleh kontak dengan bahan kimia, seperti sabun, deterjen, kosmetik, atau obat-obatan.',
            'isi' => 'Allergic dermatitis adalah reaksi alergi yang terjadi pada kulit. Reaksi alergi ini dapat disebabkan oleh kontak dengan bahan kimia, seperti sabun, deterjen, kosmetik, atau obat-obatan. Reaksi alergi ini dapat menyebabkan gatal-gatal, kemerahan, dan bengkak pada kulit.',
            'image' => null,
        ]);

        Artikel::create([
            'judul' => 'Pinjal',
            'slug' => 'Pinjal adalah infeksi kulit yang disebabkan oleh cacing parasit. Infeksi ini dapat menyerang siapa saja, baik pria maupun wanita, dan dapat menyebar melalui kontak langsung dengan orang yang terinfeksi atau dengan benda yang terkontaminasi.',
            'isi' => 'Pinjal adalah infeksi kulit yang disebabkan oleh cacing parasit. Infeksi ini dapat menyerang siapa saja, baik pria maupun wanita, dan dapat menyebar melalui kontak langsung dengan orang yang terinfeksi atau dengan benda yang terkontaminasi.',
            'image' => null,
        ]);

        Artikel::create([
            'judul' => 'Feline Acne',
            'slug' => 'Feline acne adalah infeksi kulit yang disebabkan oleh bakteri yang menyerang kelenjar minyak pada kulit kucing.',
            'isi' => 'Feline acne adalah infeksi kulit yang disebabkan oleh bakteri yang menyerang kelenjar minyak pada kulit kucing. Infeksi ini dapat menyerang siapa saja, baik pria maupun wanita, dan dapat menyebar melalui kontak langsung dengan orang yang terinfeksi atau dengan benda yang terkontaminasi.',
            'image' => null,
        ]);

        Artikel::create([
            'judul' => 'Kulit Berketombe',
            'slug' => 'Kulit berketombe adalah kondisi kulit yang kering dan bersisik. Kondisi ini dapat disebabkan oleh kekurangan vitamin, kelembapan, atau kebersihan.',
            'isi' => 'Kulit berketombe adalah kondisi kulit yang kering dan bersisik. Kondisi ini dapat disebabkan oleh kekurangan vitamin, kelembapan, atau kebersihan. Kulit berketombe dapat menyerang siapa saja, baik pria maupun wanita, dan dapat menyebar melalui kontak langsung dengan orang yang terinfeksi atau dengan benda yang terkontaminasi.',
            'image' => null,
        ]);

        Artikel::create([
            'judul' => 'Kutu Bulu',
            'slug' => 'Kutu bulu adalah infeksi kulit yang disebabkan oleh kutu. Infeksi ini dapat menyerang siapa saja, baik pria maupun wanita, dan dapat menyebar melalui kontak langsung dengan orang yang terinfeksi atau dengan benda yang terkontaminasi.',
            'isi' => 'Kutu bulu adalah infeksi kulit yang disebabkan oleh kutu. Infeksi ini dapat menyerang siapa saja, baik pria maupun wanita, dan dapat menyebar melalui kontak langsung dengan orang yang terinfeksi atau dengan benda yang terkontaminasi.',
            'image' => null,
        ]);

        Artikel::create([
            'judul' => 'Tungu Telinga',
            'slug' => 'Tungu telinga adalah infeksi kulit yang disebabkan oleh tungau. Infeksi ini dapat menyerang siapa saja, baik pria maupun wanita, dan dapat menyebar melalui kontak langsung dengan orang yang terinfeksi atau dengan benda yang terkontaminasi.',
            'isi' => 'Tungu telinga adalah infeksi kulit yang disebabkan oleh tungau. Infeksi ini dapat menyerang siapa saja, baik pria maupun wanita, dan dapat menyebar melalui kontak langsung dengan orang yang terinfeksi atau dengan benda yang terkontaminasi.',
            'image' => null,
        ]);


        JenisKucing::create([
            'judul' => 'Persia',
            'slug' => 'persia',
            'isi' => 'Kucing Persia adalah salah satu ras kucing yang paling populer di dunia. Kucing ini memiliki bulu yang panjang dan lebat, serta wajah yang bulat dan imut. Kucing Persia memiliki karakter yang lembut dan ramah, sehingga cocok untuk dijadikan hewan peliharaan.',
            'image' => null,
        ]);


        JenisKucing::create([
            'judul' => 'Persia',
            'slug' => 'persia',
            'isi' => 'Kucing Persia adalah salah satu ras kucing yang paling populer di dunia. Kucing ini memiliki bulu yang panjang dan lebat, serta wajah yang bulat dan imut. Kucing Persia memiliki karakter yang lembut dan ramah, sehingga cocok untuk dijadikan hewan peliharaan.',
            'image' => null,
        ]);

        JenisKucing::create([
            'judul' => 'Persia',
            'slug' => 'persia',
            'isi' => 'Kucing Persia adalah salah satu ras kucing yang paling populer di dunia. Kucing ini memiliki bulu yang panjang dan lebat, serta wajah yang bulat dan imut. Kucing Persia memiliki karakter yang lembut dan ramah, sehingga cocok untuk dijadikan hewan peliharaan.',
            'image' => null,
        ]);

        JenisKucing::create([
            'judul' => 'Persia',
            'slug' => 'persia',
            'isi' => 'Kucing Persia adalah salah satu ras kucing yang paling populer di dunia. Kucing ini memiliki bulu yang panjang dan lebat, serta wajah yang bulat dan imut. Kucing Persia memiliki karakter yang lembut dan ramah, sehingga cocok untuk dijadikan hewan peliharaan.',
            'image' => null,
        ]);

        JenisKucing::create([
            'judul' => 'Persia',
            'slug' => 'persia',
            'isi' => 'Kucing Persia adalah salah satu ras kucing yang paling populer di dunia. Kucing ini memiliki bulu yang panjang dan lebat, serta wajah yang bulat dan imut. Kucing Persia memiliki karakter yang lembut dan ramah, sehingga cocok untuk dijadikan hewan peliharaan.',
            'image' => null,
        ]);


        JenisKucing::create([
            'judul' => 'Persia',
            'slug' => 'persia',
            'isi' => 'Kucing Persia adalah salah satu ras kucing yang paling populer di dunia. Kucing ini memiliki bulu yang panjang dan lebat, serta wajah yang bulat dan imut. Kucing Persia memiliki karakter yang lembut dan ramah, sehingga cocok untuk dijadikan hewan peliharaan.',
            'image' => null,
        ]);


        JenisKucing::create([
            'judul' => 'Persia',
            'slug' => 'persia',
            'isi' => 'Kucing Persia adalah salah satu ras kucing yang paling populer di dunia. Kucing ini memiliki bulu yang panjang dan lebat, serta wajah yang bulat dan imut. Kucing Persia memiliki karakter yang lembut dan ramah, sehingga cocok untuk dijadikan hewan peliharaan.',
            'image' => null,
        ]);


        JenisKucing::create([
            'judul' => 'Persia',
            'slug' => 'persia',
            'isi' => 'Kucing Persia adalah salah satu ras kucing yang paling populer di dunia. Kucing ini memiliki bulu yang panjang dan lebat, serta wajah yang bulat dan imut. Kucing Persia memiliki karakter yang lembut dan ramah, sehingga cocok untuk dijadikan hewan peliharaan.',
            'image' => null,
        ]);


        PenyakitKulit::create([
            'judul' => 'Ringworm',
            'slug' => 'ringworm',
            'isi' => 'Ringworm adalah infeksi jamur pada kulit, rambut, atau kuku yang disebabkan oleh jamur dermatofita. Infeksi ini dapat menyerang siapa saja, baik pria maupun wanita, dan dapat menyebar melalui kontak langsung dengan orang yang terinfeksi atau dengan benda yang terkontaminasi.',
            'image' => null,
        ]);

        PenyakitKulit::create([
            'judul' => 'Scabies',
            'slug' => 'scabies',
            'isi' => 'Scabies adalah infeksi kulit yang disebabkan oleh tungau. Tungau ini menyerang kulit dan menyebabkan gatal-gatal. Infeksi ini dapat menyebar melalui kontak langsung dengan orang yang terinfeksi atau dengan benda yang terkontaminasi.',
            'image' => null,
        ]);

        PenyakitKulit::create([
            'judul' => 'Abses',
            'slug' => 'abses',
            'isi' => 'Abses adalah kantung nanah yang terbentuk di dalam jaringan tubuh. Abses dapat terjadi di mana saja di dalam tubuh, dan dapat disebabkan oleh infeksi bakteri, virus, atau jamur. Abses dapat terjadi di kulit, otak, paru-paru, hati, ginjal, atau di dalam rongga mulut.',
            'image' => null,
        ]);

        PenyakitKulit::create([
            'judul' => 'Allergic Dermatitis',
            'slug' => 'allergic-dermatitis',
            'isi' => 'Allergic dermatitis adalah reaksi alergi yang terjadi pada kulit. Reaksi alergi ini dapat disebabkan oleh kontak dengan bahan kimia, seperti sabun, deterjen, kosmetik, atau obat-obatan. Reaksi alergi ini dapat menyebabkan gatal-gatal, kemerahan, dan bengkak pada kulit.',
            'image' => null,
        ]);

        PenyakitKulit::create([
            'judul' => 'Pinjal',
            'slug' => 'pinjal',
            'isi' => 'Pinjal adalah infeksi kulit yang disebabkan oleh cacing parasit. Infeksi ini dapat menyerang siapa saja, baik pria maupun wanita, dan dapat menyebar melalui kontak langsung dengan orang yang terinfeksi atau dengan benda yang terkontaminasi.',
            'image' => null,
        ]);

        PenyakitKulit::create([
            'judul' => 'Feline Acne',
            'slug' => 'feline-acne',
            'isi' => 'Feline acne adalah infeksi kulit yang disebabkan oleh bakteri yang menyerang kelenjar minyak pada kulit kucing. Infeksi ini dapat menyerang siapa saja, baik pria maupun wanita, dan dapat menyebar melalui kontak langsung dengan orang yang terinfeksi atau dengan benda yang terkontaminasi.',
            'image' => null,
        ]);

        PenyakitKulit::create([
            'judul' => 'Kulit Berketombe',
            'slug' => 'kulit-berketombe',
            'isi' => 'Kulit berketombe adalah kondisi kulit yang kering dan bersisik. Kondisi ini dapat disebabkan oleh kekurangan vitamin, kelembapan, atau kebersihan. Kulit berketombe dapat menyerang siapa saja, baik pria maupun wanita, dan dapat menyebar melalui kontak langsung dengan orang yang terinfeksi atau dengan benda yang terkontaminasi.',
            'image' => null,
        ]);

        PenyakitKulit::create([
            'judul' => 'Kutu Bulu',
            'slug' => 'kutu-bulu',
            'isi' => 'Kutu bulu adalah infeksi kulit yang disebabkan oleh kutu. Infeksi ini dapat menyerang siapa saja, baik pria maupun wanita, dan dapat menyebar melalui kontak langsung dengan orang yang terinfeksi atau dengan benda yang terkontaminasi.',
            'image' => null,
        ]);

        PenyakitKulit::create([
            'judul' => 'Tungu Telinga',
            'slug' => 'tungu-telinga',
            'isi' => 'Tungu telinga adalah infeksi kulit yang disebabkan oleh tungau. Infeksi ini dapat menyerang siapa saja, baik pria maupun wanita, dan dapat menyebar melalui kontak langsung dengan orang yang terinfeksi atau dengan benda yang terkontaminasi.',
            'image' => null,
        ]);


        Dokter::create([
            'name' => 'Dr. Andi',
            'alamat' => 'Jl. Raya Bogor No. 1, Jakarta',
            'telepon' => '08123456789',
            'image' => null,
        ]);

        Dokter::create([
            'name' => 'Dr. Budi',
            'alamat' => 'Jl. Raya Bogor No. 2, Jakarta',
            'telepon' => '08123456789',
            'image' => null,
        ]);

        Dokter::create([
            'name' => 'Dr. Cici',
            'alamat' => 'Jl. Raya Bogor No. 3, Jakarta',
            'telepon' => '08123456789',
            'image' => null,
        ]);

        Dokter::create([
            'name' => 'Dr. Dedi',
            'alamat' => 'Jl. Raya Bogor No. 4, Jakarta',
            'telepon' => '08123456789',
            'image' => null,
        ]);

        Dokter::create([
            'name' => 'Dr. Eka',
            'alamat' => 'Jl. Raya Bogor No. 5, Jakarta',
            'telepon' => '08123456789',
            'image' => null,
        ]);

        Dokter::create([
            'name' => 'Dr. Fani',
            'alamat' => 'Jl. Raya Bogor No. 6, Jakarta',
            'telepon' => '08123456789',
            'image' => null,
        ]);

        Dokter::create([
            'name' => 'Dr. Gita',
            'alamat' => 'Jl. Raya Bogor No. 7, Jakarta',
            'telepon' => '08123456789',
            'image' => null,
        ]);

        Dokter::create([
            'name' => 'Dr. Hani',
            'alamat' => 'Jl. Raya Bogor No. 8, Jakarta',
            'telepon' => '08123456789',
            'image' => null,
        ]);

        Dokter::create([
            'name' => 'Dr. Ika',
            'alamat' => 'Jl. Raya Bogor No. 9, Jakarta',
            'telepon' => '08123456789',
            'image' => null,
        ]);

        Dokter::create([
            'name' => 'Dr. Joko',
            'alamat' => 'Jl. Raya Bogor No. 10, Jakarta',
            'telepon' => '08123456789',
            'image' => null,
        ]);

        Dokter::create([
            'name' => 'Dr. Kiki',
            'alamat' => 'Jl. Raya Bogor No. 11, Jakarta',
            'telepon' => '08123456789',
            'image' => null,
        ]);
    }
}
