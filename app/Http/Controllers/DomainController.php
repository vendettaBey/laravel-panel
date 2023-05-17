<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DomainModel;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DomainController extends Controller
{
    /**
     * Show the form for creating the resource.
     */


    public function domainlerim()
    {
        $user = Auth::user();
        $user = User::find($user->id);
        $domains = DomainModel::where('user_id', $user->id)->get();

        return view('panel.domainlerim', compact('user', 'domains'));
    }
    public function create(): never
    {
        abort(404);
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request): never
    {
        abort(404);
    }

    public function domainRegister(Request $request)
    {
        dd($request->all());
        $token = $request->input('_token');
        $domain = $request->input('magaza');
        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');
        $phone = $request->input('telephone');
        $password = $request->input('password');

        $data = array(
            'token' => $token,
            'domain' => $domain,
            'name' => $name,
            'surname' => $surname,
            'email' => $email,
            'phone' => $phone,
            'password' => $password
        );

        $ch = curl_init('https://api.verysoft.com.tr/every/Customer/add/');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        echo $response;

    }

    /**
     * Display the resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(): never
    {
        abort(404);
    }
}