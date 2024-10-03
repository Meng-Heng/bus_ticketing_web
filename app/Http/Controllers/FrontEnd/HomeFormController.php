<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeFormController extends Controller
{
    public $location = ["Phnom Penh", "Siem Reap", "Sihanouk Ville", "Kompot", "Kep", "Battambang", "Prey Veng"];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('web.frontend.page.home.index', ['location' => $this->location]);
    }

}
