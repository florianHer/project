<?php

namespace Project\Controller;

use Project\Problem as P;

/**
 * Class SiteController
 * @package Project\Controller
 */
class SiteController {

    /**
     * @param array $args
     *
     * @throws \Exception
     */
    public function getContent(array $args = []): void
    {
        var_dump($args);
        // Call the good Problem Object
        $problemFileName = __DIR__.'/../Problem/Problem_'.$args['problem'].'.php';
        var_dump($problemFileName);
        if (!is_file($problemFileName)) {
            throw new \Exception();
        }
        include $problemFileName;
        $problemClassName = 'P\\Problem_'.$args['problem'];
        var_dump($problemClassName);
        $problemObject = new $problemClassName();
//        $problemObject = new P\Problem_1();

        // Call the good action
        if ($problemObject instanceof P\iProblem) {
            $action = $args['action'];
            if (method_exists($problemObject, $action)) {
                $problemObject->$action($args);
            }
        }
    }
}
