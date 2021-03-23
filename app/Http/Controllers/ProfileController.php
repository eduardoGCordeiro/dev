<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    private function validator(Request $request)
    {

    }

    public function index()
    {
        $items = Profile::paginate();
        return view('profile.home', compact('items'));
    }

    public function form(Profile $item)
    {
        return view('profile.form', compact('item'));
    }

    public function save(Request $request)
    {
        $profile = new Profile;
        $profile->fill($request->all());
        return view('profile.home');
    }

    public function destroy(Profile $item)
    {
        $item->destroy;
        return view('profile.home');
    }
}
