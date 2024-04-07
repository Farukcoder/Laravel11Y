<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Student;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        $data = Contact::with('student')->get();

        return $data;
    }
}
