<?php
declare(strict_types=1);

class AdminController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function usersAction()
    {
        $accounts = Account::find();
        $this->view->setVar('accounts', $accounts);
    }

}
