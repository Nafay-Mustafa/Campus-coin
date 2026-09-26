<?php
<<<<<<< HEAD
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Category extends Model {
    protected $table='categories';
    protected $fillable=['name','type','is_default','user_id'];
    protected $casts=['is_default'=>'boolean'];
    public function user(){return $this->belongsTo(User::class);}
    public function transactions(){return $this->hasMany(Transaction::class);}
    public function budgets(){return $this->hasMany(Budget::class);}
}
=======

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
}
>>>>>>> 5dab0819ecfe3decb616006f6774379b55e6e7d8
