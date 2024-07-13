<?php

namespace Database\Seeders;

use App\Models\Anak;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // [
            //     'id_abd_kiri' => 100740041159999488, // Starkey
            //     'id_abd_kanan' => 100740041159999489, // Resound
            //     'id_user' => 100927652562468864, // Suwartini
            //     'nama_lengkap' => 'Abi Robbizidni Hafiz',
            //     'nama_panggilan' => 'Abi',
            //     'tempat_lahir' => '-',
            //     'tgl_lahir' => '2018-04-25',
            //     'kemampuan_kiri' => 110,
            //     'kemampuan_kanan' => 110,
            //     'nomor_telepon' => '085201262998',
            //     'penyakit_penyerta' => 'Jantung, epilepsi, pneumonia',
            //     'bpjs' => 'ya',
            // ],
            // [
            //     'id_abd_kiri' => 100757796923899912, // Belum Punya
            //     'id_abd_kanan' => 100760925086154752, // Nuear
            //     'id_user' => 100927652562468865, // Paisah
            //     'nama_lengkap' => 'Adiba Kanaya Zahra',
            //     'nama_panggilan' => 'Adiba',
            //     'tempat_lahir' => '-',
            //     'tgl_lahir' => '2016-04-09',
            //     'kemampuan_kiri' => 115,
            //     'kemampuan_kanan' => 115,
            //     'nomor_telepon' => '085727391552',
            //     'penyakit_penyerta' => '-',
            //     'bpjs' => 'ya',
            // ],
            // [
            //     'id_abd_kiri' => 100760925086154753, // Kasoem
            //     'id_abd_kanan' => 100760925086154754, // Oction
            //     'id_user' => 100927652562468866, // Heru Ningsih
            //     'nama_lengkap' => 'Afgan Tristan Wicaksono',
            //     'nama_panggilan' => 'Afgan',
            //     'tempat_lahir' => '-',
            //     'tgl_lahir' => '2008-08-26',
            //     'kemampuan_kiri' => null,
            //     'kemampuan_kanan' => null,
            //     'nomor_telepon' => '081325121159',
            //     'penyakit_penyerta' => '-',
            //     'bpjs' => 'tidak',
            // ],
            // [
            //     'id_abd_kiri' => 100740041159999488, // Starkey
            //     'id_abd_kanan' => 100757796923899912, // Belum Punya
            //     'id_user' => 100927652562468867, // Nur Arinal Baroroh
            //     'nama_lengkap' => 'Ahmad Faisal Hakim',
            //     'nama_panggilan' => 'Hakim',
            //     'tempat_lahir' => '-',
            //     'tgl_lahir' => '2015-01-29',
            //     'kemampuan_kiri' => 100,
            //     'kemampuan_kanan' => 110,
            //     'nomor_telepon' => '085700615003',
            //     'penyakit_penyerta' => 'GDD, SNHL',
            //     'bpjs' => 'ya',
            // ],
            // [
            //     'id_abd_kiri' => 100760925086154753, // Kasoem
            //     'id_abd_kanan' => 100760925086154754, // Oction
            //     'id_user' => 100927652562468868, // Untari
            //     'nama_lengkap' => 'Akhira Shalwa Nuri Ramadhina',
            //     'nama_panggilan' => 'Shalwa',
            //     'tempat_lahir' => '-',
            //     'tgl_lahir' => '2016-07-05',
            //     'kemampuan_kiri' => null,
            //     'kemampuan_kanan' => null,
            //     'nomor_telepon' => '087728011359',
            //     'penyakit_penyerta' => '-',
            //     'bpjs' => 'ya',
            // ],
            // [
            //     'id_abd_kiri' => 100740041159999488, // Starkey
            //     'id_abd_kanan' => 100760925086154752, // Nuear
            //     'id_user' => 100927652562468869, // Fitri Qomariah
            //     'nama_lengkap' => 'Al Sahlan Wahyu Santosa',
            //     'nama_panggilan' => 'Sahlan',
            //     'tempat_lahir' => '-',
            //     'tgl_lahir' => '2016-07-18',
            //     'kemampuan_kiri' => 110,
            //     'kemampuan_kanan' => 110,
            //     'nomor_telepon' => '085801786978',
            //     'penyakit_penyerta' => '-',
            //     'bpjs' => 'ya',
            // ],
            // [
            //     'id_abd_kiri' => 100760925086154760, // Exceed
            //     'id_abd_kanan' => 100760925086154753, // Kasoem
            //     'id_user' => 100927652562468870, // Wantiasih
            //     'nama_lengkap' => 'Alfaro Dian Prayuda',
            //     'nama_panggilan' => 'Alfaro',
            //     'tempat_lahir' => '-',
            //     'tgl_lahir' => '2016-05-11',
            //     'kemampuan_kiri' => 103,
            //     'kemampuan_kanan' => 101,
            //     'nomor_telepon' => '085712074934',
            //     'penyakit_penyerta' => '-',
            //     'bpjs' => 'ya',
            // ],
            // [
            //     'id_abd_kiri' => 100740041159999488, // Starkey
            //     'id_abd_kanan' => 100760925086154760, // Exceed
            //     'id_user' => 100927652562468871, // Yati
            //     'nama_lengkap' => 'Angga Pratama',
            //     'nama_panggilan' => 'Angga',
            //     'tempat_lahir' => '-',
            //     'tgl_lahir' => '2012-05-30',
            //     'kemampuan_kiri' => 90,
            //     'kemampuan_kanan' => 95,
            //     'nomor_telepon' => '085866176460',
            //     'penyakit_penyerta' => '-',
            //     'bpjs' => 'tidak',
            // ],
            // [
            //     'id_abd_kiri' => 100760925086154754, // Oction
            //     'id_abd_kanan' => 100760925086154753, // Kasoem
            //     'id_user' => 100927652562468872, // Yuni
            //     'nama_lengkap' => 'Anindya Fauziah',
            //     'nama_panggilan' => 'Anin',
            //     'tempat_lahir' => '-',
            //     'tgl_lahir' => '2017-07-26',
            //     'kemampuan_kiri' => 120,
            //     'kemampuan_kanan' => 120,
            //     'nomor_telepon' => '082138989961',
            //     'penyakit_penyerta' => '-',
            //     'bpjs' => 'ya',
            // ],
            // [
            //     'id_abd_kiri' => 100757796923899912, // Belum Punya
            //     'id_abd_kanan' => 100760925086154752, // Nuear
            //     'id_user' => 100927652562468873, // Dwi Handayani
            //     'nama_lengkap' => 'Anindya Putri Aprilia',
            //     'nama_panggilan' => 'Anindya',
            //     'tempat_lahir' => '-',
            //     'tgl_lahir' => '2016-04-10',
            //     'kemampuan_kiri' => 115,
            //     'kemampuan_kanan' => 115,
            //     'nomor_telepon' => '089692028047',
            //     'penyakit_penyerta' => '-',
            //     'bpjs' => 'ya',
            // ],
            // [
            //     'id_abd_kiri' => 100757796923899912, // Belum Punya
            //     'id_abd_kanan' => 100757796923899912, // Nuear
            //     'id_user' => 100927652562468869,
            //     'nama_lengkap' => 'Aldi Bagas Setiawan ',
            //     'nama_panggilan' => 'Bagas',
            //     'tempat_lahir' => '-',
            //     'tgl_lahir' => '2010-08-15',
            //     'kemampuan_kiri' => 97,
            //     'kemampuan_kanan' => 97,
            //     'nomor_telepon' => '085875531183',
            //     'penyakit_penyerta' => '-',
            //     'bpjs' => 'tidak',
            // ],
            // [
            //     'id_abd_kiri' => 100760925086154752, // Nuear
            //     'id_abd_kanan' => 100740041159999488, // Starkey
            //     'id_user' => 100927652562468874, // Dita Nur Haryati
            //     'nama_lengkap' => 'Aqila Rauf Zarkasyi',
            //     'nama_panggilan' => 'Rauf',
            //     'tempat_lahir' => '-',
            //     'tgl_lahir' => '2014-12-22',
            //     'kemampuan_kiri' => 100,
            //     'kemampuan_kanan' => 115,
            //     'nomor_telepon' => '085647831105',
            //     'penyakit_penyerta' => '-',
            //     'bpjs' => 'ya',
            // ],
            // [
            //     'id_abd_kiri' => 100757796923899912, // Belum Punya
            //     'id_abd_kanan' => 100760925086154760, // Exceed
            //     'id_user' => 100927652562468891, // Niniek Kusuma Wardhani
            //     'nama_lengkap' => 'Aqlan Harith Ar Ransi',
            //     'nama_panggilan' => 'Aqlan',
            //     'tempat_lahir' => '-',
            //     'tgl_lahir' => '2016-07-01',
            //     'kemampuan_kiri' => 115,
            //     'kemampuan_kanan' => 110,
            //     'nomor_telepon' => '085726542588',
            //     'penyakit_penyerta' => '-',
            //     'bpjs' => 'ya',
            // ],
            // [
            //     'id_abd_kiri' => 100760925086154754, // Oction
            //     'id_abd_kanan' => 100740041159999489, // Resound
            //     'id_user' => 100927652562468875, // Tina Rochmani
            //     'nama_lengkap' => 'Arkhan Hanafi Tamada Maulana',
            //     'nama_panggilan' => 'Tama',
            //     'tempat_lahir' => '-',
            //     'tgl_lahir' => '2016-04-30',
            //     'kemampuan_kiri' => 115,
            //     'kemampuan_kanan' => 110,
            //     'nomor_telepon' => '085865712585',
            //     'penyakit_penyerta' => '-',
            //     'bpjs' => 'tidak',
            // ],
            // [
            //     'id_abd_kiri' => 100740041159999488, // Starkey
            //     'id_abd_kanan' => 100760925086154755, // Rexton joy
            //     'id_user' => 100927652562468876, // Suwarni
            //     'nama_lengkap' => 'Arsyifa Putri Asyar',
            //     'nama_panggilan' => 'Arsy',
            //     'tempat_lahir' => '-',
            //     'tgl_lahir' => '2016-04-27',
            //     'kemampuan_kiri' => null,
            //     'kemampuan_kanan' => null,
            //     'nomor_telepon' => '089674023816',
            //     'penyakit_penyerta' => '-',
            //     'bpjs' => 'tidak',
            // ],
            // [
            //     'id_abd_kiri' => 100760925086154752, // Nuear
            //     'id_abd_kanan' => 100760925086154753, // Kasoem
            //     'id_user' => 100927652562468877, // Siti Ngafifah
            //     'nama_lengkap' => 'Barras Tabrizio Liddien Subula',
            //     'nama_panggilan' => 'Barraz',
            //     'tempat_lahir' => '-',
            //     'tgl_lahir' => '2013-05-17',
            //     'kemampuan_kiri' => 110,
            //     'kemampuan_kanan' => 110,
            //     'nomor_telepon' => '081215056126',
            //     'penyakit_penyerta' => '-',
            //     'bpjs' => 'ya',
            // ],
            // [
            //     'id_abd_kiri' => 100740041159999489, // Resound
            //     'id_abd_kanan' => 100757796923899912, // Belum Punya
            //     'id_user' => 100927652562468878, // Santi Rahayu
            //     'nama_lengkap' => 'Bilal Azka Alghifari',
            //     'nama_panggilan' => 'Azka',
            //     'tempat_lahir' => '-',
            //     'tgl_lahir' => '2017-01-21',
            //     'kemampuan_kiri' => 115,
            //     'kemampuan_kanan' => 115,
            //     'nomor_telepon' => '085391760099',
            //     'penyakit_penyerta' => '-',
            //     'bpjs' => 'ya',
            // ],
            // [
            //     'id_abd_kiri' => 100760925086154760, // Exceed
            //     'id_abd_kanan' => 100740041159999488, // Starkey
            //     'id_user' => 100927652562468879, // Retno
            //     'nama_lengkap' => 'Damara Aura Pandanwangi',
            //     'nama_panggilan' => 'Damara',
            //     'tempat_lahir' => '-',
            //     'tgl_lahir' => '2016-08-18',
            //     'kemampuan_kiri' => 116,
            //     'kemampuan_kanan' => 116,
            //     'nomor_telepon' => '085642018201',
            //     'penyakit_penyerta' => '-',
            //     'bpjs' => 'ya',
            // ],
            // [
            //     'id_abd_kiri' => 100740041159999489, // Resound
            //     'id_abd_kanan' => 100760925086154752, // Nuear
            //     'id_user' => 100927652562468880, // Feti Fatimah
            //     'nama_lengkap' => 'Dave Adnan Khiar Ardani',
            //     'nama_panggilan' => 'Dave',
            //     'tempat_lahir' => '-',
            //     'tgl_lahir' => '2015-11-04',
            //     'kemampuan_kiri' => 110,
            //     'kemampuan_kanan' => 105,
            //     'nomor_telepon' => '085786464313',
            //     'penyakit_penyerta' => '-',
            //     'bpjs' => 'ya',
            // ],
            // [
            //     'id_abd_kiri' => 100740041159999488, // Starkey
            //     'id_abd_kanan' => 100760925086154753, // Kasoem
            //     'id_user' => 100927652562468882, // Retna Purnama S
            //     'nama_lengkap' => 'Devita Syakila Sari',
            //     'nama_panggilan' => 'Kila',
            //     'tempat_lahir' => '-',
            //     'tgl_lahir' => '2016-08-29',
            //     'kemampuan_kiri' => 100,
            //     'kemampuan_kanan' => 80,
            //     'nomor_telepon' => '082008858845',
            //     'penyakit_penyerta' => '-',
            //     'bpjs' => 'ya',
            // ],
            

        ];

        foreach ($data as $key => $val) {
            Anak::create($val);
        }
    }
}
