<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Ensure PHPMailer is installed via Composer

class EmailService {
    private $mailer;

    public function __construct() {
        $this->mailer = new PHPMailer(true);
        $this->mailer->isSMTP();
        $this->mailer->Host = 'smtp.example.com'; // Your SMTP host
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = 'your_email@example.com';
        $this->mailer->Password = 'your_email_password';
        $this->mailer->SMTPSecure = 'tls';
        $this->mailer->Port = 587;
    }

    public function sendEmail($to, $subject, $body) {
        try {
            $this->mailer->setFrom('your_email@example.com', 'Document Processor');
            $this->mailer->addAddress($to);
            $this->mailer->isHTML(true);
            $this->mailer->Subject = $subject;
            $this->mailer->Body = $body;

            $this->mailer->send();
            return true;
        } catch (Exception $e) {
            throw new Exception("Failed to send email: " . $e->getMessage());
        }
    }
}
?>
