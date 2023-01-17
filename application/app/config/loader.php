<?php

$loader = new \Phalcon\Loader();




$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir,
<<<<<<< HEAD
        $config->application->classesDir,
=======
        $config->application->formsDir
        // 'PhalconDemo\Controllers' => DOCROOT . $config->get('application')->controllersDir,
        // 'PhalconDemo\Forms' => DOCROOT . $config->get('application')->formsDir,
        // 'PhalconDemo\Models'      => DOCROOT . $config->get('application')->modelsDir,
>>>>>>> 3dc3611c0455053fe0a08a36aa029286bb09bc63
    ]
)->register();
