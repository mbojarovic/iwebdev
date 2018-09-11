<?php

namespace App\Models;

interface Orderable extends HasPrice, HasWeight
{
    public function getTitle();
}