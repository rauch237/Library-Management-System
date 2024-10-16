<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'romance',
        'horror',
        'tragedy',
        'history',
        'adventure',
        'fantasy',
        'history',
        'comedy',
        'science',
        ];

        public function user()
        {
            return $this->belongsTo(User::class, 'user_id',);
        }    

        public function category()
        {
            return $this->belongsTo(Category::class, 'category_id',);
        }  
}
