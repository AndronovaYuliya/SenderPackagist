<?php

namespace Sender\Transport;

interface TransportInterface
{
    public static function sendMsg($template);
}
