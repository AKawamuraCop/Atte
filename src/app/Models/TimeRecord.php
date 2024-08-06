<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeRecord extends Model
{
    use HasFactory;

    protected $guarded = array('id');
    public static $rules = array(
        'user_id' => 'required',
        'category_id' => 'required',
        'clock_in' => 'required',
    );

    public $timestamps = false;

    public function user()
    {
        return $this->belongTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
