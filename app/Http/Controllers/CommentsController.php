<?php
/**
 * Created by PhpStorm.
 * User: wal13
 * Date: 07/12/15
 * Time: 14:40
 */

namespace App\Http\Controllers;
use App\Http\Models\Comments;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

/**
 * Class CommentsController
 * @package App\Http\Controllers
 * suffixé par le mot clef Controller, et doit hériter de la super classe Controller
 */
Class CommentsController extends Controller{

    public function index(){

        //creation d'un objet du model Comments
        $model = new Comments();
        $comments = $model->getAllComments();

        //transporteur
        //transport des données du Controller à la vue
        return view("Comments/index", [
            'comments' => $comments
        ]);
    }



    /**
     * suppression
     */
    public function delete($id){

        //find() trouve un objet Comments depuis son id
        $comment = Comments::find($id);
        //si le commentaire existe , supprimer le commentaire
        if($comment){

            //creer un messsage flash de type success
            Session::flash('success', "Le commentaire {$comment->id} a bien été supprimé.");
            //delete() permet de supprimer un objet en base de données
            $comment->delete();
        }

        //redirection vers la liste des Commentaires
        return Redirect::route('comments_index');

    }

    /**
     * action pour activer un commentaire
     * passe la propriété state à 1
     */
    public function activate($id){

        //find() trouve un objet Comments depuis son id
        $comment = Comments::find($id);
        if($comment->state == 0){
            $comment->state = 1;
            //creer un messsage flash de type success
            Session::flash('success', "Le commentaire {$comment->id} est désormais activé");
        }
        else{
            $comment->state = 0;
            //creer un messsage flash de type success
            Session::flash('warning', "Le commentaire {$comment->id} est désormais désactivé");
        }

        //save() permet de sauvegarder l'objet modifier en base de données
        $comment->save();



        //redirection vers la liste des commentaires
        return Redirect::route('comments_index');
    }



}