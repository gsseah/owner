<?php
 
namespace App\Http\Controllers;
 
use App\Owner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
class OwnerController extends Controller{


  public function getOwnerDetails(Request $request){
 
      $owner = Owner::where('referral_code',$request->referral_code)->get();
 
      return response()->json($owner);
 
  }
 
}
?>
