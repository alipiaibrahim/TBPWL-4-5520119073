<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Consultation;

class ConsultationController extends Controller
{
    public function index(){
        return view('consultation');
    }
}
