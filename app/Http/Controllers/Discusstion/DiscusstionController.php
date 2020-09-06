<?php

namespace App\Http\Controllers\Discusstion;

use App\Discusstion;
use App\Http\Controllers\Controller;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use PhpParser\Builder\Use_;

use function GuzzleHttp\json_decode;

class DiscusstionController extends Controller
{
    function getUser(Request $req){
        $user=User::find($req->id);
        return response()->json($user,200);
    }
    function getDiscustion(Request $req){
        $dis=Discusstion::where('user_id_1',$req->id)->orWhere('user_id_2',$req->id)->get();
        foreach($dis as $d){
            $d->lastMessage=Message::where('discusstion_id',$d->id)->orderBy('id','desc')->first();
            if($d->user_id_1==$req->id){
                $d->name=User::find($d->user_id_2)->name;
            }else{
                $d->name=User::find($d->user_id_1)->name;
            }
        }
        return response()->json($dis,200);
    }

    function getMessages(Request $req){
        $dis=Discusstion::find($req->id);
        $dis->messages;
        if($dis->user_id_1==$req->current_user){
            $dis->name=User::find($dis->user_id_2)->name;
        }else{
            if($dis->user_id_2==$req->current_user){
            $dis->name=User::find($dis->user_id_1)->name;}
            else{
                $dis->name="messages";
            }
        }
        foreach($dis->messages as $m)
        {
            $m->user=User::find($m->user_id);;
        }
        return response()->json($dis,200);
    }

    function send(Request $req){
        $mess= new Message();
        $mess->discusstion_id=$req->id_dis;
        $mess->user_id=$req->id;
        $mess->message=$req->message;
        $mess->save();
        return response()->json('sent',200);
    }

    function typing(Request $req){
        $dis=Discusstion::find($req->id);
        $t=json_decode($dis->typing,true);
        $t[$req->u_id]=$req->u_id;
        $dis->typing=json_encode($t);
        $dis->save();
        $ok='typing';
        return response()->json($dis->typing,200);
    }
    function endTyping(Request $req){
        $dis=Discusstion::find($req->id);
        $t=json_decode($dis->typing);
        unset($t[array_keys($t,$req->user_id)]);
        $dis->typing=json_encode($t);
        $dis->save();
        $ok='end typing';
        return response()->json($ok,200);
    }


    function get(){
      $user= User::find(1);
      $dis=Discusstion::where('user_id_1',$user->id)->orWhere('user_id_2',$user->id)->get();
      foreach($dis as $e){
          $e->messages;
      }
      foreach($dis as $d){
        foreach($d->messages as $m){
             echo $m->user_id;
        }
    }
      echo "<pre>".json_encode($dis,JSON_PRETTY_PRINT)."</pre>";
    }
}
