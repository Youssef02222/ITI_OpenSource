<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    use HasFactory;

    protected $fillable = ['title','body','hall_number','status','user_id','section_id'];


    public function type()
    {
        return $this->belongsTo(Sections::class,'section_id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return  $this->belongsTo(User::class);
    }

    public function comments()
    {
        return  $this->hasMany(Comments::class,'report_id');
    }
}
