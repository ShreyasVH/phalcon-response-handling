<?php


namespace app\responses;


class Response
{
    public bool $success;
    public Object $data;
    public string $message;

    public function __construct($data)
    {
        $this->data = $data;
        $this->success = true;
        $this->message = "";
    }
}