<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Memuat autoload dari Composer
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari formulir
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Konfigurasi pengiriman email menggunakan PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Konfigurasi SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Sesuaikan dengan SMTP server Anda
        $mail->SMTPAuth = true;
        $mail->Username = 'pribaditugasboy@gmail.com'; // Masukkan alamat email Anda
        $mail->Password = 'ndknypmoxfnscxnp'; // Masukkan kata sandi email Anda
        $mail->SMTPSecure = 'tls'; // Gunakan TLS
        $mail->Port = 587; // Port SMTP Gmail

        // Set pengirim dan penerima email
        $mail->setFrom($email, $name);
        $mail->addAddress('ddermdangnwn@gmail.com');

        // Set subjek dan isi email
        $mail->Subject = $subject;
        $mail->Body    = $message;

        // Kirim email
        $mail->send();

        echo "success";  // Print "success" when the email is successfully sent
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }   
} else {
    // Jika tidak ada permintaan POST, kembalikan status lainnya
    http_response_code(403);
    echo "Terdapat masalah dalam pengiriman formulir, silakan coba lagi.";
}
?>
