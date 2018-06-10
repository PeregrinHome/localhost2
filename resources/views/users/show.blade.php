@extends('layouts.main')

@section('content')

    <div class="container pt-3 pb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $user->getName() }}</div>

                    <div class="card-body">
                        <p>{{ $user->getLastName() }}</p>
                        <p>{{ $user->getMiddleName() }}</p>
                        <p>{{ $user->email }}</p>
                        <p>{{ $user->phone }}</p>
                        <p>{{ $user->sex }}</p>
                        <br>
                        <p class="h5">Роли</p>
                        @forelse($roles as $role)
                            <p class="text-success">{{ $role->getDisplayName() }}</p>
                        @empty
                            <p class="text-danger">Разрешений нет</p>
                        @endforelse
                        <br>
                        <a class="btn btn-primary" href="{{ route('users.edit', $user) }}">Редактировать</a>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
