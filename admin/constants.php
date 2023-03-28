<?php

define("COLUMNS", [
      "id",
      "first_name", 
      "last_name", 
      "email", 
      "mobile", 
      "wellness_choice", 
      "activity_sensory_choice", 
      "artistique_path_choice", 
      "guest", 
      "custom_number_guest", 
      "date_from", 
      "date_to", 
      "promo_code", 
      "total", 
      "message", 
      "created_at"
]);

/*
id int(11) NOT NULL AUTO_INCREMENT,
      first_name VARCHAR(255) NOT NULL,
      last_name VARCHAR(255) NOT NULL,
      email VARCHAR(255) NOT NULL,
      mobile VARCHAR(255) NOT NULL,
      wellness_choice VARCHAR(255) NOT NULL,
      activity_sensory_choice VARCHAR(255) NOT NULL,
      artistique_path_choice VARCHAR(255) NOT NULL,
      guest VARCHAR(255) NOT NULL,
      custom_number_guest int(11) NOT NULL,
      date_from VARCHAR(255) NOT NULL,
      date_to VARCHAR(255) NOT NULL,
      promo_code VARCHAR(255) NOT NULL,
      total double NOT NULL,
      message TEXT NULL,
      created_at VARCHAR(255) NOT NULL,
      */


// define("SIMPLE_EXPORT", array(
//     COLUMNS[12] => 'X',
//     COLUMNS[3] => 'standard',
//     COLUMNS[6] => 'C',
//     COLUMNS[10] => 'CTX',
//     COLUMNS[11] => 'standard',
//     COLUMNS[7] => 'Sous-total HTC'));

// define("NO_TAX_L1", array(
//     COLUMNS[12] => 'X',
//     COLUMNS[3] => '4111000',
//     COLUMNS[6] => 'D',
//     COLUMNS[10] => '',
//     COLUMNS[11] => '',
//     COLUMNS[7] => 'Sous-total HTC'));

// define("NO_TAX_L2", array(
//     COLUMNS[12] => 'G',
//     COLUMNS[3] => 'standard',
//     COLUMNS[6] => 'C',
//     COLUMNS[10] => 'CTX',
//     COLUMNS[11] => 'standard',
//     COLUMNS[7] => 'Sous-total HTC'));

// define("TAX_L1", array(
//     COLUMNS[12] => 'X',
//     COLUMNS[3] => '4111000',
//     COLUMNS[6] => 'D',
//     COLUMNS[10] => '',
//     COLUMNS[11] => '',
//     COLUMNS[7] => 'Sous-total TTC'));

// define("TAX_L2", array(
//     COLUMNS[12] => 'G',
//     COLUMNS[3] => 'standard',
//     COLUMNS[6] => 'C',
//     COLUMNS[10] => ' CTX',
//     COLUMNS[11] => 'standard',
//     COLUMNS[7] => 'Sous-total HTC'));

// define("TAX_L3", array(
//     COLUMNS[12] => 'G',
//     COLUMNS[3] => '4311021',
//     COLUMNS[6] => 'C',
//     COLUMNS[10] => '',
//     COLUMNS[11] => '',
//     COLUMNS[7] => 'TVA'));
