<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Stuff;
use App\Models\User;
use App\Models\Transaction;
use App\Models\DetailTransaction;
use Exception;

// use App\Http\Requests\UpdateUserRequest;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    function login(Request $req)
    {
        // Mengambil data yang ada di form 
        $email = $req->input('email');
        $password = $req->input('password');

        // Mengambil dari tabel user yang emailnya sesuai dengan data email yang dikirimkan
        $user = User::where('email', $email)->first();

        // Apakah email tersedia di tabel user
        if ($user) {

            // Jika emailnya ada, check menggunakan algoritma Hash apakah passwordnya susah sama 
            if (Hash::check($password, $user->password)) {

                // Generate Token
                $token = $user->createToken('user_token')->plainTextToken;
                
                // Kemabalikan data user (json)
                return response()->json([
                    'token' => $token,
                    'value' => $user,
                    'mess' => 'User Ditemukan',
                    'isError' => false,
                ]);
            } else {

                // Kembalikan data (json)
                return response()->json([
                    'token' => '',
                    'value' => null,
                    'mess' => 'Password Salah',
                    'isError' => true,
                ]);
            } 
        } else {

            // Kembalikan data (json)
            return response()->json([
                'token' => '',
                'value' => null,
                'mess' => ' User tidak ditemukan',
                'isError' => true,
            ]);
        }
    }

    function stuff(Request $req)
    {
        $data = Stuff::all();
        return response()->json([
            'value' => $data,
            'isError' => false,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    function stuffAdd(Request $req)
    {
        $data = Stuff::create($req->all());

        return response()->json([
            'value' => $data,
            'isError' => false,
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    function stuffUpdate(Request $req, Stuff $stuff)
    {
        $stuff->fill($req->all());
        $data = $stuff->save();

        return response()->json([
            'value' => $data,
            'isError' => false,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    function stuffDelete(Request $req, Stuff $stuff)
    {
        $data = $stuff->delete();
        
        return response()->json([
            'value' => $data,
            'isError' => false,
        ]);
    }
    function saveTransaction(Request $req)
    {
        try {
            $nota = Str::random(10);

            Transaction::create([
                'nota' => $nota,
                'id_user' => $req->input('id_user'),
                'id_customer' => null,
                'pemebeli' => $req->input('pembeli'),
                'desc' => $req->input('desc'),
                'date' => date('Y-m-d H:i:s'),
            ]);

            foreach ($req->input('detail_transaction') as $key => $value) {

                DetailTransaction::create([
                    'nota' => $nota,
                    'id_stuff' => $value['id'],
                    'price' => $value['price'],
                    'discount' => 0,
                    'count' => $value['count'],
                ]);

            }

            return response()->json([
                'value' => null,
                'isError' => false,
                'error' => null,
            ]);
        }
        catch(Exception $e) {

            return response()->json([
                'value' => null,
                'isError' => true,
                'error' => $e,
            ]);
        }
    }        
}
