@extends('layout.main')

@section('content')
            <div class="row mb-2">
                    <div class="col-6">
                        <h5>CURRÍCULOS</h5>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{route('profile.create')}}"
                            class="btn btn-success waves-effect waves-light mb-2" data-animation="fadein">
                            <i class="mdi mdi-plus-circle mr-1"></i> Novo Currículo
                        </a>
                    </div>
                </div>

                @if(count($items))
                <div class="table-responsive">
                    <table class="table table-centered table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Número</th>
                                <th>Cargo desejado</th>
                                <th>Escolaridade</th>
                                <th>IP</th>
                                <th>Enviado em</th>
                                <th style="width: 150px;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->office}}</td>
                                <td>{{$item->educationLevel->name}}</td>
                                <td>{{$item->ip}}</td>
                                <td>{{ date_format($item->created_at, 'd/m/Y H:m:i') }}</td>

                                <td>
                                    <a href="{{route('profile.edit', $item)}}" class="action-icon">
                                        <i class="mdi mdi-pencil"></i>
                                    </a>
                                    <a href="{{route('profile.delete', $item)}}" class="action-icon">
                                        <i class="mdi mdi-delete"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{$items->appends(app('request')->query->all())->links()}}

                @else
                    <div class="alert alert-info" role="alert">
                        <i class="mdi mdi-alert-circle-outline mr-2"></i> Nenhum resultado encontrado!
                    </div>
                @endif
@endsection