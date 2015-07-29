<?php namespace App\Services;

use \Auth;

class CredentialsVerifier {
    public function verify($username, $password)
    {
        $credentials = ['email' => $username,'password' => $password];
        $otherCredentials = ['matricula' => $username, 'password' => $password];

        if (Auth::once($credentials) || Auth::once($otherCredentials)) {
            return Auth::user()->id;
        }

        return false;
    }
}