<?php

namespace Project\Controller;

use Project\Problem;

/**
 * Class SiteController
 * @package Project\Controller
 */
class SiteController {

    /**
     * @param $args
     */
    public function getContent(array $args = []): void
    {
        // Call the good Problem Object
        $problemClassName = 'Problem\Problem_'.$args['problem'];
        $problemObject = new $problemClassName();

        // Call the good action
        if ($problemObject instanceof Problem\iProblem) {
            $action = $args['action'];
            if (method_exists($problemObject, $action)) {
                $problemObject->$action();
            }
        }
    }
}
