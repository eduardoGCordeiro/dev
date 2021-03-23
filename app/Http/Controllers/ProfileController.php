<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Profile;
use App\Models\File;

class ProfileController extends Controller
{
    private function validator(array $data)
    {
        $validations =  [
            'name'               => ['required', 'max:255'],
            'office'             => ['required', 'max:255'],
            'education_level_id' => ['required', 'max:255'],
            'email'              => ['required', 'max:255', 'unique:profiles,email,'. $data['id']],
            'phone'              => ['required', 'max:255'],
            'observation'        => ['max:400'],
            'file'               => [
                                        'required',
                                        'max:1024',
                                        'mimeTypes:application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/msword'
                                    ]
        ];

        $messages = [
            'name.required'               => 'O campo nome é obrigatório.',
            'name.max'                    => 'O campo nome deve conter no máximo 255 caracteres.',
            'office.required'             => 'O campo cargo desejado é obrigatório.',
            'office.max'                  => 'O campo cargo desejado deve conter no máximo 255 caracteres.',
            'education_level_id.required' => 'O campo escolaridade é obrigatório.',
            'email.required'              => 'O campo email é obrigatório.',
            'email.max'                   => 'O campo email deve conter no máximo 255 caracteres.',
            'email.unique'                => 'Este email já foi cadastrado, tente utilizar outro email.',
            'phone.required'              => 'O campo telefone é obrigatório.',
            'phone.max'                   => 'O campo telefone deve conter no máximo 255 caracteres.',
            'observation.max'             => 'O campo observação deve conter no máximo 400 caracteres.',
            'file.required'               => 'O campo currículo é obrigatório.',
            'file.size'                   => 'O campo currículo deve ser de no máximo 1MB.',
            'file.mime_types'             => 'O campo currículo deve ser pdf, docx ou doc.'
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

    public function save(Request $request, Profile $item)
    {
        $this->validator(array_merge($request->all(), ['id' => $item->id]))->validate();

        if ($item->exists) {
            $item->file()->delete();
        }

        if (!$item->exists) {
            $item = new Profile;
            $item->ip = $request->ip();
        }


        $item->fill($request->all());
        $item->save();

        $item->file()->save($this->saveUpload($request->file));

        return redirect()->route('profile.home');
    }

    public function destroy(Profile $item)
    {
        if (!$item->exists) {
            return abort(404);
        }

        $item->delete();
        return redirect()->route('profile.home');
    }

    private function saveUpload($file)
    {
        $path = str_replace('.', '/', 'public/Profile');
        $filePath = $file->store($path);

        $item = new File();
        $item->fill([
            'file_path' => $filePath,
            'original_filename' => preg_replace('/\.' . $file->getClientOriginalExtension() . '$/i', '', $file->getClientOriginalName()),
            'extension' => $file->extension() ?: $file->getClientOriginalExtension(),
            'bytes' => $file->getSize(),
            'mime_type' => $file->getMimeType(),
            'md5_hash' => md5(\Storage::get($filePath))
        ]);

        $item->save();
        return $item;
    }
}
