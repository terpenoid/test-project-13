<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    /**
     * Hiding Attributes From JSON
     * @var string[]
     */
    protected $hidden = ['pivot'];

    /**
     * Fillable array of attributes
     * @var string[]
     */
    protected $fillable = ['name', 'price'];

    /**
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
