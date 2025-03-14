<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Assuming 'User' model represents members

class MemberController extends Controller
{
    public function index()
    {
        $members = User::all(); // Fetch all members

        return view('member.index', compact('members'));
    }
}
