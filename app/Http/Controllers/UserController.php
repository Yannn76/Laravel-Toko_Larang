<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Requests;
use Illuminate\Support\Facades\Storage;

// use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('user.list' ,[
            'data' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $path = $request->file('file')->store('avatar');
        $request->merge(['avatar' =>$path]);

        User::create($request->all());

        return redirect('/users')->with([
            'mess' => 'Data berhasil di simpan di hati yang lain 💔',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view ('stuff.add' , [
            'data' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->fill($request->all());
        $user->save();

    
        return redirect('/users')->with([
            'mess' => 'Data berhasil di simpan di hati yang lain 💔',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        Storage::delete($user->avatar);
        $user->delete();
        
        return redirect('/users')->with([
            'mess' => 'Data berhasil dihapus 💔',
        ]);
    }
}
