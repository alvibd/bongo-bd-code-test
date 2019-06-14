<?php


use PHPUnit\Framework\TestCase;
use Src\Node;
use Src\LeastCommonAncestor as LeastCommonAncestor;

class Task2Test extends TestCase
{
    public function testLca()
    {
        $node1 = new Node(1);

        $node2 = new Node(2, $node1);
        
        $node3 = new Node(3, $node1);
        
        $node4 = new Node(4, $node2);
        
        $node5 = new Node(5, $node2);
        
        $node6 = new Node(6, $node3);
        
        $node7 = new Node(7, $node3);
        
        $node8 = new Node(8, $node4);
        
        $node9 = new Node(9, $node4);
        
        $test = new LeastCommonAncestor();

        $this->assertSame($test->lca($node1, $node9), 1);
    }
        
        
}


?>