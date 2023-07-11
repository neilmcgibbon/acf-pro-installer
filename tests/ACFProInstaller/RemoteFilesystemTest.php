<?php namespace PhilippBaschke\ACFProInstaller\Test;

use PhilippBaschke\ACFProInstaller\RemoteFilesystem;
use \PHPUnit\Framework\TestCase;

class RemoteFilesystemTest extends TestCase
{
    protected $io;
    protected $config;

    protected function setUp(): void
    {
        $this->io = $this->getMockBuilder('Composer\IO\IOInterface')->getMock();
    }

    public function testExtendsComposerRemoteFilesystem()
    {
        $this->assertInstanceOf(
            'Composer\Util\RemoteFilesystem',
            new RemoteFilesystem('', $this->io)
        );
    }

    // Inspired by testCopy of Composer
    public function testCopyUsesAcfFileUrl()
    {
        $acfFileUrl = 'file://'.__FILE__;
        $rfs = new RemoteFilesystem($acfFileUrl, $this->io);
        $file = tempnam(sys_get_temp_dir(), 'pb');

        $this->assertTrue(
            $rfs->copy('http://example.org', 'does-not-exist', $file)
        );
        $this->assertFileExists($file);
        unlink($file);
    }
}
