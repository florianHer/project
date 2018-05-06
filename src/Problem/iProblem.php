<?php

namespace Project\Problem;

/**
 * Interface iProblem
 * @package Project\Problem
 */
interface iProblem
{
    public function getProblemArgs($problemNumber);
    public function solveProblem($problemArgs);
}