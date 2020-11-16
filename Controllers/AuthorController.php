<?php
namespace Controllers;
require_once "DB.php";
require_once "Request.php";
require_once "Models/Author.php";
require_once "JsonResponse.php";
use Models\Author;
use Request;
use JsonResponse;

class AuthorController{

    static public function createAuthor(Request $request){
        $author = Author::create($request);
        //header("Content-type: application/json");
        $headers = ["Accept" => "application/json"];
        response($author,201,$headers)->send();
        
    }

    static public function listAuthors(Request $request){
        $authors = Author::all();
        $headers = ["Accept" => "application/json"];
        response($authors,200,$headers)->send();
    }

    static public function showAuthor(Request $request){
        //echo 'sadasd';
        $author = Author::find($request->aid);
        //header("Content-type: application/json");
        $headers = ["Accept" => "application/json"];
        response($author,200,$headers)->send();
    }

    static public function updateAuthor(Request $request){
        //echo 'sadasd';
        $author = Author::update($request);
        //header("Content-type: application/json");
        $headers = ["Accept" => "application/json"];
        response($author,200,$headers)->send();
    }

    static public function deleteAuthor(Request $request){

        $deleted = Author::delete($request);
        //header("Content-type: application/json");
        $headers = ["Accept" => "application/json"];
        response($deleted,200,$headers)->send();
    }
    
}