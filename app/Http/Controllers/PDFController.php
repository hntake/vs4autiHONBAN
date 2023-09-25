<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Picture;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Lost;

class PDFController extends Controller
{
    public function pdf(){

        $user=Auth::user();
        $lost=Lost::where('email','=',$user->email)->first();
        $image_path=Picture::where('uuid','=',$lost->uuid)->value('image');
        $image_data = base64_encode(file_get_contents('storage/' . $image_path));

       
        $pdf = \PDF::loadView('lost.pdf', compact('image_data'));
        return $pdf->stream('お守りシール.pdf');
    }
}
