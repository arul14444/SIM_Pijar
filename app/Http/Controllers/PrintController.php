<?php

namespace App\Http\Controllers;

use App\Repositories\AnakRepository;
use App\Repositories\ArsipRepository;
use App\Repositories\AsetRepository;
use App\Repositories\DonaturRepository;
use App\Repositories\KegiatanRepository;
use App\Repositories\SuratRepository;
use App\Repositories\UserRepository;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PrintController extends Controller
{
    protected $suratRepository,$donaturRepository, $userRepository, $kegiatanRepository, $asetRepository, $arsipRepository, $anakRepository;

    public function __construct(
        DonaturRepository $donaturRepository,
        UserRepository $userRepository,
        KegiatanRepository $kegiatanRepository,
        AsetRepository $asetRepository,
        ArsipRepository $arsipRepository,
        AnakRepository $anakRepository,
        SuratRepository $suratRepository,
    ) {
        $this->donaturRepository = $donaturRepository;
        $this->userRepository = $userRepository;
        $this->kegiatanRepository = $kegiatanRepository;
        $this->asetRepository = $asetRepository;
        $this->arsipRepository = $arsipRepository;
        $this->anakRepository = $anakRepository;
        $this->suratRepository = $suratRepository;
    }

    private function appendBootstrapCSS($html)
    {
        // Bootstrap 4 CSS dari CDN
        $bootstrap_css = file_get_contents('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    
        // Path ke gambar
        $path_to_image = public_path('asset/header.png');
    
        // Encode gambar menjadi base64
        $image_data = base64_encode(file_get_contents($path_to_image));
    
        // Buat CSS inline untuk gambar
        $image_css = "
            .logo-yayasan {
                background-image: url('data:image/png;base64,{$image_data}');
                width: 15%;
                height: 15%;
                background-size: cover;
            }
        ";
    
        // Tambahkan Bootstrap CSS dan gambar CSS secara inline
        $html_with_bootstrap_and_image = '<style>' . $bootstrap_css . $image_css . '</style>' . $html;
    
        return $html_with_bootstrap_and_image;
    }
    

    public function printPdfAnggota()
    {
        $data = $this->userRepository->getAnggota()->get();
        $html = view('print.PrintAnggota', ['data' => $data])->render();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf($options);
        $html_with_bootstrap = $this->appendBootstrapCSS($html);
        $dompdf->loadHtml($html_with_bootstrap);
        $dompdf->render();

        $tanggal = date('Y-m-d');
        $nama_file = 'Data_Anggota_' . $tanggal . '.pdf';

        // return $html_with_bootstrap;
        return $dompdf->stream($nama_file);
    }
    
    public function printPdfPengurus(){
        $data = $this->userRepository->getPengurus()->get();
        $html = view('print.PrintPengurus', ['data' => $data])->render();
    
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
    
        $dompdf = new Dompdf($options);
        $html_with_bootstrap = $this->appendBootstrapCSS($html);
        $dompdf->loadHtml($html_with_bootstrap);
        $dompdf->render();
    
        $tanggal = date('Y-m-d');
        $nama_file = 'Data_Pengurus_Yayasan_' . $tanggal . '.pdf';
                return $dompdf->stream($nama_file);
    }

    public function printPdfAnak()
    {
        $data = $this->anakRepository->getAnak()->get();
        $html = view('print.PrintAnak', ['data' => $data])->render();
    
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
    
        $dompdf = new Dompdf($options);
        $html_with_bootstrap = $this->appendBootstrapCSS($html);
        $dompdf->loadHtml($html_with_bootstrap);
        $dompdf->render();
    
        $tanggal = date('Y-m-d');
        $nama_file = 'Data_Anak_' . $tanggal . '.pdf';
                return $dompdf->stream($nama_file);
    }
    public function printPdfDonatur()
    {
        $data = $this->donaturRepository->getDonatur()->get();
        $html = view('print.PrintDonatur', ['data' => $data])->render();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf($options);
        $html_with_bootstrap = $this->appendBootstrapCSS($html);
        $dompdf->loadHtml($html_with_bootstrap);
        $dompdf->render();

        $tanggal = date('Y-m-d');
        $nama_file = 'Data_Donatur_' . $tanggal . '.pdf';
                return $dompdf->stream($nama_file);
    }
    public function printPdfAset()
    {
        $data = $this->asetRepository->getAset()->get();
        $html = view('print.PrintAset', ['data' => $data])->render();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf($options);
        $html_with_bootstrap = $this->appendBootstrapCSS($html);
        $dompdf->loadHtml($html_with_bootstrap);
        $dompdf->render();

        $tanggal = date('Y-m-d');
        $nama_file = 'data_Aset_' . $tanggal . '.pdf';
                return $dompdf->stream($nama_file);
    }
    public function printPdfKegiatan()
    {
        $data = $this->kegiatanRepository->getKegiatan()->get();
        $html = view('print.PrintKegiatan', ['data' => $data])->render();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf($options);
        $html_with_bootstrap = $this->appendBootstrapCSS($html);
        $dompdf->loadHtml($html_with_bootstrap);
        $dompdf->render();

        $tanggal = date('Y-m-d');
        $nama_file = 'data_Kegiatan_' . $tanggal . '.pdf';
                return $dompdf->stream($nama_file);
    }
    public function printPdfArsip()
    {
        $data = $this->arsipRepository->getArsip()->get();
        $html = view('print.PrintArsip', ['data' => $data])->render();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf($options);
        $html_with_bootstrap = $this->appendBootstrapCSS($html);
        $dompdf->loadHtml($html_with_bootstrap);
        $dompdf->render();

        $tanggal = date('Y-m-d');
        $nama_file = 'data_Arsip_' . $tanggal . '.pdf';
                return $dompdf->stream($nama_file);
    }


public function printPdfSurat($uuid)
{
    $data = $this->suratRepository->findByUuid($uuid);
    $tgl_dibuat = Carbon::parse($data->tgl_dibuat);
    $bulanIndonesia = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    ];
    $namaBulan = $bulanIndonesia[$tgl_dibuat->month];
    $formatted_tgl_dibuat = $tgl_dibuat->day . ' ' . $namaBulan . ' ' . $tgl_dibuat->year;
    $data->tgl_dibuat = $formatted_tgl_dibuat;

    $html = view('print.PrintSurat', ['data' => $data])->render();

    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);

    $dompdf = new Dompdf($options);
    $html_with_bootstrap = $this->appendBootstrapCSS($html);
    $dompdf->loadHtml($html_with_bootstrap);
    $dompdf->render();

    $nama_file = 'Surat Tugas ' . $data->nomor_surat . $data->tgl_dibuat . ' ' . '.pdf';
    return $dompdf->stream($nama_file);
}

}
