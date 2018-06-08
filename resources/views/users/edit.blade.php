@extends('layouts.main')

@section('content')

    <div class="container pt-3 pb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $user->f_name }}</div>

                    <div class="card-body">
                        @include('modules._form',
                        [
                            'route' => ['users.update' , $user->id ],
                            'class' => 'ajax',
                            'fields' => [
                                [
                                    'type' => 'hidden',
                                    'name' => '_method',
                                    'value' => 'PATCH'
                                ],
                                [
                                    'type' => 'text',
                                    'label' => 'Имя',
                                    'name' => 'f_name',
                                    'class' => 'form-control'.($errors->has('f_name') ? ' is-invalid' : ''),
                                    'value' => $user->f_name,
                                    'required' => true,
                                    'autofocus' => false
                                ],
                                [
                                    'type' => 'text',
                                    'label' => 'Фамилия',
                                    'name' => 'l_name',
                                    'class' => 'form-control'.($errors->has('l_name') ? ' is-invalid' : ''),
                                    'value' => $user->l_name
                                ],
                                [
                                    'type' => 'text',
                                    'label' => 'Отчество',
                                    'name' => 'm_name',
                                    'class' => 'form-control'.($errors->has('m_name') ? ' is-invalid' : ''),
                                    'value' => $user->m_name
                                ],
                                [
                                    'type' => 'select',
                                    'label' => 'Пол',
                                    'placeholder' => null,
                                    'name' => 'sex',
                                    'value' => $user->sex,
                                    'class' => 'form-control',
                                    'required' => true,
                                    'items' => ['male' => 'Мужчина', 'female' => 'Женщина']
                                ],
                                [
                                    'type' => 'tel',
                                    'label' => 'Телефон',
                                    'name' => 'phone',
                                    'class' => 'phone_you form-control'.($errors->has('phone') ? ' is-invalid' : ''),
                                    'value' => $user->phone,
                                    'required' => true,
                                ]
                            ],
                            'btn' => [
                                'label' => 'Сохранить',
                                'class' => 'btn btn-primary'
                            ]
                        ])
                    </div>
                    <div class="card-body">
                            @include('modules._form',
                            [
                                'route' => ['users.destroy' , $user->id ],
                                'class' => 'ajax',
                                'fields' => [
                                    [
                                        'type' => 'hidden',
                                        'name' => '_method',
                                        'value' => 'DELETE'
                                    ],
                                ],
                                'btn' => [
                                    'label' => 'Удалить',
                                    'class' => 'btn btn-primary'
                                ]
                            ])
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endsection
