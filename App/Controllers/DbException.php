<?php

namespace App\Controllers;


use App\Config;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class DbException extends Exception
{
    protected $title = 'Произошла ошибка при работе с базой данных!';

    public function handle(){
        parent::handle();

        $this->logger->critical($this->ex->getMessage(), ['time' => time()]);

        $conf = (Config::getInstance())->data['smtp'];

        $transport = (new Swift_SmtpTransport($conf['host'], $conf['port'], $conf['enc']))
            ->setUsername($conf['login'])
            ->setPassword($conf['pass']);

        $mailer = new Swift_Mailer($transport);

        $message = (new Swift_Message($this->title))
            ->setFrom([$conf['from']])
            ->setTo([$conf['to']])
            ->setBody($this->ex->getMessage());

        $mailer->send($message);
    }
}