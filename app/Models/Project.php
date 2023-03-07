<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = ['files' => 'array'];

    public function project_status_type()
    {
        return $this->belongsTo(Brand::class);
    }
}
