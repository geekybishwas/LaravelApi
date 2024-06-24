<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator=Validator::make($request->all(),[
            'name'=>['required'],
            'email'=>['required','email','unique:users,email'],
            'password'=>['required','min:8','confirmed'],
            'password_confirmation'=>['required']
        ]);

        if($validator->fails()){
            return response()->json($validator->messages(),400);
        }
        else{
            $data=[
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ];
            // It starts a database transaction,it ensures that all database operations within the try block are treated as a single unit
            DB::beginTransaction();
            try{
                $user=User::create($data);
                // If User::create succeeds without errors,this line commits the transaction,making the changes permanant in the db
                DB::commit();
            }catch(\Exception $e){
                // This lien rollsback the transaction,undoing any database changes attempted within the try block
                p($e->getMessage());
                DB::rollBack();
                $user=null;
            }
            if($user!=null){
                return response()->json([
                    'message'=>'User register succesfully'
                ],200);
            }
            else{
                return response()->json([
                    'message'=>'Internal server error'
                ],500);
            }
        }

        p($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
