<?php
/**
 * Mendefinisikan Konfigurasi yang diperlukan
 */
 
/**
 * Konfigurasi Database.
 * Disimpan pada variable $GLOBALS
 */
$GLOBALS["database"]["host"] = "localhost";
$GLOBALS["database"]["user"] = "root";
$GLOBALS["database"]["password"] = "";
$GLOBALS["database"]["dbname"] = "contohwebterstruktur";
/**
 * CATATAN:
 * Kenapa menggunakan $GLOBALS?
 * Karena $GLOBALS merupakan variabel khusus dari PHP,
 * yang mampu dikenali di file manapun yang memuat file ini.
 */