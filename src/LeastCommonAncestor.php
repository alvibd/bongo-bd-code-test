<?php

namespace Src;

use Src\Node;

class LeastCommonAncestor
{
    public function lca(Node $node1, Node $node2)
    {
        if ($node1->parent == null) {
            return $node1->value;
        } elseif ($node2->parent == null) {
            return $node2->value;
        }

        /**
         * breaking down the work in separete
         * functions to reduce memory allocation
         */
        $temp1 = $this->findParents($node1);
        $temp2 = $this->findParents($node2);

        return $this->cca($temp1, $temp2);

    }

    /**
     * find the closest common ancestor
     */
    private function cca($parents1, $parents2)
    {
        /**
         * To reduce computation time the reversed check of common ancestry
         */
        if (count($parents1) > count($parents2)) {
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
        for ($i = (count($parents1) - 1), $j = count($parents2) - 1; $i <= $j; $i--, $j--) {
            /**
             * if the smallest string of ancestry
             * finds itself as closest common ancestor
             */
            if ($i == 0 && $parents1[$i] == $parents2[$j]) return $parents1[$i];

            //find the node breaking the line of ancestry
            if ($parents1[$i] != $parents2[$j]) break;


            $cca = $parents1[$i];
        }

        return $cca;
    }

    /**
     * Find the string of heritage
     */
    private function findParents(Node $node)
    {
        $parents = [];

        while (true) {
            if ($node->parent == null) {
                $parents[] = $node->value;
                break;
            }
            $parents[] = $node->value;

            $node = $node->parent;
        }

        return $parents;
    }
}
