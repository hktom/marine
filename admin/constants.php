<?php

define("COLUMNS", array(
    0 => 'Société',
    1 => 'Journal',
    2 => "Date d'écriture",
    3 => "Code compte",
    4 => "N° pièce",
    5 => "Libellé pièce (nom du client)",
    6 => "Sens",
    7 => "Montant USD",
    8 => "Montant DEVISE",
    9 => "DEVISE",
    10 => "Axe",
    11 => "Section analytique",
    12 => "Type de ligne",
));


define("SIMPLE_EXPORT", array(
    COLUMNS[12] => 'X',
    COLUMNS[3] => 'standard',
    COLUMNS[6] => 'C',
    COLUMNS[10] => 'CTX',
    COLUMNS[11] => 'standard',
    COLUMNS[7] => 'Sous-total HTC'));

define("NO_TAX_L1", array(
    COLUMNS[12] => 'X',
    COLUMNS[3] => '4111000',
    COLUMNS[6] => 'D',
    COLUMNS[10] => '',
    COLUMNS[11] => '',
    COLUMNS[7] => 'Sous-total HTC'));

define("NO_TAX_L2", array(
    COLUMNS[12] => 'G',
    COLUMNS[3] => 'standard',
    COLUMNS[6] => 'C',
    COLUMNS[10] => 'CTX',
    COLUMNS[11] => 'standard',
    COLUMNS[7] => 'Sous-total HTC'));

define("TAX_L1", array(
    COLUMNS[12] => 'X',
    COLUMNS[3] => '4111000',
    COLUMNS[6] => 'D',
    COLUMNS[10] => '',
    COLUMNS[11] => '',
    COLUMNS[7] => 'Sous-total TTC'));

define("TAX_L2", array(
    COLUMNS[12] => 'G',
    COLUMNS[3] => 'standard',
    COLUMNS[6] => 'C',
    COLUMNS[10] => ' CTX',
    COLUMNS[11] => 'standard',
    COLUMNS[7] => 'Sous-total HTC'));

define("TAX_L3", array(
    COLUMNS[12] => 'G',
    COLUMNS[3] => '4311021',
    COLUMNS[6] => 'C',
    COLUMNS[10] => '',
    COLUMNS[11] => '',
    COLUMNS[7] => 'TVA'));
