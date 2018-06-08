    @include('forms._input',[
    'name'=>'l_name',
    'class'=>'',
    'label'=>'Фамилия',
    ])
    @include('forms._input',[
    'name'=>'f_name',
    'class'=>'',
    'label'=>'Имя',
    'required'=>true,
    'text'=>'Обязательное поле',
    ])
    @include('forms._input',[
    'name'=>'m_name',
    'class'=>'',
    'label'=>'Отчество',
    ])
    @include('forms._select',[
    'name'=>'sex',
    'class'=>'form-control',
    'label'=>'Пол',
    'list' => ['male' => 'Мужчина', 'female' => 'Женщина'],
    'required' => true,
    'text' => 'Обязательное поле',
    ])
    @include('forms._input',[
    'name'=>'email',
    'class'=>'',
    'label'=>'Электронная почта',
    'required'=>true,
    'type'=>'email',
    'text'=>'Обязательное поле',
    ])
    @include('forms._input',[
    'name'=>'phone',
    'class'=>'js-phone-you',
    'label'=>'Телефон',
    'type'=>'tel',
    'required'=>true,
    'text'=>'Обязательное поле',
    ])
@if(!isset($user))
    @include('forms._input',[
    'name'=>'password',
    'class'=>'',
    'label'=>'Пароль',
    'required'=>true,
    'type'=>'password',
    ])

    @include('forms._input',[
    'name'=>'password_confirmation',
    'class'=>'',
    'label'=>'Повторите пароль',
    'required'=>true,
    'type'=>'password',
    ])
@endif