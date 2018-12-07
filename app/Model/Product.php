<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use Sortable;
    protected $table = 'products';
    public $primaryKey="id";
    public $sortable = ['name', 'price'];
}
