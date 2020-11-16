<?php
namespace Models;
require_once "DB.php";

class Book{
    public int $ISBN;
    public string $name;
    public string $year;
    public string $aid;

    static public function create(\Request $request):Book{
            $pdo = \DB::connect();
            $stm = $pdo->prepare("INSERT INTO books (`ISBN`,`name`,`year`,`aid`) VALUES (?,?,?,?)");
            $stm->execute([$request->ISBN,$request->name,$request->year,$request->aid]);
            $stm->closeCursor();
            return self::find($request->ISBN);
        }

    static public function all():array{
        $pdo = \DB::connect();
        $stm = $pdo->prepare("Select `ISBN`,`name`,`year`,`name`,`surname` from books LEFT JOIN Authors ON books.aid = authors.aid");
        $stm->execute();
        $books = $stm->fetchAll(\PDO::FETCH_ASSOC);
        return $books;
    }

    static public function find($ISBN):Book{
        $pdo = \DB::connect();
        $stm = $pdo->prepare("Select `ISBN`,`name`,`year`,`name`,`surname` from books LEFT JOIN Authors ON books.aid = authors.aid where ISBN=?");
        
        $stm->setFetchMode(\PDO::FETCH_CLASS, 'Models\Book');
        $stm->execute([$ISBN]);
        $book = $stm->fetch();
        $stm->closeCursor();
        return $book;
    }

    static public function update(\Request $request):Book{
        $pdo = \DB::connect();
        $query = "UPDATE books SET " ;
        $arr = [];
        $parameters = [];
        if($request->name){
            array_push($parameters,'`name`=? ');
            array_push($arr,$request->name);
        }
        if($request->year){
            array_push($parameters,'`year`=? ');
            array_push($arr,$request->year);
        }
        if($request->aid){
            array_push($parameters,'`aid`=? ');
            array_push($arr,$request->aid);
        }
        $query .= implode(',',$parameters) . 'where `ISBN`=?';
        array_push($arr,$request->ISBN);
        $stm = $pdo->prepare($query);
        $stm->execute($arr);
        return self::find($request->ISBN);
    }

    static public function delete(\Request $request):int{
        $pdo = \DB::connect();
        $stm = $pdo->prepare("Delete from books where ISBN=?");
        $stm->execute([$request->ISBN]);
        //$stm->closeCursor();
        echo 'Deletado com Sucesso!';
        return $stm->rowCount();

    }

   
}