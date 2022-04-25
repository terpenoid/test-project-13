<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory;
    use NodeTrait;

    /**
     * Hiding Attributes From JSON
     * @var string[]
     */
    protected $hidden = ['pivot', 'created_at', 'updated_at'];

    /**
     * Fillable array of attributes
     * @var string[]
     */
    protected $fillable = ['title', 'parent_id'];

    /**
     * @return BelongsToMany
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function breadcrumb(): array
    {
        return [1, 2, 3];
    }
}
