<?php

namespace Project\Controller;

//use Project\Problem\iProblem;

/**
 * Class SiteController
 * @package Project\Controller
 */
class SiteController {

    /**
     * Show the content rendering.
     *
     * @param array $args
     *
     * @throws \ErrorException
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function getContent(array $args = []): void
    {
        $problemClassName = $this->getClassProblemName($args['problem']);
        $problemActionName = $this->getMethodName($args['action']);
        $content = $this->getProblemContentArgs($problemClassName, $problemActionName, $args);

        $loader = new \Twig_Loader_Filesystem('Project\Resources\views');
        $twig = new \Twig_Environment($loader, [
//            'cache' => __DIR__.'/tmp',
            'cache' => false,
        ]);
        echo $twig->render($content['template'], $content['vars']);
    }

    /**
     * Return the good Problem Object name.
     *
     * @param $problemNumber
     *
     * @return string
     */
    public function getClassProblemName($problemNumber): string
    {
        return 'Problem_'.$problemNumber;
    }

    /**
     * Return the method to call.
     *
     * @param $problemMethod
     *
     * @return mixed
     */
    public function getMethodName($problemMethod): string
    {

        return $problemMethod;
    }

    /**
     * Get the twig render args, with the template name to call and the args.
     *
     * @param       $problem
     * @param       $action
     * @param array $args
     *
     * @return mixed
     * @throws \ErrorException
     */
    public function getProblemContentArgs($problem, $action, array $args = [])
    {
        $problem = 'Project\Problem\\'.$problem;
//        if ($problem instanceof iProblem && method_exists($problem, $action)) {
            return \call_user_func([$problem, $action], $args);
//        }
        throw new \ErrorException('ERROR METHOD OR CLASS');
    }
}
