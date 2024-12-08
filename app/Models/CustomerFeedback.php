<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
      
class CustomerFeedback extends Model
{
    protected $table = 'customer_feedbacks';

    protected $primaryKey = 'feedback_id';

    protected $fillable = [
        'user_id', 'feedback_content', 'feedback_time'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}