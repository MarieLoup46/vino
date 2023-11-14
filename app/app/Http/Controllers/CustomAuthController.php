<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:20'
        ]);

        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();

        // return redirect()->back()->withSuccess('User enregistré');
        return redirect(route('login'))->withSuccess('Utilisateur enregistré');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect(route('user.list'))->withSuccess('L\'usager a été supprimé');
    }

    public function accueil(User $user)
    {
        return view('auth.accueil');
    }

    public function authentication(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:20'
        ]);
        $credentials = $request->only('email', 'password');

        if(!Auth::validate($credentials)):
            return redirect(route('login'))
                ->withErrors(trans('auth.password'))
                ->withInput();
        endif;
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);

        return redirect()->intended(route('accueil'));
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }

    public function userList(){
        $users = User::orderBy('id')->get();

        // modifier le "auth" selon le nom de dossier que Jacqueline aura donné
        return view('auth.admin-user-list', ['users' => $users]);
    }
}
