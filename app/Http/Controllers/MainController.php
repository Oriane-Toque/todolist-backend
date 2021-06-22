<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use DB;

class MainController extends Controller{

    public function home()
    {
        echo "YATA MEP 1ere route avec LUMEN";

        // utilisation de DB::select pour écrire une requete en "dur"
        //$results = DB::select("SELECT * FROM `tasks`");
        //dump($results);

        //https://laravel.com/docs/6.x/eloquent#retrieving-models
        //$results = Categories::all();
        //dump($results);

        //$results = Categories::find([2,4]);
        //dump($results);

        //$results = Categories::where('id', 4)->get();
        //dump($results);

        // UPDATE
        /*
        $category = Categories::find(2);
        $category->name = 'Courses de voiture';
        $category->save();
        */

        // INSERT
        /*
        $category = new Categories();
        $category->name = 'la nouvelle categorie de Mika';
        $category->save();
        */

        // REQUETE AVANCEE
        //$result = Categories::where('status', 1)->orderBy('id', 'DESC')->take(3)->get();
        //dump($result[1]->name);

        //DELETE
        //$nbrRowDeleted = Categories::destroy(5);


    }

    /* Rappel S06 methode save :
        public function save() {
            if($this->id != null ){
                return $this->update();
            } else {
                return $this->insert();
            }
        }
    */

}
