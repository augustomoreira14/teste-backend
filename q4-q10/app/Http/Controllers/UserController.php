<?php

namespace App\Http\Controllers;

use App\Domain\Address;
use App\Domain\User;
use App\Http\Requests\UserStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $req)
    {
        $users = User::paginate(10, [
            'id', 'name', 'email', 'username'
        ]);

        return response()->json($users);
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
}
