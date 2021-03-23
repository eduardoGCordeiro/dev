<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\EducationLevel;

class EducationLevelController extends Controller
{
    private function validator(array $data)
    {
        $validations =  [
            'name' => ['required', 'max:255', 'unique:education_levels,name,'. $data['id']]
        ];

        $messages = [
            'name.required' => 'O campo nome é obrigatório.',
            'name.max'      => 'O campo nome deve conter no máximo 255 caracteres.',
            'name.unique'      => 'Este nome já foi cadastrado, tente utilizar outro nome.'
        ];

        $validator =  Validator::make($data, $validations, $messages);
        return $validator;
    }

    public function index()
    {
        $items = EducationLevel::paginate();
        return view('educationLevel.home', compact('items'));
    }

    public function form(EducationLevel $item)
    {
        return view('educationLevel.form', compact('item'));
    }

    public function save(Request $request, EducationLevel $item)
    {
        $this->validator(array_merge($request->all(), ['id' => $item->id]))->validate();

        if (!$item->exists) {
            $item = new EducationLevel;
        }

        $item->fill($request->all());
        $item->save();

        return redirect()->route('education_level.home');
    }

    public function destroy(EducationLevel $item)
    {
        if (!$item->exists) {
            return abort(404);
        }

        $item->delete();
        return redirect()->route('education_level.home');
    }
}
