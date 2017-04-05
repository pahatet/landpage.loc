<div class="bg-light-gray">
    <div class="wrapper container-fluid">
        
        {!! Form::open(['url'=>route('peoplesAdd'),  'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}

        <div class="form-group">
            {!! Form::label('name','Имя', ['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Введите имя']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('position','Должность', ['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::text('position', old('position'), ['class'=>'form-control', 'placeholder'=>'Введите должность']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('text','Текст', ['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::textarea('text', old('text'), ['id'=>'editor', 'class'=>'form-control', 'placeholder'=>'Введите текст']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('images','Изображение', ['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">

                {!! Form::file('images', ['class'=>'filestyle', 'data-buttonText'=>'Выберите изображение', 'data-buttonName'=>'btn-primary', 'data-placeholder'=>'Файла нет']) !!}

            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-8">
                {!! Form::button('Сохранить', ['class'=>'btn btn-info', 'type'=>'submit']) !!}
            </div>
        </div>

        {{ Form::close() }}
     
     <script>
        CKEDITOR.replace('editor');
     </script>

    </div>
</div>