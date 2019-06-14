<?php


use PHPUnit\Framework\TestCase;
use Src\Task1;

class Task1Test extends TestCase
{
    public function testPrintDepth()
    {
        $a = [
            'key1' => 1,
            'key2' => [
                'key3' => 1,
                'key4' => [
                    'key5' => 4,
                ],
            ],
        ];

        $depthPrint = new Task1();

        $this->expectOutputString("key1 1\r\nkey2 1\r\nkey3 2\r\nkey4 2\r\nkey5 3\r\n");

        $depthPrint->printDepth($a);
    }
}

?>