<?php

namespace App\Http\Controllers;

use App\Models\Users\Permission;
use App\Models\Users\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class RolesController extends Controller
{
    protected $roles;
    protected $permissions;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Role $roles, Permission $permissions)
    {
        $this->roles = $roles;
        $this->permissions = $permissions;
        Route::model('role',Role::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $frd   = $request->all();
        $roles = $this
            ->roles
            ->filter($frd)
            ->paginate($frd['perPage'] ?? $this->roles->getPerPage());

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255|unique:roles',
            'display_name' => 'string|max:255',
            'description' => 'string|max:255'
        ]);
        $frd = $request->all();
        $role = $this->roles->create($frd);

        $flashMessage = [
            'type' => 'success',
            'text' => 'Роль «' . $role->getDisplayName() . '» успешно создан.',
        ];
        if ($request->ajax())
        {
            $response = response()->json($flashMessage);
        }
        else
        {
            $response = redirect()->back()->with(['flash_message' => $flashMessage]);
        }

        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $permissions = $role->permissions()->get();
        return view('roles.show', compact('role', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = $this->permissions->all();
        $rolePermissions = $role->permissions()->get();
        return view('roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'display_name' => 'string|max:255',
            'description' => 'string|max:255'
        ]);
        //TODO: Нет проверок на корректность поля permissions
        $frd = $request->all();
        $role->permissions()->sync($request->input('permissions'));
        $role->update($frd);

        $flashMessage = [
            'type' => 'success',
            'text' => 'Роль «' . $role->getDisplayName() . '» успешно изменен.',
        ];

        if ($request->ajax())
        {
            $response = response()->json($flashMessage);
        }
        else
        {
            $response = redirect()->back()->with(['flash_message' => $flashMessage]);
        }

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $this->roles->destroy($role->getKey());

        $flashMessage = [
            'type' => 'success',
            'text' => 'Роль успешно удалена.',
        ];
        $response = response()->json($flashMessage);

        return $response;
    }
}
