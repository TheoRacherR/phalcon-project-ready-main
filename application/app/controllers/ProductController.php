<?php

declare(strict_types=1);



use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model;


class ProductController extends ControllerBase
{



    public function indexAction()
    {
        $products = Product::find();
        $this->view->setVar("products", $products);

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

                    $this->response->redirect("product/");

                    return;
            }

            $this->view->page = $paginate;
    }



////////////// New ///////////////////////

    public function newAction()
    {

        $categories = Category::find();
        
        if(!$categories){
            $this->flash->error("there is no categories");

            $this->response->redirect("product/");

            return;
        }

        $this->view->setVar("id_sub_category", $categories);



    }


    public function createAction()
    {
        if (!$this->request->isPost()) {     
            $this->flash->error("product was not created successfully");
            $this->response->redirect("product/");

            return;
        }

        // var_dump($this->request->hasFiles());

        if (!$this->request->hasFiles()) {
            $this->flash->error("no file");
            $this->response->redirect("product/");

            return;
        }


        $files = $this->request->getUploadedFiles();


        foreach ($files as $file) {
            if ($file->getError() == 0) {
                $path = '/var/www/html/application/public/images/' . $file->getName();
                $file->moveTo($path);
            }
        }

        $product = new Product();
        $product->id_owner = $this->session->get('auth')["id"];
        $product->id_sub_category = $this->request->getPost("id_sub_category");
        $product->name = $this->request->getPost("name");
        $product->description = $this->request->getPost("description");
        $product->stock = $this->request->getPost("stock", "int");
        $product->price = $this->request->getPost("price", "int");

        $pathForBdd = $file->getName();
        $product->picture_url = $pathForBdd;

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
        $this->response->redirect("product/page/" . "$product->id");
    }



////////////// Edit ///////////////////////

    public function editAction($id)
    {
        if (!$this->request->isPost()) {
            $product = Product::findFirstByid($id);

            if (!$product) {
                $this->flash->error("product was not found");

                $this->response->redirect("product/");

                return;
            }

            $this->view->id = $product->id;

            $categories = Category::find(['parent_category' => NULL]);
        
            if(!$categories){
                $this->flash->error("there is no categories");

                $this->response->redirect("product/");

                return;
            }

            $this->view->setVar("id_sub_category", $categories);

            $this->tag->setDefault("id", $product->id);
            $this->tag->setDefault("name", $product->name);
            $this->tag->setDefault("description", $product->description);
            $this->tag->setDefault("stock", $product->stock);
            // $this->tag->setDefault("picture_url", $product->picture_url);
        }
    }



    public function saveAction()
    {

            if (!$this->request->isPost()) {
                    $this->flash->error("not post");
                    $this->response->redirect("product/");

                    return;
            }

            $id = $this->request->getPost("id");
            $this->flash->success("id" . $id);
            $product = Product::findFirstByid($id);

            if (!$product) {
                    $this->flash->error("product does not existss " . $id);

                    $this->response->redirect("product/");

                    return;
            }

            $product->idSubCategory = $this->request->getPost("id_sub_category", "int");
            $product->name = $this->request->getPost("name");
            $product->description = $this->request->getPost("description");
            $product->stock = $this->request->getPost("stock", "int");
            $product->price = $this->request->getPost("price", "int");
            // $product->pictureUrl = $this->request->getPost("picture_url");


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

            $this->response->redirect("product/page/" . "$product->id");
    }

///////////////// Delete /////////////////////

    public function deleteAction($id)
    {
            $product = Product::findFirstByid($id);
            if (!$product) {
                    $this->flash->error("product was not found");

                    $this->response->redirect("product/");

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

            $this->response->redirect("product/");
    }


/////////////////// Page ////////////////////////////


    public function pageAction($id)
    {
            // $numberPage = $this->request->getQuery('page', 'int', 1);
            $product = Product::findFirstByid($id);
            
            if (!$product) {
                    $this->flash->error("product was not found");
                    
                    $this->response->redirect("product/");

                    return;
            }


            $account = Account::findFirstByid($product->id_owner);

            if (!$account){
                    $account = "Unknonw";
            }

            $sub_category = Category::findFirstByid($product->id_sub_category);

            if (!$sub_category){
                $category = "Unknonw";
                $sub_cat = "Unknonw";
            }
            else {

                $category = Category::findFirstById($sub_category->parent_category)->name;
                $sub_cat = $sub_category->name;
                    
            }

            $review = Review::find("id_product = $id");
            

            $this->view->setVar("owner", $account->username);
            $this->view->setVar("category", $category);
            $this->view->setVar("sub_category", $sub_cat);
            $this->view->setVar("prod", $product);
            $this->view->setVar("reviews", $review);
            
    }
}