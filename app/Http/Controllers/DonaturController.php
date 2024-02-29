<?php

namespace App\Http\Controllers;

use App\Repositories\DonaturRepository;
use Illuminate\Http\Request;

class DonaturController extends Controller
{
    protected  $donaturRepository;
    public function __construct(
        DonaturRepository $donaturRepository
    ) {
        $this->donaturRepository = $donaturRepository;
    }
    public function dataDonatur(){
        $data = $this->donaturRepository->getDonatur();
        return view('layout.admin.ManagemenDonatur')->with('data', $data);
    }
}
