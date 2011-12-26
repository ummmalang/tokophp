<?php
/**
 * Memulai Session
 */
session_start();

/**
 * Memuat Konfigurasi
 */
require_once("./konfigurasi.php");
/**
 * Kenapa menggunakan require_once?
 * Karena require_once digunakan untuk memuat file lain
 * tetapi jika file tidak dapat dimuat maka perintah setelah require_once tidak akan dijalankan
 * dan require_once akan memuat file itu sekali saja meskipun perintah tersebut ditulis ribuan kali.
 */

/**
 * Penanganan halaman
 * Perintah isset akan memeriksa apakah $_GET["halaman"] memiliki sebuah nilai.
 */
if(isset($_GET["halaman"]))
{
    /**
     * Jika $_GET["halaman"] memiliki nilai
     * maka periksa  apakah halaman tersebut ada, dengan menggunakan perintah file_exists
     * 
     */
    if(file_exists("./halaman/{$_GET["halaman"]}.php"))
    {
        /**
         * Jika ada maka muat halaman tersebut
         */
        require_once("./halaman/{$_GET["halaman"]}.php");
    }
    else
    {
        /**
         * Jika tidak ada maka muat halaman index
         */
        require_once("./halaman/index.php");
    }
}
else
{
    /**
     * Jika $_GET["halaman"] belum diset atau tidak bernilai, maka muat halaman index juga
     */
    require_once("./halaman/index.php");
}
