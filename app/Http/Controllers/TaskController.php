<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{

    public function list()
    {
        // je récupèrte la liste de toutes les tâches
        $taskList = Task::all()->load('category');
        // et je les return en json
        return $this->sendJsonResponse($taskList);
        // je pourrais remplacer la ligne ci dessus avec :
        // return response()->json($taskList, 200);
    }

    public function add(Request $request)
    {

        // if ($request->has('title') && $request->has('categoryId')) {
        // on peut directement tester plusieurs valeurs en fournissant un tableau
        // if ($request->has( ['title','categoryId'] )) {
        // filled est l'équivalent d'un has + un !empty
        if($request->filled(['title', 'categoryId'])){
            // on crée un nouvel objet a partir de la classe Tasks
            $newTask = new Task();
            // Récupérer toutes les données envoyées en POST
            // $request->input() est l'équivalent plus poussé de filter_input()
            // on récupère les valeurs fournies dans la requête
            $title = $request->input('title');
            $categoryId = $request->input('categoryId');

            // on met a jour les valeurs des propriétés de notre nouvelle tâche
            $newTask->title = $title;
            $newTask->category_id = $categoryId;

            // Comme il y a déjà des valeurs par défaut dans la BDD,
            // completion et status sont facultatifs, donc on change
            // ces propriétés uniquement si elles sont fournies.
            if ($request->filled('completion')){
                $newTask->completion = $request->input('completion');
            }
            if ($request->filled('status')){
                $newTask->status = $request->input('status');
            }

            $isInserted = $newTask->save();

            if($isInserted === true){
                // plutot que de mettre le code 201 je peux utiliser directement son nom grace a Reponse
                return $this->sendJsonResponse($newTask, Response::HTTP_CREATED);
                // je pourrais remplacer la ligne ci dessus avec :
                // return response()->json($newTask, 201);
            }
            else {
                return $this->sendEmptyResponse(Response::HTTP_INTERNAL_SERVER_ERROR);
            }


        }
        else {
            return $this->sendEmptyResponse(Response::HTTP_BAD_REQUEST);
        }



    }

    public function update(Request $request, $id)
    {
        // que je fasse un PUT ou un PATCH je vais atterir dans
        // cette methode !
        // on récupère la tache a modifier
        $taskToUpdate = Task::find($id);

         // Si la tâche existe ? (find retourne null s'il ne trouve pas la tâche)
        if($taskToUpdate !== null){

            // Est-ce que la requête est en PUT ?
            if($request->isMethod('put')){
                // si la methode utilisée est PUT
                // je suis sensé modifier toutes les valeurs de
                // la tache qui a pour id $id
                // On vérifie que les données à mettre à jour sont présentes
                if($request->filled(['title', 'categoryId', 'completion', 'status'])){
                    $taskToUpdate->title = $request->input('title');
                    $taskToUpdate->category_id = $request->input('categoryId');
                    $taskToUpdate->completion = $request->input('completion');
                    $taskToUpdate->status = $request->input('status');

                }
                else {
                    return $this->sendEmptyResponse(Response::HTTP_BAD_REQUEST);
                }
            } // ou PATCH ?
            else {
                // Methode PATCH
                // mise a jour partielle d'une tache ()
                if($request->filled('title')){
                    $taskToUpdate->title = $request->input('title');
                    $oneDataAtLeast = true;
                }
                if($request->filled('categoryId')){
                    $taskToUpdate->category_id = $request->input('categoryId');
                    $oneDataAtLeast = true;
                }
                if($request->filled('completion')){
                    $taskToUpdate->completion = $request->input('completion');
                    $oneDataAtLeast = true;
                }
                if($request->filled('status')){
                    $taskToUpdate->status = $request->input('status');
                    $oneDataAtLeast = true;
                }

                if(!$oneDataAtLeast){
                    return $this->sendEmptyResponse(Response::HTTP_BAD_REQUEST);
                }


            }


            // grace a la condition ci dessus j'ai pu mettre a jour les propriétés de la tache a update.

            if($taskToUpdate->save()){
                 // alors retourner un code de réponse HTTP 204 "No Content"
                // https://restfulapi.net/http-methods/#put
                // sans body (pas de JSON ni d'HTML)
                return $this->sendEmptyResponse(Response::HTTP_NO_CONTENT);
            }
            else {
                return $this->sendEmptyResponse(Response::HTTP_INTERNAL_SERVER_ERROR);
            }

        } else {
            // si la tache n'existe pas => not found
            return $this->sendEmptyResponse(Response::HTTP_NOT_FOUND);
        }

    }

    public function delete($id)
    {
        $taskToDelete = Task::find($id);

         // Si la tâche existe ? (find retourne null s'il ne trouve pas la tâche)
        if($taskToDelete !== null){

            $result = $taskToDelete->delete();

            if($result) {
                 // alors retourner un code de réponse HTTP 204 "No Content"
                // https://restfulapi.net/http-methods/#put
                // sans body (pas de JSON ni d'HTML)
                return $this->sendEmptyResponse(Response::HTTP_NO_CONTENT);
            }
            else {
                return $this->sendEmptyResponse(Response::HTTP_INTERNAL_SERVER_ERROR);
            }

        } else {
            // si la tache n'existe pas => not found
            return $this->sendEmptyResponse(Response::HTTP_NOT_FOUND);
        }
    }
}
