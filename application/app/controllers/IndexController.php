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
    }
}
