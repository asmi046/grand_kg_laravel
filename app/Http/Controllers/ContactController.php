<?php

namespace App\Http\Controllers;

use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::allFromCacheName();

        return view('contacts', [
            'title' => 'Контакты',
            'contacts' => [
                'company_name' => $contacts->get('company_name')?->value,
                'address' => $contacts->get('address')?->value,
                'phone' => $contacts->get('phone')?->value,
                'phone_2' => $contacts->get('phone_2')?->value,
                'email' => $contacts->get('email')?->value,
                'inn' => $contacts->get('inn')?->value,
                'ogrn' => $contacts->get('ogrn')?->value,
                'geo' => $contacts->get('geo')?->value,
            ],
        ]);
    }
}
