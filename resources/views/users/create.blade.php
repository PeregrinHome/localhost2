@extends('layouts.main')

@section('content')
    <div class="container pt-3 pb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Создание пользователя</div>

                    <div class="card-body">

                        @include('users._form', ['user' => ($user ?? null)])

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
