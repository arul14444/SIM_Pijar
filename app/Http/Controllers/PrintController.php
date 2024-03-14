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
    
        // Tambahkan Bootstrap CSS secara inline
        $html_with_bootstrap = '<style>' . $bootstrap_css . '</style>' . $html;
    
        return $html_with_bootstrap;
    }

    public function printPdfAnggota()
    {
        $data = $this->userRepository->getAnggota();
        $html = view('print.PrintAnggota', ['data' => $data])->render();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf($options);
        $html_with_bootstrap = $this->appendBootstrapCSS($html);
        $dompdf->loadHtml($html_with_bootstrap);
        $dompdf->render();

        $tanggal = date('Y-m-d');
        $nama_file = 'Data_Anggota_' . $tanggal . '.pdf';

        return $dompdf->stream($nama_file);
    }
    
    public function printPdfPengurus(){
        $data = $this->userRepository->getPengurus();
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
        $data = $this->anakRepository->getAnak();
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
    public function printSurat()
    {
        $html = view('print.PrintSurat')->render();

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
        $data = $this->donaturRepository->getDonatur();
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
        $data = $this->asetRepository->getAset();
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
        $data = $this->kegiatanRepository->getKegiatan();
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
        $data = $this->arsipRepository->getArsip();
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
    
    // Konversi tgl_dibuat ke dalam objek Carbon
    $tgl_dibuat = Carbon::parse($data->tgl_dibuat);

    // Mengonversi nama bulan ke dalam bahasa Indonesia
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

    // Mendapatkan nama bulan dalam bahasa Indonesia
    $namaBulan = $bulanIndonesia[$tgl_dibuat->month];

    // Format tanggal dalam format "7 Januari 2024"
    $formatted_tgl_dibuat = $tgl_dibuat->day . ' ' . $namaBulan . ' ' . $tgl_dibuat->year;

    // Mengirimkan data yang telah diformat ke tampilan
    $data->tgl_dibuat = $formatted_tgl_dibuat;

    $html = view('print.PrintSurat', ['data' => $data])->render();

    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);

    $dompdf = new Dompdf($options);
    $html_with_bootstrap = $this->appendBootstrapCSS($html);
    $dompdf->loadHtml($html_with_bootstrap);
    $dompdf->render();

    $tanggal = date('Y-m-d');
    $nama_file = 'Surat Tugas ' . $tanggal . ' ' . $data->nomor_surat . '.pdf';
    return $dompdf->stream($nama_file);
}

}
