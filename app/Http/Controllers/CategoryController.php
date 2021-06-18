<?php

namespace App\Http\Controllers;

class CategoryController extends Controller{

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

    public function item($categoryId)
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

        if(array_key_exists($categoryId, $categoriesList)){
            $category = $categoriesList[$categoryId];
            return response()->json($category);
        }
    }

}
