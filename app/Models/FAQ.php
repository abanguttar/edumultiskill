<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;
    protected $table = 'faqs';

    protected $fillable = [
        'title',
        'slug',
        'user_create',
        'user_update',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_update', 'id');
    }

    public function content()
    {
        return $this->hasMany(FAQContent::class, 'faq_id', 'id');
    }
}
