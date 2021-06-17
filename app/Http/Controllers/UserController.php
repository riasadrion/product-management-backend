<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    public function login(Request $request){
        $result[] = '';
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($request->only(['email', 'password']))){
            $user = Auth::user();
            $token = Auth::user()->createToken('$lkdsalf((((*(*&SDF&&DSF')->plainTextToken;
            $result['response'] = 'success';
            $result['message'] = 'You are successfully logged in';
            return response()->json(['user' => $user, 'token' => $token, 'result' => $result]);
        }else{
            $result['response'] = 'error';
            $result['message'] = 'Invalid Credentials';
        }
    }
    public function logout()
    {
        Auth::logout();
    }

    public function get_user()
    {
       return response()->json([ 'user' => Auth::user() ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
