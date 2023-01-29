<?php

declare(strict_types=1);

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model;
use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function indexAction()
    {
        $categories = Category::query()
            ->where('parent_category IS NULL')
            ->execute();


        $subCategories = Category::query()
            ->where('parent_category IS NOT NULL')
            ->execute();

        $this->view->setVar('categories', $categories);
        $this->view->setVar('subCategories', $subCategories);
    }
}
