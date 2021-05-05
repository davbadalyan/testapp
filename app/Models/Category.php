<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ["title"];

    protected $with = ["todos"];

    public $timestamps = false;

    public function todos()
    {
        return $this->hasMany(Todo::class);
    }
}
