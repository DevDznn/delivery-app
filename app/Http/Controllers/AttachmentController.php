<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
    public function index()
    {
        return Attachment::with('vehicle')->get();
    }
   
}
