@extends('layouts.main')

@section('content')
    <div class="container pt-3">
        <div class="row justify-content-center">
            <div class="col-md-10">
                {!! Form::open(['route'=>'users.index','method'=>'GET', 'class'=> 'form-inline']) !!}
                    {{ Form::search('search',$frd['search'] ?? old('search') ?? null,[
                        'data-source'=>'/', //route('users.autocomplete')
                        'aria-label'=>'Recipients username',
                        'aria-describedby'=>'users__search',
                        'placeholder'=>"Поиск...",
                        'class'=>'form-control grow-1 js-autocomplete js-on-change-submit',
                    ]) }}
                    {!! Form::select('sex', ['male' => 'Мужчина', 'female' => 'Женщина'], null, ['placeholder' => 'Пол', 'class' => 'ml-2 form-control']) !!}
                    <div class="btn-group mx-2" role="group">
                        <a class="btn btn-outline-secondary " href="{{ route('users.index') }}"
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
                    @forelse ($users as $user)
                        <a href="{{ route('users.show', $user->id) }}" class="list-group-item list-group-item-action">{{ $user->f_name }}</a>
                    @empty
                        <p>No users</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    {{ $users->links() }}
@endsection
