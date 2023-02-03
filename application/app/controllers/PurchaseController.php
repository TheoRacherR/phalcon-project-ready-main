<?php

declare(strict_types=1);



use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model;


class PurchaseController extends ControllerBase
{



        public function indexAction()
        {
        }

        public function checkoutAction()
        {
                //récupérer les produits du panier et l'envoyer à la vue
                foreach ($this->session->get('cart') as $id=>$quantity) {
                        $products[$id] = Product::findFirst($id);
                        $products[$id]->quantity = $quantity;
                }
                $this->view->products = $products;

                //récupérer l'utilisateur connecté et l'envoyer à la vue
                $user = Account::findFirst($this->session->get('auth')['id']);
                $this->view->user = $user;

                
                if (!$this->request->isPost()) {
                        return;
                }

                $purchase = new Purchase();
                $purchase->id_account = 1;
                $purchase->created_at = date('Y-m-d H:i:s');
                $purchase->updated_at = date('Y-m-d H:i:s');
                $purchase->purchased_at = date('Y-m-d H:i:s');
                $purchase->total_price = $this->request->getPost("total");

                $purchase->save();

                foreach ($this->session->get('cart') as $id=>$quantity) {
                        $purchaseProduct = new ProductXPurchase();
                        $purchaseProduct->id_purchase = $purchase->id;
                        $purchaseProduct->id_product = $id;
                        $purchaseProduct->quantity = $quantity;
                        $purchaseProduct->save();
                }

                $this->session->remove('cart');

                $this->flash->success("Purchase successful");


        }
}
