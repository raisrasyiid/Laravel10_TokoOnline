<?php

namespace Modules\Shop\Entities;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Category extends Model
{
    use HasFactory, UuidTrait;

    protected $table = 'shop_categories';

    protected $fillable = [
        'parent_id',
        'slug',
        'name',
    ];

    protected static function newFactory()
    {
        return \Modules\Shop\Database\factories\CategoryFactory::new();
    }

    public function children()
    {
        return $this->hashMany('Modules\Shop\Entities\Category', 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo('Modules\Shop\Entities\Category', 'parent_id');
    }

    public function product()
    {
        return $this->belongsToMany('Modules\Shop\Entities\Product', 'shop_categories_product', 'parent_id', 'category_id');
    }
}
