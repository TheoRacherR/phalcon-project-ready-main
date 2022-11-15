<?php
declare(strict_types=1);

class AccountController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function registerAction() {

    }

    public function createAction() {
        if(!$this->request->isPost()) {
            $this->response->redirect('account/index');
            return;
        }

        $account = new Account();

        $account->username = $this->request->getPost('username');
        $account->email = $this->request->getPost('email');
        $account->password = $this->security->hash($this->request->getPost('password'));

        $account->save();
        $this->response->redirect('account/index');
    }

    public function loginAction() {

    }

    public function authorizeAction() {
        if(!$this->request->isPost()) {
            $this->response->redirect('account/login');
            return;
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = Account::findFirstByUsername($username);

        if($user) {
            if($this->security->checkHash($password, $user->getPassword())) {
                $this->session->set('auth', [
                    'username' => $user->getUsername()
                ]);
            }
        }

        $this->response->redirect('account/index');
    }

    public function logoutAction() {
        if($this->session->get('auth')) {
            $this->session->destroy();
        }
        $this->response->redirect('account/index');
    }

}

