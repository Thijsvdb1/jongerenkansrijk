<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class indexController extends Controller
{
    public function index() {
        return View::make('index')
            ->with('jongeren', Jongeren::all())
            ->with('instituut', Intstituut::all())
            ->with('activiteiten', Activiteiten::all());
    }
}
