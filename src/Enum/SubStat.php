<?php

namespace App\Enum;

enum SubStat : string{
    case PV = "PV";
    case PV_PCT = "PV%";
    case ATQ = "ATQ";
    case ATQ_PCT = "ATQ%";
    case DEF = "DEF";
    case DEF_PCT = "DEF%";
    case PEN = "PEN";
    case Taux_CRIT = "Taux CRIT";
    case DGT_CRIT = "DGT CRIT";
    case Adresse_d_anomalie = "Adresse d'anomalie";
}