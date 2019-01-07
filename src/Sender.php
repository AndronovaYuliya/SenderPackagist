<?php

namespace Sender;

use Sender\Template\Templater;
use Sender\Transport\TransportSwiftMailer;
use Swift_TransportException;


class Sender
{
    public static function sendMsg()
    {
        //config + type of sender
        $config=parse_ini_file(dirname(__FILE__,5).'/config/config.ini');

        //name of senderTransport (string"TransportSwiftMailer")
        $nameTransport=$config['nametransport'];

        //Sender\Transport
        $pathSenderTransport='Sender\Transport\\'.$nameTransport;


        //object(Swift_Mailer)
        $sender=$pathSenderTransport::createTransport($config);

        //body of letter
        $template=Templater::template();

        //prepare

        $message=$pathSenderTransport::sendMsg($template);

        //send
        try{
            $sender->send($message);
        }catch (Swift_TransportException $ex) {
            header('Location: /');
        }
    }
}
