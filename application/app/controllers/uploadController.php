<?php

use Phalcon\Http\Request;
use Phalcon\Http\Response;


class UploadController extends ControllerBase
{
    public function uploadAction()
    {
        // Instancie une nouvelle requête HTTP

        $request = $this->request;


        // Vérifie si le formulaire a été soumis et s'il contient des fichiers

        if ($request->isPost() && $request->hasFiles()) {

            // Récupère les fichiers téléchargés
            $files = $request->getUploadedFiles();

            // Boucle sur chaque fichier
            foreach ($files as $file) {

                // Vérifie si le fichier a été téléchargé sans erreur
                if ($file->getError() == 0) {

                    // Définit le chemin où le fichier sera enregistré
                    $path = '/var/www/html/application/public/images/' . $file->getName();


                    // Sauvegarde le fichier sur le disque
                    $file->moveTo($path);

                    // Chemin d'accès pour l'application
                    $pathForBdd = 'images/' . $file->getName();

                    // Enregistrement en base de donnée
                    $product = new Product();
                    $product->idOwner = 1;
                    $product->idSubCategory = 1;
                    $product->name = "Test Image";
                    $product->description = "Test de description";
                    $product->stock = 100;
                    $product->picture_url = $pathForBdd;
                    $product->createdAt = "2022-12-31 23:59:59";
                    $product->updatedAt = "2022-12-31 23:59:59";

                    if (!$product->save()) {
                        foreach ($product->getMessages() as $message) {
                            $this->flash->error($message);
                        }

                        $this->dispatcher->forward([
                            'controller' => "index",
                            'action' => 'index'
                        ]);

                        return;
                    }
                }
            }
        }
    }
}
