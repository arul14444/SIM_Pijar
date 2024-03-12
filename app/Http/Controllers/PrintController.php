<?php

namespace App\Http\Controllers;

use App\Repositories\AnakRepository;
use App\Repositories\ArsipRepository;
use App\Repositories\AsetRepository;
use App\Repositories\DonaturRepository;
use App\Repositories\KegiatanRepository;
use App\Repositories\UserRepository;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    protected $donaturRepository, $userRepository, $kegiatanRepository, $asetRepository, $arsipRepository, $anakRepository;

    public function __construct(
        DonaturRepository $donaturRepository,
        UserRepository $userRepository,
        KegiatanRepository $kegiatanRepository,
        AsetRepository $asetRepository,
        ArsipRepository $arsipRepository,
        AnakRepository $anakRepository
    ) {
        $this->donaturRepository = $donaturRepository;
        $this->userRepository = $userRepository;
        $this->kegiatanRepository = $kegiatanRepository;
        $this->asetRepository = $asetRepository;
        $this->arsipRepository = $arsipRepository;
        $this->anakRepository = $anakRepository;
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
    
    private function appendBootstrapCSS($html)
    {
        // Bootstrap 4 CSS dari CDN
        $bootstrap_css = file_get_contents('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    
        // Tambahkan Bootstrap CSS secara inline
        $html_with_bootstrap = '<style>' . $bootstrap_css . '</style>' . $html;
    
        return $html_with_bootstrap;
    }
    
    
    public function printPdfAnak()
    {
        $data = $this->anakRepository->getAnak();
        $html = view('print.PrintSurat', ['data' => $data])->render();
    
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
        $html = view('print.PrintAnak', ['data' => $data])->render();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf($options);
        $html_with_bootstrap = $this->appendBootstrapCSS($html);
        $dompdf->loadHtml($html_with_bootstrap);
        $dompdf->render();

        $tanggal = date('Y-m-d');
        $nama_file = 'data_Anak_' . $tanggal . '.pdf';
                return $dompdf->stream($nama_file);
    }
    public function printPdfKegiatan()
    {
        $data = $this->kegiatanRepository->getKegiatan();
        $view = view('print.PrintAnggota', ['data' => $data])->render();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($view);
        $dompdf->render();

        $tanggal = date('Y-m-d');
        $nama_file = 'data_Anggota_' . $tanggal . '.pdf';
                return $dompdf->stream($nama_file);
    }
    public function printPdfArsip()
    {
        $data = $this->arsipRepository->getArsip();
        $view = view('print.PrintAnggota', ['data' => $data])->render();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($view);
        $dompdf->render();

        $tanggal = date('Y-m-d');
        $nama_file = 'data_Anggota_' . $tanggal . '.pdf';
                return $dompdf->stream($nama_file);
    }
}
