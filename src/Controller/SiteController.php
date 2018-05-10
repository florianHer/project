<?php

namespace Project\Controller;

//use Project\Problem\iProblem;

/**
 * Class SiteController
 * @package Project\Controller
 */
class SiteController {

    protected const TWIGCACHE       = false;
    protected const TEMPLATEPATHS   = ['./src/Resources', './src/Resources/views'];
    protected const TWIGROOTPATH    = '';

    /**
     * @var \Twig_Environment
     */
    protected $twig;

    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem($this::TEMPLATEPATHS, $this::TWIGROOTPATH);
        $this->twig = new \Twig_Environment($loader, [
            'cache' => $this::TWIGCACHE,
        ]);
    }

    /**
     * Show the index rendering
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function getIndex()
    {
        echo $this->twig->render('index.html.twig');
    }

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

        echo $this->twig->render($content['template'], $content['vars']);
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
