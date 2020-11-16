<?php
namespace Controllers;
require_once "DB.php";
require_once "Request.php";
require_once "Models/Book.php";
require_once "JsonResponse.php";
use Models\Book;
use Request;
use JsonResponse;

class BookController{

    static public function createBook(Request $request){
        $book = Book::create($request);
        //header("Content-type: application/json");
        $headers = ["Accept" => "application/json"];
        response($book,201,$headers)->send();
        
    }

    static public function listBooks(Request $request){
        $books = Book::all();
        $headers = ["Accept" => "application/json"];
        response($books,200,$headers)->send();
    }

    static public function showBook(Request $request){
        //echo 'sadasd';
        $book = Book::find($request->ISBN);
        //header("Content-type: application/json");
        $headers = ["Accept" => "application/json"];
        response($book,200,$headers)->send();
    }

    static public function updateBook(Request $request){
        //echo 'sadasd';
        $book = Book::update($request);
        //header("Content-type: application/json");
        $headers = ["Accept" => "application/json"];
        response($book,200,$headers)->send();
    }

    static public function deleteBook(Request $request){

        $deleted = Book::delete($request);
        //header("Content-type: application/json");
        $headers = ["Accept" => "application/json"];
        response($deleted,200,$headers)->send();
    }
  
} 