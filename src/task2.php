<?php

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

printDepth($a);



function printDepth($data)
{
    $depth = 1;
    
    while(is_array($data))
    {
        $temp = [];
        foreach($data as $key => $value)
        {
            echo $key." ".$depth."\r\n";
            
            if(is_array($value) || gettype($value) == "object")
            {
                
                $temp = array_merge((array)$value, $temp);
            }
        }
        
        $depth++;
        
        count($temp) ? $data = $temp : $data = null;
        
    }
}

/**
 * is_array
 * 
 * foreach($a as $key):
 * return 1
 * endforeach
 * 
 * return 0;
 */

 /**
  * array_merge(array $array1, array $array2 = null):
  *
  * foreach($array2 as $key => $value)
  * $array1[$key] => $value
  * endforeach
  *
  * return $array1
  */

 /**
  * count(Traversable $items):
  * $count = 0
  *
  * foreach($items as $item) $count+=1
  * endforeach
  *
  * return $count
  */

?>