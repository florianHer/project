<?php

namespace Project;

use Project\Controller\SiteController;
$siteController = new SiteController();

if (isset($_POST['page'])) {

    switch ($_POST['page']) {
        case 'problem_choice':
            $problem = (int) $_POST['problem'];
            $siteController->getContent([
                'action'    => 'getProblemArgs',
                'problem'   => $problem,
            ]);
            break;
        case 'problem_args':
            break;
        case 'problem_solution':
            break;
        default:
            $_POST = null;
            break;
    }
} else {
    include 'src/Resources/layout.php';
}
