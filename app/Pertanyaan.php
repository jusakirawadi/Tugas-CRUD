<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'Pertanyaan';
    protected $fillable = ['judul','isi'];
    protected $guarded = [];
    public $timestamps = false;
}
