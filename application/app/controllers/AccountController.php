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
        $account->password = $this->request->getPost('password');

        if(false === $account->save()) {
            $messages = $account->getMessages();
            foreach($messages as $message) {
                $this->flashSession->error($message->getMessage());
            }
            $this->response->redirect('account/register');
        } else {
            $this->flashSession->success('Votre compte a bien été créé');
            $this->response->redirect('account/index');
        }
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

        /**
         * @var Account $user
         */
        $user = Account::findFirstByUsername($username);

        if($user) {
            if($this->security->checkHash($password, $user->getPassword())) {
                $this->session->set('auth', [
                    'username' => $user->getUsername()
                ]);
            }
        }

        $this->flashSession->success('Bonjour '. $user->getUsername());

        $this->response->redirect('account/index');
    }

    public function logoutAction() {
        if($this->session->get('auth')) {
            $this->session->destroy();
        }
        $this->response->redirect('account/index');
    }

}

