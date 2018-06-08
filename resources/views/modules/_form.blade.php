{!! Form::open([ 'route' => ((!empty($route))? $route : '#'), 'class' => ((!empty($class))? $class : '') ] ) !!}
    @if(!empty($fields))
        @foreach($fields as $field)
            @if($field['type'] === 'hidden')
                {!! Form::hidden(((!empty($field['name']))? $field['name']:''), ((!empty($field['value']))? $field['value']:'')) !!}
            @endif
            @if($field['type'] === 'text')
                <div class="form-group row">
                    <label for="{{ ((!empty($field['name']))? $field['name']:'') }}" class="col-sm-4 col-form-label text-md-right">{{ ((!empty($field['label']))? $field['label']:'') }}</label>

                    <div class="col-md-6">
                        {!! Form::text(((!empty($field['name']))? $field['name']:''), ((!empty($field['value']))? $field['value']:''), [
                        'class' => ((!empty($field['class']))? $field['class']:''),
                        'required' => ((!empty($field['required']))? $field['required']:false),
                        'autofocus' => ((!empty($field['autofocus']))? $field['autofocus']:false)
                        ]) !!}
                        @if ($errors->has(((!empty($field['name']))? $field['name']:'')))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first(((!empty($field['name']))? $field['name']:'')) }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            @endif
            @if($field['type'] === 'tel')
                <div class="form-group row">
                    <label for="{{ ((!empty($field['name']))? $field['name']:'') }}" class="col-sm-4 col-form-label text-md-right">{{ ((!empty($field['label']))? $field['label']:'') }}</label>

                    <div class="col-md-6">
                        {!! Form::tel(((!empty($field['name']))? $field['name']:''), ((!empty($field['value']))? $field['value']:''), [
                        'class' => ((!empty($field['class']))? $field['class']:''),
                        'required' => ((!empty($field['required']))? $field['required']:false),
                        'autofocus' => ((!empty($field['autofocus']))? $field['autofocus']:false)
                        ]) !!}
                        @if ($errors->has(((!empty($field['name']))? $field['name']:'')))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first(((!empty($field['name']))? $field['name']:'')) }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            @endif
            @if($field['type'] === 'email')
                <div class="form-group row">
                    <label for="{{ ((!empty($field['name']))? $field['name']:'') }}" class="col-sm-4 col-form-label text-md-right">{{ ((!empty($field['label']))? $field['label']:'') }}</label>

                    <div class="col-md-6">
                        {!! Form::email(((!empty($field['name']))? $field['name']:''), ((!empty($field['value']))? $field['value']:''), [
                        'class' => ((!empty($field['class']))? $field['class']:''),
                        'required' => ((!empty($field['required']))? $field['required']:false),
                        'autofocus' => ((!empty($field['autofocus']))? $field['autofocus']:false)
                        ]) !!}
                        @if ($errors->has(((!empty($field['name']))? $field['name']:'')))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first(((!empty($field['name']))? $field['name']:'')) }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            @endif
            @if($field['type'] === 'password')
                <div class="form-group row">
                    <label for="{{ ((!empty($field['name']))? $field['name']:'') }}" class="col-sm-4 col-form-label text-md-right">{{ ((!empty($field['label']))? $field['label']:'') }}</label>

                    <div class="col-md-6">
                        {!! Form::password(((!empty($field['name']))? $field['name']:''), [
                        'class' => ((!empty($field['class']))? $field['class']:''),
                        'required' => ((!empty($field['required']))? $field['required']:false),
                        'autofocus' => ((!empty($field['autofocus']))? $field['autofocus']:false)
                        ]) !!}
                        @if ($errors->has(((!empty($field['name']))? $field['name']:'')))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first(((!empty($field['name']))? $field['name']:'')) }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            @endif
            @if($field['type'] === 'select')
                <div class="form-group row">
                    <label for="{{ ((!empty($field['name']))? $field['name']:'') }}" class="col-sm-4 col-form-label text-md-right">{{ ((!empty($field['label']))? $field['label']:'') }}</label>

                    <div class="col-md-6">

                        {!! Form::select(((!empty($field['name']))? $field['name']:''),
                        ((!empty($field['items']))? $field['items']:null), ((!empty($field['value']))? $field['value']:null),
                        ['placeholder' => ((!empty($field['placeholder']))? $field['placeholder']:null), 'class' => ((!empty($field['class']))? $field['class']:null)]) !!}

                        {{--{!! Form::password(((!empty($field['name']))? $field['name']:''), [--}}
                        {{--'class' => ((!empty($field['class']))? $field['class']:''),--}}
                        {{--'required' => ((!empty($field['required']))? $field['required']:false),--}}
                        {{--'autofocus' => ((!empty($field['autofocus']))? $field['autofocus']:false)--}}
                        {{--]) !!}--}}
                        @if ($errors->has(((!empty($field['name']))? $field['name']:'')))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first(((!empty($field['name']))? $field['name']:'')) }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            @endif
        @endforeach
    @endif
@if(!empty($btn))
<div class="form-group row mb-0">
    <div class="col-md-8 offset-md-4">
        <button type="submit" class="{!! $btn['class'] !!}">
            {!! $btn['label'] !!}
        </button>
    </div>
</div>
@endif
{!! Form::close() !!}