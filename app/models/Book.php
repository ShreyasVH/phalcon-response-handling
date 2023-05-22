<?php
namespace app\models;

use Phalcon\Mvc\Model;

class Book extends Model
{
    public $id;
    public $name;
    public $author;

    public function initialize()
    {
        $this->setSource('books');
    }
}
