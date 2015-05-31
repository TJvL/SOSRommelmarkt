<?php
class Mailer
{
    public static $errorMailReceivers = "ca.boel@student.avans.nl, dummy@nowhere.com, bbrouwer5@student.avans.nl";
    public static $notifyMailReceivers = "ca.boel@student.avans.nl, sosrommelmarktAccount@blablabla.nl, scottyLove@yogscast.com, bbrouwer5@avans.nl";
    public static $reply = "sosrommelmarkt@dummy.nl";
    public static $noReply = "noreply@dummy.nl";

    public static function sendErrorMail($subject, $content)
    {
        return mail(
            Mailer::$errorMailReceivers,
            $subject,
            $content,
            'From: ' . Mailer::$noReply . "\r\n".
            'X-Mailer: PHP/' . phpversion()
        );
    }

    public static function sendNotifMail($subject, $content)
    {
        return mail(
            Mailer::$notifyMailReceivers,
            $subject,
            $content,
            'From: ' . Mailer::$noReply . "\r\n".
            'X-Mailer: PHP/' . phpversion()
        );
    }

    public static function sendMail($receiver, $subject, $content)
    {
        return mail(
            $receiver,
            $subject,
            $content,
            'From: ' . Mailer::$reply . "\r\n".
            'X-Mailer: PHP/' . phpversion()
        );
    }
}