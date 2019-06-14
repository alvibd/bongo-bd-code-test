<?php

class Node{
    
    public $value;
    
    public $parent;
    
    public function __construct($value, $parent = null)
    {
        $this->value = $value;
        $this->parent = $parent;
    }
}

$node1 = new Node(1);

$node2 = new Node(2, $node1);

$node3 = new Node(3, $node1);

$node4 = new Node(4, $node2);

$node5 = new Node(5, $node2);

$node6 = new Node(6, $node3);

$node7 = new Node(7, $node3);

$node8 = new Node(8, $node4);

$node9 = new Node(9, $node4);


echo lca($node1, $node9);

function lca(Node $node1, Node $node2)
{
    if($node1->parent == null)
    {
        return $node1->value;
    }
    elseif($node2->parent == null)
    {
        return $node2->value;
    }
    
    /**
     * breaking down the work in separete
     * functions to reduce memory allocation
     */
    $temp1 = findParents($node1);
    $temp2 = findParents($node2);
    
    return cca($temp1, $temp2);
    
}

/**
 * find the closest common ancestor
 */
function cca($parents1, $parents2)
{
    /**
     * To reduce computation time the reversed check of common ancestry
     */
    if(count($parents1) > count($parents2))
    {
        $temp = $parents2;
        $parents2 = $parents1;
        
        $parents1 = $temp;
    }
    
    // in case of none of the nodes had any common ancestor
    $cca = "no lca";
    
    /**
     * checking from the last indexes
     * to reduce computational steps
     */
    for($i = (count($parents1) - 1), $j = count($parents2) - 1 ; $i <= $j; $i--, $j--)
    {
        /**
         * if the smallest string of ancestry 
         * finds itself as closest common ancestor
         */
        if($i == 0 && $parents1[$i] == $parents2[$j]) return $parents1[$i];
        
        //find the node breaking the line of ancestry
        if($parents1[$i] != $parents2[$j]) break;
        
        
        $cca = $parents1[$i];
    }
    
    return $cca;
}


/**
 * Find the string of heritage
 */
function findParents(Node $node)
{
    $parents = [];
    
    while(true)
    {
        if($node->parent == null)
        {
            $parents[] = $node->value;
            break;
        }
        $parents[] = $node->value;
        
        $node = $node->parent;
    }
    
    return $parents;
}

?>