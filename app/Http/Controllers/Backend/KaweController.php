<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OldCertificate;

class KaweController extends Controller
{
    public function KaweView()
    {
        $data['allData'] = OldCertificate::all();
        return view('backend.kawe.view_kawe', $data);
    }
}
