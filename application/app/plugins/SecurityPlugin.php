<?php

use Phalcon\Di\Injectable;
use Phalcon\Events\Event;
use Phalcon\Mvc\Dispatcher;

class SecurityPlugin extends Injectable
{
    public function beforeExecuteRoute(Event $event, Dispatcher $dispatcher)
    {
        $auth = $this->session->get('auth');
        if($auth) {
            $role = Role::findFirstById($auth['role']);
            if($role) {
                $role = $role->role;
            }
        } else {
            $role = 'GUEST';
        }
        $controller = $dispatcher->getControllerName();
        $action = $dispatcher->getActionName();

        $acl = $this->getAcl();

        $allowed = $acl->isAllowed($role, $controller, $action);
        if(false === $allowed) {
            $this->flashSession->error('Vous n\'avez pas l\'autorisation pour accéder à cette ressource');
            return $this->response->redirect('/');
        }
    }

    protected function getAcl() {
        $acl = new \Phalcon\Acl\Adapter\Memory();
        $roles = Role::find();

        foreach($roles as $r) {
            $acl->addRole($r->role);
        }

        $acl->addComponent('admin', [
            'users'
        ]);
        $acl->addComponent('index', [
            'index'
        ]);
        $acl->addComponent('account', [
            'index',
            'register',
            'create',
            'login',
            'authorize',
            'logout'
        ]);

        $acl->allow('ADMIN', '*', '*');
        $acl->allow('GUEST', 'index', '*');
        $acl->allow('GUEST', 'account', '*');

        $this->persistent->acl = $acl;

        return $this->persistent->acl;
    }
}