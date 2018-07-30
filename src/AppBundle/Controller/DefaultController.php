<?php

namespace AppBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends FrontendController
{
    public function defaultAction(Request $request)
    {
        return $this->renderTemplate('Default/default.html.twig');
    }
}
