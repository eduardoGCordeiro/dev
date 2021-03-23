@extends('layout.main')

@section('content')
                <div class="row mb-2">
                    <div class="col-6">
                        <h5>ESCOLARIDADES</h5>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{route('education_level.create')}}"
                            class="btn btn-success waves-effect waves-light mb-2" data-animation="fadein">
                            <i class="mdi mdi-plus-circle mr-1"></i> Nova Escolaridade
                        </a>
                    </div>
                </div>

                @if(count($items))
                <div class="table-responsive">
                    <table class="table table-centered table-hover mb-0">
                        <thead>
                            <tr>
                                <th>NOME</th>
                                <th style="width: 150px;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr>
                                <td>
                                    {{$item->name}}
                                </td>

                                <td>
                                    <a href="{{route('education_level.edit', $item)}}" class="action-icon">
                                        <i class="mdi mdi-pencil"></i>
                                    </a>
                                    <a href="{{route('education_level.delete', $item)}}" class="action-icon confirm-delete">
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