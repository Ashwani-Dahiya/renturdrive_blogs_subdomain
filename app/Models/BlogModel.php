<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogCategroyModel;
use App\Models\BlogAuthorModel;
class BlogModel extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $fillable = [
        'category_id',
        'author_id',
        'title',
        'image',
        'short_description',
        'long_description',
        'seo_title',
        'seo_description',
        'image_alt',
        'blog_url',
        'status',
    ];
    public function blog_category()
    {
        return $this->belongsTo(BlogCategroyModel::class, 'category_id');
    }
    public function blog_author()
    {
        return $this->belongsTo(BlogAuthorModel::class, 'author_id');
    }
}
