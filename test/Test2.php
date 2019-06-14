<?php


use PHPUnit\Framework\TestCase;
use Src\Task2;

class Task2Test extends TestCase
{
    public function testPrintDepth()
    {
        
        $person_a = new person("User", "1", null);
        $person_b = new person("User", "2", $person_a);
        
        // echo var_dump((array) $person_b);
        
        $a = [
            'key1' => 1,
            'key2' => [
                'key3' => 1,
                'key4' => [
                    'key5' => 4,
                    "User" => $person_b
                ],
            ],
        ];

        $depthPrint = new Task2();

        $outcome = "key1 1\r\nkey2 1\r\nkey3 2\r\nkey4 2\r\nkey5 3\r\n";
        $outcome .="User 3\r\nfirst_name 4\r\nlast_name 4\r\nfather 4\r\n";
        $outcome .="first_name 5\r\nlast_name 5\r\nfather 5\r\n";
        $this->expectOutputString($outcome);

        $depthPrint->printDepth($a);
    }
}

class person{
    public $first_name;
    public $last_name;
    public $father;
    
    public function __construct($first_name, $last_name, $father = null)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->father = $father;
    }
}

?>