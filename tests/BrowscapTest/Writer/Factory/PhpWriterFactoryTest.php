<?php
declare(strict_types = 1);
namespace BrowscapTest\Writer\Factory;

use Browscap\Writer\Factory\PhpWriterFactory;
use Browscap\Writer\WriterCollection;
use org\bovigo\vfs\vfsStream;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class PhpWriterFactoryTest extends TestCase
{
    public const STORAGE_DIR = 'storage';

    /**
     * @var PhpWriterFactory
     */
    private $object;

    protected function setUp() : void
    {
        vfsStream::setup(self::STORAGE_DIR);

        $this->object = new PhpWriterFactory();
    }

    /**
     * tests creating a writer collection
     */
    public function testCreateCollection() : void
    {
        $logger = $this->createMock(LoggerInterface::class);
        $dir    = vfsStream::url(self::STORAGE_DIR);

        /** @var LoggerInterface $logger */
        static::assertInstanceOf(WriterCollection::class, $this->object->createCollection($logger, $dir));
    }
}
