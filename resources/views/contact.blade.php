@extends('template')

@section('contenu')

    <br>
    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading">Contactez-moi</div>
            <div class="panel-body">
                {!! Form::open(['url' => 'contact']) !!}
                <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
                    {!! Form::label('nom', 'Entrez votre nom : ') !!}
                    {!! Form::text('nom', null, array('class' => 'form-control', 'placeholder' => 'Votre nom', 'onchange' => 'test()')) !!}
                    {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                    {!! Form::label('email', 'Entrez votre email : ') !!}
                    {!! Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Entrez votre email')) !!}
                    {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('texte') ? 'has-error' : '' !!}">
                    {!! Form::label('texte', 'Entrez votre message : ') !!}
                    {!! Form::textarea ('texte', null, array('class' => 'form-control', 'placeholder' => 'Votre message')) !!}
                    {!! $errors->first('texte', '<small class="help-block">:message</small>') !!}
                </div>
                {!! Form::submit('Envoyer !', array('class' => 'btn btn-info pull-right', 'disabled'=>true,   'id' => 'valider')) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function test() {

          var nom = $('#nom').val();
          //var email = $('#email').val();
          if (nom != "" ){
//alert(1)
              document.getElementById("valider").disabled = false;
          }else{
              document.getElementById('valider').disabled = true;
          }

        }

    </script>
@endsection

@section('css')
    <style type="text/css">




    </style>

@stop
