@extends('layouts.main')

@section('content')
    <div class="container pt-3">
        <div class="row justify-content-center">
            <div class="col-md-10">
                {!! Form::open(['route'=>'roles.index','method'=>'GET', 'class'=> 'form-inline']) !!}
                    {{ Form::search('search',$frd['search'] ?? old('search') ?? null,[
                        'data-source'=>'/', //route('roles.autocomplete')
                        'aria-label'=>'Recipients rolename',
                        'aria-describedby'=>'roles__search',
                        'placeholder'=>"Поиск...",
                        'class'=>'form-control grow-1 js-autocomplete js-on-change-submit',
                    ]) }}
                    <div class="btn-group mx-2" role="group">
                        <a class="btn btn-outline-secondary " href="{{ route('roles.index') }}"
                           title="Очистить форму">Очистить</a>
                    </div>
                    <button class="btn btn-primary" type="submit">Вперед!</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="container pt-3 pb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="list-group">
                    @forelse ($roles as $role)
                        <a href="{{ route('roles.show', $role) }}" class="list-group-item list-group-item-action">{{ $role->getDisplayName() }}</a>
                    @empty
                        <p>No roles</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    {{ $roles->links() }}
@endsection
