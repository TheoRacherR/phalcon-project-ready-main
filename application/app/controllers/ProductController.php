<?php

declare(strict_types=1);



use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model;


class ProductController extends ControllerBase
{



        public function indexAction()
        {
        }




        public function searchAction()
        {
                $numberPage = $this->request->getQuery('page', 'int', 1);
                $parameters = Criteria::fromInput($this->di, 'Product', $_GET)->getParams();
                $parameters['order'] = "id";

                $paginator = new Model(
                        [
                                'model' => 'Product',
                                'parameters' => $parameters,
                                'limit' => 10,
                                'page' => $numberPage,
                        ]
                );

                $paginate = $paginator->paginate();

                if (0 === $paginate->getTotalItems()) {
                        $this->flash->notice("The search did not find any product");

                        $this->dispatcher->forward([
                                "controller" => "product",
                                "action" => "index"
                        ]);

                        return;
                }

                $this->view->page = $paginate;
        }




        public function newAction()
        {
        }






        public function editAction($id)
        {
                if (!$this->request->isPost()) {
                        $product = Product::findFirstByid($id);
                        if (!$product) {
                                $this->flash->error("product was not found");

                                $this->dispatcher->forward([
                                        'controller' => "product",
                                        'action' => 'index'
                                ]);

                                return;
                        }

                        $this->view->id = $product->id;

                        $this->tag->setDefault("id", $product->id);
                        $this->tag->setDefault("id_owner", $product->id_owner);
                        $this->tag->setDefault("id_sub_category", $product->id_sub_category);
                        $this->tag->setDefault("name", $product->name);
                        $this->tag->setDefault("description", $product->description);
                        $this->tag->setDefault("stock", $product->stock);
                        $this->tag->setDefault("picture_url", $product->picture_url);
                        $this->tag->setDefault("create_at", $product->create_at);
                        $this->tag->setDefault("update_at", $product->update_at);
                }
        }




        public function createAction()
        {
                if (!$this->request->isPost()) {
                        $this->dispatcher->forward([
                                'controller' => "product",
                                'action' => 'index'
                        ]);

                        return;
                }

                $product = new Product();
                $product->idOwner = $this->request->getPost("id_owner", "int");
                $product->idSubCategory = $this->request->getPost("id_sub_category", "int");
                $product->name = $this->request->getPost("name");
                $product->description = $this->request->getPost("description");
                $product->stock = $this->request->getPost("stock", "int");
                $product->pictureUrl = $this->request->getPost("picture_url");
                $product->createAt = $this->request->getPost("create_at");
                $product->updateAt = $this->request->getPost("update_at");


                if (!$product->save()) {
                        foreach ($product->getMessages() as $message) {
                                $this->flash->error($message);
                        }

                        $this->dispatcher->forward([
                                'controller' => "product",
                                'action' => 'new'
                        ]);

                        return;
                }

                $this->flash->success("product was created successfully");

                $this->dispatcher->forward([
                        'controller' => "product",
                        'action' => 'index'
                ]);
        }





        public function saveAction()
        {

                if (!$this->request->isPost()) {
                        $this->dispatcher->forward([
                                'controller' => "product",
                                'action' => 'index'
                        ]);

                        return;
                }

                $id = $this->request->getPost("id");
                $product = Product::findFirstByid($id);

                if (!$product) {
                        $this->flash->error("product does not exist " . $id);

                        $this->dispatcher->forward([
                                'controller' => "product",
                                'action' => 'index'
                        ]);

                        return;
                }

                $product->idOwner = $this->request->getPost("id_owner", "int");
                $product->idSubCategory = $this->request->getPost("id_sub_category", "int");
                $product->name = $this->request->getPost("name");
                $product->description = $this->request->getPost("description");
                $product->stock = $this->request->getPost("stock", "int");
                $product->pictureUrl = $this->request->getPost("picture_url");
                $product->createAt = $this->request->getPost("create_at");
                $product->updateAt = $this->request->getPost("update_at");


                if (!$product->save()) {

                        foreach ($product->getMessages() as $message) {
                                $this->flash->error($message);
                        }

                        $this->dispatcher->forward([
                                'controller' => "product",
                                'action' => 'edit',
                                'params' => [$product->id]
                        ]);

                        return;
                }

                $this->flash->success("product was updated successfully");

                $this->dispatcher->forward([
                        'controller' => "product",
                        'action' => 'index'
                ]);
        }






        public function deleteAction($id)
        {
                $product = Product::findFirstByid($id);
                if (!$product) {
                        $this->flash->error("product was not found");

                        $this->dispatcher->forward([
                                'controller' => "product",
                                'action' => 'index'
                        ]);

                        return;
                }

                if (!$product->delete()) {

                        foreach ($product->getMessages() as $message) {
                                $this->flash->error($message);
                        }

                        $this->dispatcher->forward([
                                'controller' => "product",
                                'action' => 'search'
                        ]);

                        return;
                }

                $this->flash->success("product was deleted successfully");

                $this->dispatcher->forward([
                        'controller' => "product",
                        'action' => "index"
                ]);
        }
}
