<?php

namespace App\Models;

use App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BrandFaqModel;
class BrandModel extends Model
{
    use HasFactory;
    protected $table = 'brand';
    protected $fillable = ['name', 'logo'];
    public function faqs()
    {
        return $this->hasMany(BrandFaqModel::class, 'brand_id', 'id');
    }
}
