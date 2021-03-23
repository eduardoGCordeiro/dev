@extends('layout.main')

@section('content')
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-uppercase bg-light p-2">CADASTRO DE CURRÍCULO</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                            <form action="{{ $item->exists ? route('profile.update', $item) : route('profile.save')}}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <label for="name">Nome *</label>
                                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" aria-describedby="Nome" value="{{ old('name') ? : $item->name}}">
                                        @if($errors->has('name'))
                                            <div class="invalid-feedback">{{$errors->first('name')}}</div>
                                        @endif
                                    </div>

                                    <div class="col-6 form-group">
                                        <label for="office">Cargo desejado *</label>
                                        <input type="text" name="office" class="form-control {{ $errors->has('office') ? 'is-invalid' : '' }}" id="office" aria-describedby="Cargo desejado" value="{{ old('office') ? : $item->office}}">
                                        @if($errors->has('office'))
                                            <div class="invalid-feedback">{{$errors->first('office')}}</div>
                                        @endif
                                    </div>

                                    <div class="col-4 form-group">
                                        <label for="education_level_id">Escolaridade *</label>
                                        <select class="form-control {{ $errors->has('education_level_id') ? 'is-invalid' : '' }}" name="education_level_id" id="education_level_id">
                                            <option value="">Selecione...</option>
                                            @foreach(App\Models\EducationLevel::all() as $education_level)
                                                <option value="{{$education_level->id}}"
                                                    @if(
                                                        (old('education_level_id') && $education_level->id == old('education_level_id')) ||
                                                        (!old('education_level_id') && @$item->educationLevel && @$item->educationLevel->id == $education_level->id))
                                                    )
                                                        selected
                                                    @endif
                                                >{{$education_level->name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('education_level_id'))
                                            <div class="invalid-feedback">{{$errors->first('education_level_id')}}</div>
                                        @endif
                                    </div>

                                    <div class="col-5 form-group">
                                        <label for="email">Email *</label>
                                        <input type="text" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" aria-describedby="Email" value="{{ old('email') ? : $item->email}}">
                                        @if($errors->has('email'))
                                            <div class="invalid-feedback">{{$errors->first('email')}}</div>
                                        @endif
                                    </div>

                                    <div class="col-3 form-group">
                                        <label for="phone">Telefone *</label>
                                        <input type="text" name="phone" data-mask-format="(99) 99999 - 9999" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" id="phone" aria-describedby="Telefone" value="{{ old('phone') ? : $item->phone}}">
                                        @if($errors->has('phone'))
                                            <div class="invalid-feedback">{{$errors->first('phone')}}</div>
                                        @endif
                                    </div>
                                    
                                    <div class="col-12 form-group">
                                        <label for="observation">Observações</label>
                                        <textarea name="observation" class="form-control {{ $errors->has('observation') ? 'is-invalid' : '' }}" id="observation" aria-describedby="Observações">{{ old('observation') ? : $item->observation}}</textarea>
                                        @if($errors->has('observation'))
                                            <div class="invalid-feedback">{{$errors->first('observation')}}</div>
                                        @endif
                                    </div>

                                    <div class="col-4 form-group">
                                        <label for="file">Currículo (.pdf, .docx ou .doc) * </label>
                                        <div class="custom-file" id="file">
                                            <input type="file" name="file" class="custom-file-input {{ $errors->has('file') ? 'is-invalid' : '' }}" id="validatedCustomFile" value="{{ old('file') ? : $item->file}}">
                                            <label class="custom-file-label" for="validatedCustomFile">Selecione um arquivo...</label>
                                            @if($errors->has('file'))
                                                <div class="invalid-feedback">{{$errors->first('file')}}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <button type="submit" class="btn btn-primary">SALVAR</button>
                                        <a class="btn btn-secondary" href="{{route('profile.home')}}">CANCELAR</a>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
@endsection