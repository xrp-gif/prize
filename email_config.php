<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Sertakan file PHPMailer
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';


// Fungsi untuk mengirim email
function kirim_email($subject, $body) {
    $mail = new PHPMailer(true);
    try {
        // Konfigurasi Gmail SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sutiknomarkoso@gmail.com'; // Ganti dengan email kamu
        $mail->Password = 'dqef kmty axsz fozy';  // Ganti dengan Password Aplikasi Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Pengaturan email
        $mail->setFrom('sutiknomarkoso@gmail.com', 'roni'); // Email pengirim
        $mail->addAddress('sutiknomarkoso@gmail.com'); // Email penerima (bisa sama)

        // Konten email
        $mail->isHTML(false); // Gunakan format teks biasa
        $mail->Subject = $subject;
        $mail->Body = $body;

        // Kirim email
        $mail->send();
        return true; // Email terkirim
    } catch (Exception $e) {
        return false; // Gagal mengirim email
    }
}
?>
