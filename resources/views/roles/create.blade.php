@extends('layouts.main')

@section('content')
    <div class="container pt-3 pb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Создание роли</div>

                    <div class="card-body">
                        {!! Form::model(null, ['route' => ['roles.store'], 'method' => 'POST']) !!}
                        @include('roles._form')
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Сохранить
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
