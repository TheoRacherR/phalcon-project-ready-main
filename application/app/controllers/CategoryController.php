<?php

declare(strict_types=1);



class CategoryController extends ControllerBase
{

        public function indexAction()
        {
        }

        public function searchAction($category)
        {
                //requete si la categorie existe
                $categoryModel = Category::query()
                        ->where('name = :name:', ['name' => $category])
                        ->execute()
                        ->getFirst();

                //retourne une erreur si la catégorie n'existe pas
                if (!$categoryModel) {
                        $this->flash->error("Category was not found");

                        return;
                }

                //requete pour récupérer les produits de la catégorie
                $productsFiltered = Product::query()
                        ->where('id_sub_category = :category_id:')
                        ->bind([
                                'category_id' => $categoryModel->id
                        ])
                        ->execute();

                //retourne une erreur sil n'y a pas de produits dans la catégorie
                if(count($productsFiltered) == 0) {
                        $this->flash->error("No product found for this category");
                        return;
                }

                //passer les produits à la vue
                $this->view->productsFiltered = $productsFiltered;
        }
}
