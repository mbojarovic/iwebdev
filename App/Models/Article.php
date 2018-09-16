<?php

namespace App\Models;

use App\Model;

class Article extends Model
{

    public const TABLE = 'news';

    public $title_en;
    public $content_en;
    public $content_ru;
    public $title_ru;

}