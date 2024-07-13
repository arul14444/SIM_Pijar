<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            // [
            //     'username' => 'suwartini',
            //     'password' => bcrypt('suwartini123'),
            //     'nama' => 'Suwartini',
            //     'alamat' => 'Cadran 06/03, Kraguman, Jogonalan, Klaten',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '085201262998'
            // ],
            // [
            //     'username' => 'paisah',
            //     'password' => bcrypt('paisah123'),
            //     'nama' => 'Paisah',
            //     'alamat' => 'Gatak, Rt 01/01, Wonoboyo, Jogonalan',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '085727391552'
            // ],
            // [
            //     'username' => 'heru_ningsih',
            //     'password' => bcrypt('heru_ningsih123'),
            //     'nama' => 'Heru Ningsih',
            //     'alamat' => 'Macanan Baru RT 06 RW 01, Karanganom, Klaten Utara',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '081325121159'
            // ],
            // [
            //     'username' => 'nur_arinal_baroroh',
            //     'password' => bcrypt('nur_arinal_baroroh123'),
            //     'nama' => 'Nur Arinal Baroroh',
            //     'alamat' => 'Teseh, Rt 02/06, Wangen, Polanharjo',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '085700615003'
            // ],
            // [
            //     'username' => 'untari',
            //     'password' => bcrypt('untari123'),
            //     'nama' => 'Untari',
            //     'alamat' => 'Sumyang, Jogonalan, Klaten',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '087728011359'
            // ],
            // [
            //     'username' => 'fitri_qomariah',
            //     'password' => bcrypt('fitri_qomariah123'),
            //     'nama' => 'Fitri Qomariah',
            //     'alamat' => 'Banjarejo rt 18 rw 9, Jemawen, Jatinom, Klaten',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '085875531183'
            // ],
            // [
            //     'username' => 'wantiasih',
            //     'password' => bcrypt('wantiasih123'),
            //     'nama' => 'Wantiasih',
            //     'alamat' => 'Bawak rt 03 rw 07 Cawas',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '085712074934'
            // ],
            // [
            //     'username' => 'yati',
            //     'password' => bcrypt('yati123'),
            //     'nama' => 'Yati',
            //     'alamat' => 'Pete Timur, RT 1 RW 1, Selomartani, Kalasan, Sleman',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '085866176460'
            // ],
            // [
            //     'username' => 'yuni',
            //     'password' => bcrypt('yuni123'),
            //     'nama' => 'Yuni',
            //     'alamat' => 'Prapatan, Karangturi, Gantiwarno',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '082138989961'
            // ],
            // [
            //     'username' => 'dwi_handayani',
            //     'password' => bcrypt('dwi_handayani123'),
            //     'nama' => 'Dwi Handayani',
            //     'alamat' => 'Majegan, Rt 04/01, Wonosari, Trucuk',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '089692028047'
            // ],
            // [
            //     'username' => 'dita_nur_haryati',
            //     'password' => bcrypt('dita_nur_haryati123'),
            //     'nama' => 'Dita Nur Haryati',
            //     'alamat' => 'Perum glodokan indah, Klaten Selatan, Klaten',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '085647831105'
            // ],
            // [
            //     'username' => 'tina_rochmani',
            //     'password' => bcrypt('tina_rochmani123'),
            //     'nama' => 'Tina Rochmani',
            //     'alamat' => 'Gombang Als, Rt 01/04, Cawas',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '085865712585'
            // ],
            // [
            //     'username' => 'suwarni',
            //     'password' => bcrypt('suwarni123'),
            //     'nama' => 'Suwarni',
            //     'alamat' => 'Sewan, Kahuman, Klaten Selatan',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '089674023816'
            // ],
            // [
            //     'username' => 'siti_ngafifah',
            //     'password' => bcrypt('siti_ngafifah123'),
            //     'nama' => 'Siti Ngafifah',
            //     'alamat' => 'Plosokuning IV, Minomartani, Ngaglik, Sleman, DIY',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '081215056126'
            // ],
            // [
            //     'username' => 'santi_rahayu',
            //     'password' => bcrypt('santi_rahayu123'),
            //     'nama' => 'Santi Rahayu',
            //     'alamat' => 'Brijolor, RT/RW: 16/04, Kalikebo, Trucuk',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '085391760099'
            // ],
            // [
            //     'username' => 'retno',
            //     'password' => bcrypt('retno123'),
            //     'nama' => 'Retno',
            //     'alamat' => 'Mrisen, Turus, Polanharjo',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '085642018201'
            // ],
            // [
            //     'username' => 'feti_fatimah',
            //     'password' => bcrypt('feti_fatimah123'),
            //     'nama' => 'Feti Fatimah',
            //     'alamat' => 'Perum Krapyak Permai Rt01/11, Merbung, Klaten Selatan',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '085786464313'
            // ],
            // [
            //     'username' => 'retna_purnama_s',
            //     'password' => bcrypt('retna_purnama_s123'),
            //     'nama' => 'Retna Purnama S',
            //     'alamat' => 'Krajan, 01/09, Jomboran, Klaten Tengah',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '082008858845'
            // ],
            // [
            //     'username' => 'rini_febriani',
            //     'password' => bcrypt('rini_febriani123'),
            //     'nama' => 'Rini Febriani',
            //     'alamat' => 'Babad, Rt 30/14, Kradenan, Trucuk',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '085646579841'
            // ],
            // [
            //     'username' => 'ratih_kusuma',
            //     'password' => bcrypt('ratih_kusuma123'),
            //     'nama' => 'Ratih Kusuma',
            //     'alamat' => 'Pundungan RT/RW: 02/06, Jonggrangan, Klaten Utara',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '085740700730'
            // ],
            // [
            //     'username' => 'sri_mulyani',
            //     'password' => bcrypt('sri_mulyani123'),
            //     'nama' => 'Sri Mulyani',
            //     'alamat' => 'Telu, Kragilan, Gantiwarno',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '085647508784'
            // ],
            // [
            //     'username' => 'yustina_handaruningsih',
            //     'password' => bcrypt('yustina_handaruningsih123'),
            //     'nama' => 'Yustina Handaruningsih',
            //     'alamat' => 'Mengkan Baru, Jetis, Klaten Selatan',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '085866361607'
            // ],
            // [
            //     'username' => 'tri_utami',
            //     'password' => bcrypt('tri_utami123'),
            //     'nama' => 'Tri Utami',
            //     'alamat' => 'Ngembel, Rt 01/26, Jimbung, Kalikotes',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '081392445471'
            // ],    [
            //     'username' => 'laurensia_sularsih',
            //     'password' => bcrypt('laurensia_sularsih123'),
            //     'nama' => 'Laurensia Sularsih',
            //     'alamat' => 'Banyuripan, Rt 02/01, Banyuripan, Bayat',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '085786425144'
            // ],
            // [
            //     'username' => 'slamet_handayani',
            //     'password' => bcrypt('slamet_handayani123'),
            //     'nama' => 'Slamet Handayani',
            //     'alamat' => 'Dawung, 02/01, Selomartani, Kalasan, Sleman',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '085712882243'
            // ],
            // [
            //     'username' => 'astuti',
            //     'password' => bcrypt('astuti123'),
            //     'nama' => 'Astuti',
            //     'alamat' => 'Ngangkruk, Geneng, Prambanan',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '081380612683'
            // ],
            // [
            //     'username' => 'sri_wahyuni',
            //     'password' => bcrypt('sri_wahyuni123'),
            //     'nama' => 'Sri Wahyuni',
            //     'alamat' => 'Tegalasin, Wiro, Bayat',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '085799938747'
            // ],
            // [
            //     'username' => 'kusrini',
            //     'password' => bcrypt('kusrini123'),
            //     'nama' => 'Kusrini',
            //     'alamat' => 'Ngasem, Krakitan, Bayat',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '85228268254'
            // ],
            // [
            //     'username' => 'siti_fatimah',
            //     'password' => bcrypt('siti_fatimah123'),
            //     'nama' => 'Siti Fatimah',
            //     'alamat' => 'Bono, Bono, Tulung, Klaten',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '085842966371'
            // ],
            // [
            //     'username' => 'nita',
            //     'password' => bcrypt('nita123'),
            //     'nama' => 'Nita',
            //     'alamat' => 'Pepe, Ngawen, Klaten',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '081902167655'
            // ],
            // [
            //     'username' => 'suraida',
            //     'password' => bcrypt('suraida123'),
            //     'nama' => 'Suraida',
            //     'alamat' => 'Gedongan lor rt01 rw 05, Trucuk, Wonosari',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '085715534586'
            // ],
            // [
            //     'username' => 'meisari',
            //     'password' => bcrypt('meisari123'),
            //     'nama' => 'Meisari',
            //     'alamat' => 'Graha Kafila, Geritan, Belang Wetan, Klaten Utara',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '08157765456'
            // ],
            // [
            //     'username' => 'nurul_hidayah',
            //     'password' => bcrypt('nurul_hidayah123'),
            //     'nama' => 'Nurul Hidayah',
            //     'alamat' => 'Padangan, Glodogan, Klaten Selatan',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '08987175726'
            // ],
            // [
            //     'username' => 'tumi_tunaesih',
            //     'password' => bcrypt('tumi_tunaesih123'),
            //     'nama' => 'Tumi Tunaesih',
            //     'alamat' => 'Plaosan 01/ Bugisan, Prambanan',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '085228207831'
            // ],
            // [
            //     'username' => 'siti_hajar',
            //     'password' => bcrypt('siti_hajar123'),
            //     'nama' => 'Siti Hajar',
            //     'alamat' => 'Jetis, Rt 03/01, Gunting, Wonosari',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '085642216921'
            // ],
            // [
            //     'username' => 'dona_mustika',
            //     'password' => bcrypt('dona_mustika123'),
            //     'nama' => 'Dona Mustika',
            //     'alamat' => 'Ngaras kopen rt4 rw 2 kanoman, Karangnongko, Klaten',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '081901005451'
            // ],
            // [
            //     'username' => 'heri_supriyani',
            //     'password' => bcrypt('heri_supriyani123'),
            //     'nama' => 'Heri Supriyani',
            //     'alamat' => 'Kwiran, Rt 02/01, Jambukulon, Ceper',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '081337858863'
            // ],
            // [
            //     'username' => 'rohani_puji_hastuti',
            //     'password' => bcrypt('rohani_puji_hastuti123'),
            //     'nama' => 'Rohani Puji Hastuti',
            //     'alamat' => 'Ngentak, Rt 01/07, Trucuk',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '085729019462'
            // ],
            // [
            //     'username' => 'nining_pr',
            //     'password' => bcrypt('nining_pr123'),
            //     'nama' => 'Nining PR',
            //     'alamat' => 'Dukuh, Keputran, Kemalang',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '082324254854'
            // ],
            // [
            //     'username' => 'mariani_subhi',
            //     'password' => bcrypt('mariani_subhi123'),
            //     'nama' => 'Mariani Subhi',
            //     'alamat' => 'Bebekan, Gergunung, Klaten Utara',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '085728135055'
            // ],
            // [
            //     'username' => 'dwiati',
            //     'password' => bcrypt('dwiati123'),
            //     'nama' => 'Dwiati',
            //     'alamat' => 'Jogorayoh Rt 03/01, Kalikotes',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '085526375411'
            // ],
            // [
            //     'username' => 'erma_dwi_s',
            //     'password' => bcrypt('erma_dwi_s123'),
            //     'nama' => 'Erma Dwi S',
            //     'alamat' => 'Brangkal, Rt 12/06, Barepan, Cawas',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '089602887093'
            // ],
            // [
            //     'username' => 'tri_wahyuni',
            //     'password' => bcrypt('tri_wahyuni123'),
            //     'nama' => 'Tri Wahyuni',
            //     'alamat' => 'Kiringan, RT 2, RW 4, Ponggok, Polanharjo',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '083895077847'
            // ],
            // [
            //     'username' => 'suharti',
            //     'password' => bcrypt('suharti123'),
            //     'nama' => 'Suharti',
            //     'alamat' => 'Gopaten, Gemblegan, Kalikotes',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '081226579901'
            // ],
            // [
            //     'username' => 'rini_hastuti',
            //     'password' => bcrypt('rini_hastuti123'),
            //     'nama' => 'Rini Hastuti',
            //     'alamat' => 'Sidomukti, Prambanan, Klaten',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '082316212395'
            // ],
            // [
            //     'username' => 'sri_paryanti',
            //     'password' => bcrypt('sri_paryanti123'),
            //     'nama' => 'Sri Paryanti',
            //     'alamat' => 'Curen, Melikan, Wedi',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '085726071157'
            // ],    [
            //     'username' => 'sri_widi_hastutik',
            //     'password' => bcrypt('sri_widi_hastutik123'),
            //     'nama' => 'Sri Widi Hastutik',
            //     'alamat' => 'Mardirejo, Karanganom, Klaten Utara, Klaten',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '081233736071'
            // ],
            // [
            //     'username' => 'sri_dwiyanti',
            //     'password' => bcrypt('sri_dwiyanti123'),
            //     'nama' => 'Sri Dwiyanti',
            //     'alamat' => 'Sobrah Gede, Buntalan',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '085643693578'
            // ],
            // [
            //     'username' => 'mariyati',
            //     'password' => bcrypt('mariyati123'),
            //     'nama' => 'Mariyati',
            //     'alamat' => 'Klemut, Jebugan, Klaten Utara',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '088802763417'
            // ],
            // [
            //     'username' => 'iis_sri_r',
            //     'password' => bcrypt('iis_sri_r123'),
            //     'nama' => 'Iis Sri R.',
            //     'alamat' => 'Nologaten, 1/2, Danguran, Klaten Selatan',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '0818252481'
            // ],
            // [
            //     'username' => 'maria_fitria_kurniawati',
            //     'password' => bcrypt('maria_fitria_kurniawati123'),
            //     'nama' => 'Maria Fitria Kurniawati',
            //     'alamat' => 'Kebonarum RT 02 RW 10, Basin, Kebonarum, Klaten',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '081227808489'
            // ],
            // [
            //     'username' => 'anisa',
            //     'password' => bcrypt('anisa123'),
            //     'nama' => 'Anisa',
            //     'alamat' => 'Sobrahlor, Buntalan, Klaten',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '0895344371188'
            // ],
            // [
            //     'username' => 'susiani',
            //     'password' => bcrypt('susiani123'),
            //     'nama' => 'Susiani',
            //     'alamat' => 'Krandon 01/01, Ngering, Jogonalan, Klaten',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '085311080603'
            // ],
            // [
            //     'username' => 'mega_desalina_hidayah',
            //     'password' => bcrypt('mega_desalina_hidayah123'),
            //     'nama' => 'Mega Desalina Hidayah',
            //     'alamat' => 'Tegalrejo, 04/02, Tlingsing, Cawas, Klaten',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '0813195919132'
            // ],
            // [
            //     'username' => 'dewi_ratnasari',
            //     'password' => bcrypt('dewi_ratnasari123'),
            //     'nama' => 'Dewi Ratnasari',
            //     'alamat' => 'Jln. Sultan Agung no 88, Ketandan, Belang Wetan',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '089677120407'
            // ],
            // [
            //     'username' => 'retno_wulandari',
            //     'password' => bcrypt('retno_wulandari123'),
            //     'nama' => 'Retno Wulandari',
            //     'alamat' => 'Krajan, Rt 07/03, Ngolodono, Karangdowo',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '082134525663'
            // ],
            // [
            //     'username' => 'luluk_atika_h',
            //     'password' => bcrypt('luluk_atika_h123'),
            //     'nama' => 'Luluk Atika H',
            //     'alamat' => 'Dukuh rt 3 rw5 Manjung, Ngawen, Klaten',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '08562834332'
            // ],
            // [
            //     'username' => 'arum_choiri_latifah',
            //     'password' => bcrypt('arum_choiri_latifah123'),
            //     'nama' => 'Arum Choiri Latifah',
            //     'alamat' => 'Tegalmulyo, Rt 12/05, Bener, Wonosari',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '081807736174'
            // ],
            // [
            //     'username' => 'tiwi',
            //     'password' => bcrypt('tiwi123'),
            //     'nama' => 'Tiwi',
            //     'alamat' => 'Wantilan, Rt 12  Rw 05, Jeleboyo, Wonosari',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '085716824414'
            // ],
            // [
            //     'username' => 'wulan_juniarti',
            //     'password' => bcrypt('wulan_juniarti123'),
            //     'nama' => 'Wulan Juniarti',
            //     'alamat' => 'Gadingan 1/4, Trunuh, Klaten Selatan',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '082339753970'
            // ],
            // [
            //     'username' => 'dona_mustika',
            //     'password' => bcrypt('dona_mustika123'),
            //     'nama' => 'Dona Mustika',
            //     'alamat' => 'Ngaras kopen rt4 rw 2 kanoman, Karangnongko, Klaten',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '081901005451'
            // ],
            // [
            //     'username' => 'tri_wahyuni',
            //     'password' => bcrypt('tri_wahyuni123'),
            //     'nama' => 'Tri Wahyuni',
            //     'alamat' => 'Perumda No 166, Gergunung',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '081225985210'
            // ],
            // [
            //     'username' => 'atik_nuryatin',
            //     'password' => bcrypt('atik_nuryatin123'),
            //     'nama' => 'Atik Nuryatin',
            //     'alamat' => 'Perum Griya Cempaka Indah, Kalikotes',
            //     'role' => 'anggota',
            //     'nomor_telepon' => '082325236597'
            // ],
            [
                'username' => 'sawitri',
                'password' => bcrypt('sawitri123'),
                'nama' => 'Sawitri',
                'alamat' => 'Duwet RT/RW: 14/06, Ngawen, Klaten',
                'role' => 'anggota',
                'nomor_telepon' => '08562844917'
            ]
        ];
        

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
