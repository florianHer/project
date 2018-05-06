<?php

namespace Project\Problem;

require 'iProblem.php';
var_dump('OKOKOKOK');
class Problem_1 implements iProblem
{
    /**
     * @param $problemNumber
     */
    public function getProblemArgs($problemNumber): void
    {
         var_dump('TODO: Implement getProblemArgs() method.');
    }

    /**
     * @param $problemArgs
     */
    public function solveProblem($problemArgs): void
    {
        // TODO: Implement solveProblem() method.
    }
}
