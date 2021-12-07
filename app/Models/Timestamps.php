<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timestamps extends Model
{
    use HasFactory;

    protected $table = 'timestamps';

    protected $primary = 'id';

    protected $fillable = ['user_id', 'content_id', 'time'];

    public $timestamps = false;
}
