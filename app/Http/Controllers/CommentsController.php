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
        //$model = new Comments();
        $comments = Comments::all();

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



    /**
     * action favori enregistré en session
     * stockage temporel
     */

    public function favori($id, $action){
        //recuperation du commentaire concerné
        $comment = Comments::find($id);

        //recuperation de la variable favori en session
        //et fixation d'un tableau par defaut
        //si rien en session favori
        $favoris = session("favoris", []);


        //si l'action est 'favori'
        if($action == "favori"){
            //j'ajoute le commentaire dans le tableau des favoris
            //en créant une clé qui a la valeur de l'id du commentaire
            //pour pouvoir le retrouver
            $favoris[$id] = $comment->id;
            Session::flash('warning', "Le commentaire {$comment->id} est désormais en favori");

        }else{
            //suppression du favori dans le tableau
            unset($favoris[$id]);
            Session::flash('warning', "Le commentaire {$comment->id} n'est désormais plus en favori");

        }

        //enregistrement en session du nouveau tableau des favoris
        Session::put("favoris", $favoris);

        //redirection

        return Redirect::route('comments_index');
    }


    public function forget($action = 'forget'){
        Session::forget('favoris');
        Session::flash('warning', "Tous les commentaires sont retirés des favoris");

        //redirection

        return Redirect::route('comments_index');
    }



}