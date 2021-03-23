@extends('layout.main')

@section('content')
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-uppercase bg-light p-2">CADASTRO DE ESCOLARIDADE</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                            <form action="{{ $item->exists ? route('education_level.update', $item) : route('education_level.save')}}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <label for="name">Nome *</label>
                                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" aria-describedby="Nome" value="{{ old('name') ? : $item->name}}">
                                        @if($errors->has('name'))
                                            <div class="invalid-feedback">{{$errors->first('name')}}</div>
                                        @endif
                                    </div>

                                    <div class="col-12 mt-4">
                                        <button type="submit" class="btn btn-primary">SALVAR</button>
                                        <a class="btn btn-secondary" href="{{route('education_level.home')}}">CANCELAR</a>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
@endsection