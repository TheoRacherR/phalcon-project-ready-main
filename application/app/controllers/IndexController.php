<?php

declare(strict_types=1);

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $asset = new \Phalcon\Assets\Asset\Css(
            'c',
            true,
            (bool)null,
            [],
            '1.0',
            true
        );

        #products
        $product = Product::find(['order' => "created_at DESC"]);
            
        if (!$product) {
            $this->flash->error("product was not found");
            return;
        }

        $this->view->setVar("prod", $product);
        

        #categories
        $categories = Category::find();
        
        if(!$categories) {
            $this->flash->error("categories was not found");
            return;
        }

        $this->view->setVar("catego", $categories);
    }

}
