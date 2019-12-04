<?php

namespace App\Http\Controllers;

use App\Domain\Address;
use App\Domain\User;
use App\Http\Requests\UserStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserUpdate;

class UserController extends Controller
{
    public function index(Request $req)
    {
        $users = User::paginate(10, [
            'id', 'name', 'email', 'username'
        ]);

        return response()->json($users);
    }

    public function show($id)
    {
        $user = User::with('address')->find($id);

        if($user){
            return response()->json($user);
        }

        return response()->json([
            'message' => 'User not found.'
        ], 404);

    }

    public function store(UserStore $request)
    {
        try {
            $validated = $request->validated();

            $user = DB::transaction(function() use ($validated){
                $user = new User([
                    'name' => $validated['name'],
                    'email' => $validated['email'],
                    'password' => bcrypt(123),
                    'username' => $validated['username'] ?? null,
                    'phone' => $validated['phone'] ?? null
                ]);

                if(isset($validated['address'])){
                    $address = Address::create($validated['address']);
                    $user->address()->associate($address);
                }

                $user->save();

                return $user;
            });

            return response()->json([
                'message' => 'User succesfuly created.',
                'data' => $user
            ],201);

        }catch (\Exception $ex){
            //mandar para o log
            return response()->json([
                'message' => "An unexpected error occurred.",
            ], 500);
        }
    }

    public function update(UserUpdate $request, $id)
    {
        try {
            $user = User::find($id);

            if(!$user){
                return response()->json([
                    'message' => 'User not found.'
                ]);
            }

            $validated = $request->validated();

            $user = DB::transaction(function() use ($validated, $user){
                $user->fill($validated);

                if(isset($validated['address'])){
                    $user->address->fill($validated['address']);
                    $user->address->save();
                }

                $user->save();

                return $user;
            });

            $user->load('address');

            return response()->json([
                'message' => 'User succesfuly updated.',
                'data' => $user
            ]);

        }catch (\Exception $ex){
            //mandar para o log
            return response()->json([
                'message' => "An unexpected error occurred.",
            ], 500);
        }
    }

    public function delete($id)
    {
        $user = User::find($id);

        if(!$user){
            return response()->json([
                'message' => 'User not found.'
            ]);
        }

        $user->delete();

        return response()->json([
            'message' => 'User succesfuly deleted.'
        ]);
    }
}
