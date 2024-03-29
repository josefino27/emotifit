<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{
    public function __construct(){

        $this->middleware('can:roles');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role=Role::all();

        return view('roles.index', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions= Permission::all();
        
        $permissionsWithStatus = [];
        
        return view('roles.create',compact('permissions','permissionsWithStatus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role=Role::create($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect()->route('role.index')->with('message','Registro Creado Satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $permissions = Permission::all();

        $permissionsWithStatus = $permissions->map(function ($permission) use ($role) {
            return [
                'permission' => $permission,
                'checked' => $role->hasPermissionTo($permission->name),
            ];
        });  
        return view('roles.show', compact('role','permissionsWithStatus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissions = Permission::all();
        $role=Role::where('id',$id)->firstOrfail();
        // una matriz de permisos y establece 'checked' en verdadero si el rol tiene ese permiso
        $permissionsWithStatus = $permissions->map(function ($permission) use ($role) {
            return [
                'permission' => $permission,
                'checked' => $role->hasPermissionTo($permission->name),
            ];
        });       
        // return dd($permissionsWithStatus);
        return view('roles.edit', compact('role','permissions','permissionsWithStatus'));
    }
    public function createUpdateRoles(Request $request,$role)
    {
        $permissions = Permission::all();
        $role->role=$request->role;
        $role->permissions()->sync($request->permissions);
        $role->save();
        return $role;
    }

    public function update(Request $request,Role $role)
    {

        $role->update($request->all());
        $permissions = $request->input('permissions', []);
        //$role->permissions()->sync($request->permissions);
        $role->syncPermissions($permissions);
        return redirect()->route('role.index')->with('info','Actualizado Satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role=Role::findOrfail($id);
        try{
            $role->delete();
            return redirect()
            ->route('role.index')
            ->with('danger','Registro Eliminado.');
        }catch(QueryException $e){
            return redirect()
            ->route('roles.index')
            ->with('warning','El Registro No Puede Ser Eliminado.');
        }
    }
}
