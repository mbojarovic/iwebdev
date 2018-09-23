<?php

namespace App\Classes;

use App\Models\Article;

class Pagination
{

    public $path = '/../../index/';
    public $starting_position = 0;
    public $records_per_page = 1;
    public $total_no_of_records;

    public function __construct()
    {
        $this->total_no_of_records = Article::countAll();
    }
}