@extends('layouts.main')

@section('content')

    <div class="container pt-3 pb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $user->f_name }}</div>

                    <div class="card-body">
                        @include('users._form', ['user' => ($user ?? null)])
                    </div>
                    <div class="card-body">
                        {!! Form::model($user, ['route' => ['users.destroy', $user->id], 'method' => 'DELETE', 'class' => 'js-ajax']) !!}
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Удалить
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
