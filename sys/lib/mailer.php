<?php

namespace sys\lib;

class Mailer
{
    public $to;
    public $from;
    public $subject;
    public $message;
    public $headers;

    public function __construct($to)
    {
        $this->to = $to;
        $this->from = 'yarukandyaruk@gmail.com';
        $this->subject = 'Підтвердження реєстраці';
        $this->message = $this->build_message();
        $this->headers = $this->build_headers();
    }

    private function build_message()
    {
        $html = '';
        $html .= '<html>';
        $html .= '<body>';
        $html .= '<h3>Підтвердження на сайті Vote-Site</h3>';
        $html .= '<h4><a href="http://localhost:81/php/vote-site/auth/confirm/'.$this->to.'">Підтвердити</a></h4>';
        $html .= '</body>';
        $html .= '</html>';
        return $html;
    }
    private function build_headers()
    {
        $headers = "";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "From: $this->from\r\n";
        return $headers;
    }
    public function Send()
    {
        mail($this->to,$this->subject,$this->message,$this->headers);
    }
}