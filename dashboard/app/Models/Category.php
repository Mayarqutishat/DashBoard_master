<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory ,SoftDeletes;

    protected $dates = ['deleted_at']; // Optional, defines the soft delete column
    protected $table ='categories';
    protected $fillable =[
    'name','slug','description','image','navbar_status','status','created_by'



    ];
}
