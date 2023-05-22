<?php
namespace app\repositories;

use app\models\Book;

class BookRepository
{
    public function getAllBooks()
    {
        return Book::find();
    }

    public function getById($id)
    {
        return Book::findFirstById($id);
    }

    public function create($create_request)
    {
        $book = new Book();
        $book->name = $create_request['name'];
        $book->author = $create_request['author'];

        $book->save();

        return $book;
    }

    public function update($id, $update_request)
    {
        $book = $this->getById($id);

        $book->name = $update_request['name'];
        $book->author = $update_request['author'];

        $book->save();

        return $book;
    }

    public function delete($id)
    {
        $book = $this->getById($id);

        $is_success = $book->delete();

        return $is_success;
    }
}
