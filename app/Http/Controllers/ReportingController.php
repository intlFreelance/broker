<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class ReportingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function payments()
    {
        return view('reports.payments');
    }

    public function producers()
    {
        return view('reports.producers');
    }

    public function tracking()
    {
        return view('reports.tracking');
    }
}
