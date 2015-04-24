<?php
class ContactController extends Controller
{
    function __construct()
    {
        parent::__constructor("contact");
    }

    public function index_GET()
    {
        $this->render("index");
    }

    public function index_POST()
    {
        $from = $_POST['email'];
        $to = "caboel@student.avans.nl";
        $subject = $_POST['subject'];
        $message =
            'Verzonden door: ' . $_POST['name'] . "\n".
            'Telefoon nummer: ' . $_POST['phone'] . "\n".
            'Bericht:' . $_POST['comments'] . "\n";
        $headers = 'From: ' . $from . "\r\n";

        date_default_timezone_set("Europe/Amsterdam");

        echo $to;

        if(mail($to, $subject, $message, $headers))
        {
            $this->viewbag['message'] = "Uw bericht is verzonden, wij nemen spoedig contact met U op.";
        }
        else
        {
            $this->viewbag['message'] = "Er is een fout opgetreden, probeer U het later nog eens.";
        }

        $this->render('index');
    }
}
?>