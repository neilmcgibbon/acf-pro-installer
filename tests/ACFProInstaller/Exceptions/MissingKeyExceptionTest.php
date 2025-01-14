<?php namespace PhilippBaschke\ACFProInstaller\Test\Exceptions;

use \PHPUnit\Framework\TestCase;
use PhilippBaschke\ACFProInstaller\Exceptions\MissingKeyException;

class MissingKeyExceptionTest extends TestCase
{
    public function testMessage()
    {
        $message = 'FIELD';
        $e = new MissingKeyException($message);
        $this->assertEquals(
            'Could not find a key for ACF PRO. ' .
            'Please make it available via the environment variable ' .
            $message,
            $e->getMessage()
        );
    }
}
