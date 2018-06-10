@extends('layouts.main')

@section('content')
    <div class="container pt-3 pb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $role->getDisplayName() }}</div>

                    <div class="card-body">
                        <p>Псевдоним {{ $role->getName() }}</p>
                        <p class="h5">Описание</p>
                        <p>{{ $role->getDescription() }}</p>
                        <br>
                        <p class="h5">Разрешения</p>
                            @forelse($permissions as $permission)
                                <p class="text-success">{{ $permission->getDisplayName() }}</p>
                            @empty
                                <p class="text-danger">Разрешений нет</p>
                            @endforelse
                        <br>
                        <a class="btn btn-primary" href="{{ route('roles.edit', $role) }}">Редактировать</a>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
