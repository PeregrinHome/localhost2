@extends('layouts.main')

@section('content')
    <div class="container pt-3 pb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Создание пользователя</div>

                    <div class="card-body">

                        @include('modules._form',
                        [
                            'route' => 'users.store',
                            'fields' => [
                                [
                                    'type' => 'email',
                                    'label' => 'Email',
                                    'name' => 'email',
                                    'class' => 'form-control'.($errors->has('email') ? ' is-invalid' : ''),
                                    'required' => true,
                                    'autofocus' => false
                                ],
                                [
                                    'type' => 'text',
                                    'label' => 'Имя',
                                    'name' => 'f_name',
                                    'class' => 'form-control'.($errors->has('f_name') ? ' is-invalid' : ''),
                                    'required' => true,
                                    'autofocus' => false
                                ],
                                [
                                    'type' => 'text',
                                    'label' => 'Фамилия',
                                    'name' => 'l_name',
                                    'class' => 'form-control'.($errors->has('l_name') ? ' is-invalid' : ''),
                                ],
                                [
                                    'type' => 'text',
                                    'label' => 'Отчество',
                                    'name' => 'm_name',
                                    'class' => 'form-control'.($errors->has('m_name') ? ' is-invalid' : ''),
                                ],
                                [
                                    'type' => 'select',
                                    'label' => 'Пол',
                                    'placeholder' => null,
                                    'name' => 'sex',
                                    'class' => 'form-control',
                                    'required' => true,
                                    'items' => ['male' => 'Мужчина', 'female' => 'Женщина']
                                ],
                                [
                                    'type' => 'tel',
                                    'label' => 'Телефон',
                                    'name' => 'phone',
                                    'class' => 'phone_you form-control'.($errors->has('phone') ? ' is-invalid' : ''),
                                    'required' => true,
                                ],
                                [
                                    'type' => 'password',
                                    'label' => 'Пароль',
                                    'name' => 'password',
                                    'class' => 'form-control'.($errors->has('password') ? ' is-invalid' : ''),
                                    'required' => true,
                                ],
                                [
                                    'type' => 'password',
                                    'label' => 'Повторите пароль',
                                    'name' => 'password_confirmation',
                                    'class' => 'form-control',
                                    'required' => true,
                                ]
                            ],
                            'btn' => [
                                'label' => 'Сохранить',
                                'class' => 'btn btn-primary'
                            ]
                        ])
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
