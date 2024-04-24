<?php

namespace App\Entity;

use App\Repository\StatusRepository;
use Doctrine\ORM\Mapping as ORM;

enum Status: string
{

    case EN_ATTENTE = "EN_ATTENTE";
    case ENCAISSE = "ENCAISSE";
    case REJETE = "REJETE";
}
