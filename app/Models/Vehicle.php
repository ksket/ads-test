<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model {
    
    protected $table = 'vehicles';
    
    protected $fillable = [
        'name',
        'make_id',
    ];

    protected $hidden = ['make_id', 'created_at', 'updated_at'];

    public function make(){ return $this->belongsTo('App\Models\Make'); }
}