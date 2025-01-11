<?php
require 'vendor/autoload.php'; // Charger l'autoloader de Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer {
    private $mail;

    public function __construct() {
        $this->mail = new PHPMailer(true);
    }

    public function sendWelcomeEmail($to, $username, $role) {
      try {
          // Configuration du serveur SMTP
          $this->mail->isSMTP();
          $this->mail->Host = 'smtp.gmail.com'; // Remplacez par votre serveur SMTP
          $this->mail->SMTPAuth = true;
          $this->mail->Username = 'ecomliv4@gmail.com'; // Remplacez par votre e-mail
          $this->mail->Password = 'ecomliv2222'; // Remplacez par votre mot de passe
          $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Utiliser TLS
          $this->mail->Port = 587; // Port SMTP

          // Destinataires
          $this->mail->setFrom('no-reply@cultures-partagees.com', 'Cultures Partagées');
          $this->mail->addAddress($to);

          // Contenu de l'e-mail
          $this->mail->isHTML(false); // E-mail en texte brut
          $this->mail->Subject = 'Bienvenue sur notre plateforme !';

          // Message personnalisé en fonction du rôle
          if ($role === 'auteur') {
              $this->mail->Body = "Bonjour $username,\n\n";
              $this->mail->Body .= "Merci de vous être inscrit en tant qu'auteur sur notre plateforme.\n";
              $this->mail->Body .= "Nous vous invitons à publier des articles et à partager vos connaissances.\n\n";
              $this->mail->Body .= "Cordialement,\nL'équipe de Cultures Partagées";
          } elseif ($role === 'lecteur') {
              $this->mail->Body = "Bonjour $username,\n\n";
              $this->mail->Body .= "Merci de vous être inscrit en tant que lecteur sur notre plateforme.\n";
              $this->mail->Body .= "Nous vous encourageons à explorer les articles, à laisser des commentaires et à ajouter vos favoris.\n\n";
              $this->mail->Body .= "Cordialement,\nL'équipe de Cultures Partagées";
          } else {
              throw new Exception("Rôle invalide.");
          }

          // Envoyer l'e-mail
          $this->mail->send();
          return true;
      } catch (Exception $e) {
          throw new Exception("L'e-mail n'a pas pu être envoyé. Erreur : {$this->mail->ErrorInfo}");
      }
  }