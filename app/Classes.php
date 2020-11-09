<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classes extends Model
{
    use SoftDeletes;
	
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'class',
        'section_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
