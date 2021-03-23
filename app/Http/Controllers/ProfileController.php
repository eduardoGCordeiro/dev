<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Profile;

class ProfileController extends Controller
{
    private function validator(array $data)
    {
        $validations =  [
            'name'               => ['required', 'max:255'],
            'office'             => ['required', 'max:255'],
            'education_level_id' => ['required', 'max:255'],
            'email'              => ['required', 'max:255'],
            'phone'              => ['required', 'max:255'],
            'observation'        => ['max:400'],
            'file'               => ['required', 'size:1024', 'mimes: pdf, docx, doc']
        ];

        $messages = [
            'name.required'               => 'O campo nome é obrigatório.',
            'name.max'                    => 'O campo nome deve conter no máximo 255 caracteres.',
            'office.required'             => 'O campo cargo desejado é obrigatório.',
            'office.max'                  => 'O campo cargo desejado deve conter no máximo 255 caracteres.',
            'education_level_id.required' => 'O campo escolaridade é obrigatório.',
            'email.required'              => 'O campo email é obrigatório.',
            'email.max'                   => 'O campo email deve conter no máximo 255 caracteres.',
            'phone.required'              => 'O campo telefone é obrigatório.',
            'phone.max'                   => 'O campo telefone deve conter no máximo 255 caracteres.',
            'observation.max'             => 'O campo observação deve conter no máximo 400 caracteres.',
            'file.required'               => 'O campo currículo é obrigatório.',
            'file.size'                   => 'O campo currículo deve ser de no máximo 1MB.',
            'file.mimes'                  => 'O campo currículo deve ser pdf, docx ou doc.'
        ];


        $validator =  Validator::make($data, $validations, $messages);
        return $validator;
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
        $this->validator($request->all())->validate();

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
