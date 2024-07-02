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
    protected $suratRepository, $donaturRepository, $userRepository, $kegiatanRepository, $asetRepository, $arsipRepository, $anakRepository;

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
        // Bootstrap 4 CSS from CDN
        $bootstrap_css = file_get_contents('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');

        // Path to image
        $path_to_image = public_path('asset/Header.png');

        // Encode image to base64
        $image_data = base64_encode(file_get_contents($path_to_image));

        // Create inline CSS for custom styles
        $custom_css = "
            .header-container {
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 20px;
            }
            .logo-yayasan {
                width: 100%;
                height: auto;
                margin-right: 20px;
            }
            .header-text {
                text-align: center;
            }
            .header-text h1 {
                font-size: 16px;
                font-weight: bold;
                margin-bottom: 5px;
            }
            .header-text h2 {
                font-size: 14px;
                font-weight: bold;
                margin-bottom: 5px;
            }
            .header-text p {
                font-size: 10px;
                margin-bottom: 2px;
            }
        ";

        // Add Bootstrap CSS and custom CSS inline
        $html_with_styles = '<style>' . $bootstrap_css . $custom_css . '</style>';

        // Add the image and header text HTML structure
        $header_html = '
        <div class="header-container">
            <img src="data:image/png;base64,' . $image_data . '" class="logo-yayasan" alt="Logo Yayasan">
        </div>
        <hr style="border: 1px solid black;">
        ';

        // Combine everything
        $html_with_header = $html_with_styles . $header_html . $html;

        return $html_with_header;
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

    public function printPdfPengurus()
    {
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

        $html = view('print.PrintSurat', ['data' => $data])->render();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf($options);
        $html_with_bootstrap = $this->appendBootstrapCSS($html);
        $dompdf->loadHtml($html_with_bootstrap);
        $dompdf->render();
        $nama_file = 'Surat_Tugas'.' '.random_int(100,1000). '.pdf';
        return $dompdf->stream($nama_file);
    }
}
