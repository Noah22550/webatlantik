<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $fromEmail  = 'noreply@monsite.fr';
    public string $fromName   = 'Mon Site de Réservation';
    public string $recipients = '';

    public string $userAgent = 'CodeIgniter';

    // ← smtp obligatoire pour Papercut
    public string $protocol = 'smtp';

    public string $mailPath = '/usr/sbin/sendmail';

    // ← adresse Papercut en local
    public string $SMTPHost = '127.0.0.1';

    public string $SMTPAuthMethod = 'login';
    public string $SMTPUser       = '';  // ← vide pour Papercut
    public string $SMTPPass       = '';  // ← vide pour Papercut

    // ← port Papercut par défaut
    public int $SMTPPort = 25;

    public int  $SMTPTimeout    = 5;
    public bool $SMTPKeepAlive  = false;

    // ← vide obligatoire pour Papercut (pas de TLS en local)
    public string $SMTPCrypto = '';

    public bool   $wordWrap  = true;
    public int    $wrapChars = 76;

    // ← html pour les mails formatés
    public string $mailType = 'html';

    public string $charset  = 'UTF-8';
    public bool   $validate = false;
    public int    $priority = 3;
    public string $CRLF     = "\r\n";
    public string $newline  = "\r\n";
    public bool   $BCCBatchMode = false;
    public int    $BCCBatchSize = 200;
    public bool   $DSN          = false;
}