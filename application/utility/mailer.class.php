<?php
class Mailer
{
    private $mailto;
    private $mailfrom;

    private function __clone(){}
    private function __wakeup(){}

    private static $instance;

    /**
     * @return Mailer
     */
    public static function getInstance()
    {
        if(!isset(self::$instance))
        {
            self::$instance = new Mailer();
        }
        return self::$instance;
    }

    private function __construct()
    {
        $json = file_get_contents('config' . SEPARATOR . 'email.json');
        $decoded = json_decode($json, true);
        $this->mailto = $decoded["MAIL_TO"];
        $this->mailfrom = $decoded["MAIL_FROM"];
    }

    public function sendErrorMail($subject, $content)
    {
        error_log("Mailing from " . $this->mailfrom['onError'] . " to " . $this->mailto['onError'], E_USER_NOTICE);

        $success = mail(
            $this->mailto['onError'],
            $subject,
            $content,
            'From: ' . $this->mailfrom['onError'] . "\r\n".
            'X-Mailer: PHP/' . phpversion()
        );
        $this->handleResult($success);
        return $success;
    }

    public function sendNotifMail($subject, $content)
    {
        $success = mail(
            $this->mailto['onNotify'],
            $subject,
            $content,
            'From: ' . $this->mailfrom['onNotify'] . "\r\n".
            'X-Mailer: PHP/' . phpversion()
        );
        $this->handleResult($success);
        return $success;
    }

    public function sendMail($receiver, $subject, $content)
    {
        $success = mail(
            $receiver,
            $subject,
            $content,
            'From: ' . $this->mailfrom['onNotify'] . "\r\n".
            'X-Mailer: PHP/' . phpversion()
        );
        $this->handleResult($success);
        return $success;
    }

    private function handleResult($result)
    {
        if($result === true)
        {
            error_log("Mail sent", E_USER_NOTICE);
        }
        else
        {
            throw new Exception("Failed to send e-mail");
        }
    }
}