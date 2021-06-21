<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Support\Facades\DB;

class MainController extends Controller{

    public function home()
    {
        echo "YATA MEP 1ere route avec LUMEN";

        // $results = DB::select('SELECT * FROM `tasks`');
        // dump($results);

        $categories = new Categories;
        $results = $categories::all();
        dump($results);
    }

}
