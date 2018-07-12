<?php

namespace Project\Problem;

class Problem_1 implements ProblemInterface
{
    /**
     * @param $problemNumber
     *
     * @return array
     */
    public function getProblemArgs($problemNumber): array
    {

         return [
             'template' => 'form.html.twig',
             'vars'     => [
                 'title' => 'Problem 1'
             ],
         ];
    }

    /**
     * @param $problemArgs
     */
    public function solveProblem($problemArgs): void
    {
        // TODO: Implement solveProblem() method.
    }
}
