<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Make extends Model {
    
    protected $table = 'makes';
    
    protected $fillable = ['name'];

    protected $hidden = ['created_at', 'updated_at'];

    public function models(){ return $this->hasMany('App\Models\Vehicle'); }
}