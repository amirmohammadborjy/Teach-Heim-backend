<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable=['name','price','description','imageURL','categoryID', 'brandID','category','color','discount','rate'];
    public $timestamps = true;
}
