@extends('layouts.main')

@section('content')
    <div class="container pt-3">
        <div class="row justify-content-center">
            <div class="col-md-10">
                {!! Form::open(['route'=>'permissions.index','method'=>'GET', 'class'=> 'form-inline']) !!}
                    {{ Form::search('search',$frd['search'] ?? old('search') ?? null,[
                        'data-source'=>'/', //route('permissions.autocomplete')
                        'aria-label'=>'Recipients permissionname',
                        'aria-describedby'=>'permissions__search',
                        'placeholder'=>"Поиск...",
                        'class'=>'form-control grow-1 js-autocomplete js-on-change-submit',
                    ]) }}
                    <div class="btn-group mx-2" role="group">
                        <a class="btn btn-outline-secondary " href="{{ route('permissions.index') }}"
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
                    @forelse ($permissions as $permission)
                        <a href="{{ route('permissions.show', $permission) }}" class="list-group-item list-group-item-action">{{ $permission->getDisplayName() }}</a>
                    @empty
                        <p>No permissions</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    {{ $permissions->links() }}
@endsection
