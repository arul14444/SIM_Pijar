<?php

namespace App\Services;

use App\Repositories\AbdRepository;
use App\Repositories\AnakRepository;
use App\Repositories\UserRepository;

class DiagramService{
    protected  $anakRepository,$userRepository,$abdRepository, $arsipRepository,$asetRepository,$kegiatanRepository;
    public function __construct(
        AnakRepository $anakRepository,
        UserRepository $userRepository,
        AbdRepository $abdRepository,
    ) {
        $this->anakRepository = $anakRepository;
        $this->userRepository = $userRepository;
        $this->abdRepository = $abdRepository;
    }

}