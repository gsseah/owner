<?php namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Owner extends Model
{
   protected $table = 'owner_details'; 
   protected $fillable = ['id', 'name', 'referral_code'];   
}
?>
