<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
            'nom' => 'required|min:2',
            'prenom' => 'required|min:2',
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
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();

        return view('auth.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();

        return view('auth.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'nom' => 'required|min:2',
            'prenom' => 'required|min:2',
            'email' => 'required|email|unique:users',
        ]);

        $user = Auth::user();

        $user->nom = $request->input('nom');
        $user->prenom = $request->input('prenom');
        $user->email = $request->input('email');

        $user->update();

        // Retour sur le dossier ressources - views - show.blade.php
        return redirect(route('auth.show', $user->id))->withSuccess('Mise à jour réussie');
    }

    public function logout() {
        Auth::logout();

        return redirect(route('login'));
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

        Auth::logout();

        return redirect(route('login'))->withSuccess('Votre compte a été supprimé');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function deleteUserList(User $user)
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

    public function userList(){
        $users = User::orderBy('id')->get();

        // modifier le "auth" selon le nom de dossier que Jacqueline aura donné
        return view('auth.admin-user-list', ['users' => $users]);
    }

    public function forgotPassword() {
        return view('auth.forgot-password');
    }

    public function storeNewPassword(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|confirmed|min:6|max:20'
        ]);

        // va chercher l'usager dans la BD
        $user = User::where('email', $request->email)->first();

        // Hash = encryption
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect(route('login'))->withSuccess('Mot de passe modifié');
    }
}
