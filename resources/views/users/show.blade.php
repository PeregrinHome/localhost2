@extends('layouts.main')

@section('content')

    <div class="container pt-3 pb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $user->name }}</div>

                    <div class="card-body">
                        <p>{{ $user->surname }}</p>
                        <p>{{ $user->email }}</p>
                        <p>{{ $user->phone }}</p>
                        <p>{{ $user->sex }}</p>
                        <br>
                        <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Редактировать</a>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
