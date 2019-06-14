<?php

namespace Src;

class Task2
{
    public function printDepth($data)
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