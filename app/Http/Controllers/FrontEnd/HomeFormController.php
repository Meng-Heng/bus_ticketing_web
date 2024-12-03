<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeFormController extends Controller
{
    public $location = ["Phnom Penh - DN", "Siem Reap", "Sihanouk Ville", "Kompot", "Kep", "Battambang", "Banteay Meanchey"];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('web.frontend.page.home.index', ['location' => $this->location]);
    }

}
