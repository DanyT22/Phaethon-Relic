<?php

namespace App\Enum;

enum mainStat: string {
    case PV = "PV";
    case PV_PCT = "PV%";
    case ATQ = "ATQ";
    case ATQ_PCT = "ATQ%";
    case DEF = "DEF";
    case DEF_PCT = "DEF%";
    case Taux_CRIT = "Taux CRIT";
    case Dgt_CRIT = "DGT CRIT";
    case Adresse_d_anomalie = "Adresse d'anomalie";
    case Taux_PEN = "Taux de PEN";
    case DGT_Physiques = "DGT physique";
    case DGT_Feu = "DGT feu";
    case DGT_glace = "DGT glace";
    case DGT_electrique = "DGT electriques";
    case DGT_etheriques = "DGT etheriques";
    case Maitrise_d_anomalie = "Maitrise d'anomalie";
    case Impact = "Impact";
    case Recuperation_energie = "Recuperation d'energie";
}