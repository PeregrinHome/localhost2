<?php

namespace App\Http\Controllers;

use App\Models\Users\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use PHPUnit\Util\Json;
use Illuminate\Database\Query\Builder;

class UserController extends Controller
{
    protected $users;

    public function __construct(User $users)
    {
        $this->users  = $users;
        Route::model('user',User::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $frd   = $request->all();
        $users = $this
            ->users
            ->filter($frd)
            ->paginate($frd['perPage'] ?? $this->users->getPerPage());

//        $users = $this->users->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'f_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'sex' => 'required|string|max:10',
            'password' => 'required|string|min:6|confirmed',
            'l_name' => 'max:255',
            'm_name' => 'max:255',
        ]);
        $frd = $request->all();
        $user = $this->users->create($frd);

        $flashMessage = [
            'type' => 'success',
            'text' => 'Профиль пользователя «' . $user->f_name . '» успешно создан.',
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
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
        return view('users.edit', compact('user'));
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
        $this->validate($request, [
            'f_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'sex' => 'required|string|max:10',
            'l_name' => 'max:255',
            'm_name' => 'max:255',
        ]);
        $frd = $request->all();
        $user->update($frd);

        $flashMessage = [
            'type' => 'success',
            'text' => 'Профиль пользователя «' . $user->f_name . '» успешно обновлен',
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
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $this->users->destroy($user->id);

        $flashMessage = [
            'type' => 'success',
            'text' => 'Профиль пользователя успешно удален.',
        ];
        $response = response()->json($flashMessage);

        return $response;
    }
}
