<?php 
declare(strict_types=1);

use Phalcon\Session\Manager as Session;

class CartService
{
    private $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function addProduct($id)
    {
        $cart = $this->session->get('cart', []);

        if (!empty($cart[$id])){
            $cart[$id]++;
        }else {
            $cart[$id] = 1;
        }

        $this->session->set('cart', $cart);
    }

    public function remove()
    {
        return $this->session->remove('cart');
    }

    public function delete($id)
    {
        $cart = $this->session->get('cart', []);

        if(!empty($cart[$id])){
            unset($cart[$id]);
        }

        $this->session->set('cart', $cart);
    }

    public function decrease($id)
    {
        $cart = $this->session->get('cart', []);

        if (!empty($cart[$id]) && $cart[$id] > 1){
            $cart[$id]--;
        }else{
            unset($cart[$id]);
        }

        $this->session->set('cart', $cart);
    }
}