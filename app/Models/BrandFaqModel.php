<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandFaqModel extends Model
{
    use HasFactory;
    protected $table = 'brand_faq';
    protected $fillable = [
        'brand_id',
        'question',
        'answer',
    ];

    public function brand()
    {
        return $this->belongsTo(BrandModel::class, 'brand_id', 'id');
    }
}
