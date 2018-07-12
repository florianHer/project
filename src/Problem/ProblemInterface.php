<?php

namespace Project\Problem;

/**
 * Interface iProblem
 * @package Project\Problem
 */
interface ProblemInterface
{
    public function getProblemArgs($problemNumber);
    public function solveProblem($problemArgs);
}