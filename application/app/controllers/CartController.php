<?php

declare(strict_types=1);

class CartController extends ControllerBase
{
    private $cartService;

    public function initialize()
    {
        $this->cartService = $this->di->get('CartService');
    }

    public function indexAction()
    {
        
    }

    public function addAction($id) 
    {
        $this->cartService->addProduct($id);

        return $this->response->redirect('cart');
    }

    public function removeAction() 
    {
        $this->cartService->remove();

        return $this->response->redirect('/');
    }

    public function deleteAction($id) 
    {
        $this->cartService->delete($id);

        return $this->response->redirect('cart');
    }

    public function decreaseAction($id) 
    {
        $this->cartService->decrease($id);

        return $this->response->redirect('cart');
    }
}