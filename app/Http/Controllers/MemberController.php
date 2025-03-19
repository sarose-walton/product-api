<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    function insertMember(Request $request){
        $rules = array(
            'name'=> 'required | min: 2 | max: 500',
            'email' => 'email | required',
            "phone" => 'required | min: 11 | max: 11',
            "password" => 'required | min: 2 | max: 15',
            "address" => 'required'
        );
        $validation = Validator::make($request->all(), $rules);
        if($validation->fails()){
            return $validation->errors();
        }else{
            $member = new Member();
            $member->name = $request->name;
            $member->email = $request->email;
            $member->phone = $request->phone;
            $member->password = $request->password;
            $member->address = $request->address;
    
            if($member->save()){
                return ["result" => "Member added"];
            }else{
                return ["result"=> "Added Failed"];
            }
        }
    }

    function signup(Request $request){
        $input = $request->all();
        $input["password"] = bcrypt($input["password"]);
        $user = Member::create($input);
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $user['name'] = $user->name;
        return ['success' => true, "result"=> $success, "msg" => "User register successfully" ];
    }
}
