<?php

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\UuidTrait;

class Tag extends Model
{
    use HasFactory, UuidTrait;

    protected $table = 'shop_tags';

    protected $fillable = [
        'slug',
        'name',
    ];

    protected static function newFactory()
    {
        return \Modules\Shop\Database\factories\TagFactory::new();
    }
}
