<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQContent extends Model
{
    use HasFactory;

    protected $table = 'faq_content';
    protected $fillable = [
        'faq_id',
        'title_content',
        'content',
        'user_create',
        'user_update',
    ];


    public function header()
    {
        return $this->belongsTo(FAQ::class, 'faq_id', 'id');
    }
}
