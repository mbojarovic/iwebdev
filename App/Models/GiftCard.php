<?php

namespace App\Models;

use App\Model;

class GiftCard extends Model implements HasPrice
{

    public const TABLE = 'cards';

    use HasPriceTrait;

}