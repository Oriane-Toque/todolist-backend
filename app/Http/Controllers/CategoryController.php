<?php

namespace App\Http\Controllers;

use App\Models\Category;
// On importe la classe s'occupant des requêtes HTTP pour Lumen
use Illuminate\Http\Request;

class CategoryController extends Controller{


    public function post(Request $request){
        echo "post";

        dump($request);
    }
    // ancienne version de notre methode list
    /*
    public function list()
    {
        $categoriesList = [
            1 => [
                'id' => 1,
                'name' => 'Chemin vers O\'clock',
                'status' => 1
            ],
            2 => [
                'id' => 2,
                'name' => 'Courses',
                'status' => 1
            ],
            3 => [
             'id' => 3,
                'name' => 'O\'clock',
                'status' => 1
            ],
            4 => [
                'id' => 4,
                'name' => 'Titre Professionnel',
                'status' => 1
            ]
        ];
        // grace a response()->json() je peux convertir $categoriesList en JSON
        return response()->json($categoriesList);
    }
    */

    public function list()
    {
        // je récupère la liste de toute les catégories
        $categoriesList = Category::all();
        // pour la renvoyer au format json tout en envoyant aussi le code de reponse 200 ( tout c'est bien passsé !)
        //return response()->json($categoriesList, 200);
        return $this->sendJsonResponse($categoriesList);
        //echo "je suis dans list";
    }

    public function item($categoryId)
    {
        /*
        $categoriesList = [
            1 => [
                'id' => 1,
                'name' => 'Chemin vers O\'clock',
                'status' => 1
            ],
            2 => [
                'id' => 2,
                'name' => 'Courses',
                'status' => 1
            ],
            3 => [
             'id' => 3,
                'name' => 'O\'clock',
                'status' => 1
            ],
            4 => [
                'id' => 4,
                'name' => 'Titre Professionnel',
                'status' => 1
            ]
        ];
        */
        $category = Category::find($categoryId);

        if(!empty($category)){
            return $this->sendJsonResponse($category);
        } else {
            abort(404);
        }


        /*
        if(array_key_exists($categoryId, $categoriesList)){
            $category = $categoriesList[$categoryId];
            return response()->json($category);
        }
        */




    }

}
