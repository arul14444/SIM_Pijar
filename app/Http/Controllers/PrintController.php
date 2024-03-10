<?php

namespace App\Http\Controllers;

use App\Repositories\AnakRepository;
use App\Repositories\ArsipRepository;
use App\Repositories\AsetRepository;
use App\Repositories\DonaturRepository;
use App\Repositories\KegiatanRepository;
use App\Repositories\UserRepository;
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
    public function printPdfAnak()
    {
        $data = $this->anakRepository->getAnak();
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
    public function printPdfDonatur()
    {
        $data = $this->donaturRepository->getDonatur();
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
    public function printPdfAset()
    {
        $data = $this->asetRepository->getAset();
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
