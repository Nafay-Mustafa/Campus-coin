<?php
<<<<<<< HEAD
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Budget extends Model {
    protected $table='budgets';
    protected $fillable=['user_id','category_id','month','limit_amount'];
    protected $casts=['month'=>'date','limit_amount'=>'decimal:2'];
    public function user(){return $this->belongsTo(User::class);}
    public function category(){return $this->belongsTo(Category::class);}
}
=======

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class budget extends Model
{
    //
}
>>>>>>> 5dab0819ecfe3decb616006f6774379b55e6e7d8
