<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\permisos\models\permisos;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{



    public function index()
    {
        return view('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::where('id',$id)->firstOrfail();
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $infoUser = Auth::user();
        $userRoles = $user->roles->pluck('id')->toArray();
    //return view('users.edit', compact('user','roles','userRoles'));
        return dd ($userRoles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update(['name'=>$request->nombre]);
        $user->roles()->sync($request->roles);
        return redirect()->route('users.edit', $user)->with('info', 'Se asignó correctamente los roles.');
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
