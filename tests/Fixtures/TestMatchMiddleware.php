<?php

namespace Mpociot\BotMan\Tests\Fixtures;

use Mpociot\BotMan\Message;
use Mpociot\BotMan\Drivers\Driver;
use Mpociot\BotMan\Interfaces\MiddlewareInterface;

class TestMatchMiddleware implements MiddlewareInterface
{
    /**
     * Handle / modify the message.
     *
     * @param Message $message
     * @param Driver $driver
     */
    public function handle(Message &$message, Driver $driver)
    {
        $message->addExtras('driver_name', $driver->getName());
        $message->addExtras('test', 'successful');
    }

    /**
     * @param Message $message
     * @param string $test
     * @param bool $regexMatched
     * @return bool
     */
    public function isMessageMatching(Message $message, $test, $regexMatched)
    {
        return true && $regexMatched;
    }
}
