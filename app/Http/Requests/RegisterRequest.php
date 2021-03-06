<?php

namespace App\Http\Requests;

class RegisterRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|min:3|max:20',
            'last_name' => 'required|min:3|max:20',
            'password' => 'required|string',
            'age' => 'required|numeric|min:1|max:99',
            'gender' => 'required|boolean',
            'school' => 'required|string',
            'grade' => 'required|numeric|min:1|max:13'
        ];
    }

    public function attributes()
    {
        return [
            'first_name' => 'Vorname',
            'last_name' => 'Nachname',
            'password' => 'Passwort',
            'age' => 'Alter',
            'gender' => 'Geschlecht',
            'school' => 'Schule',
            'grade' => 'Klasse'
        ];
    }

}
