<?php

declare(strict_types=1);

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model;
use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function indexAction()
    {

    }

    protected function beforeExecuteRoute()
    {
        $categories = Category::query()
            ->where('parent_category IS NULL')
            ->execute();

        $subCategories = Category::query()
            ->where('parent_category IS NOT NULL')
            ->execute();

        $this->view->setVar('categories', $categories);
        $this->view->setVar('subCategories', $subCategories);
        $this->assets->addCss('assets/css/bootstrap.min.css');
        $this->assets->addJs('assets/js/jquery.min.js');
        $this->assets->addJs('assets/js/bootstrap.min.js');
    }
}
