@extends('template')

@section('contenu')
    <div class="col-sm-offset-4 col-sm-4">
        <br>
        <div class="panel panel-primary">
            <div class="panel-heading">Création d'un utilisateur</div>
            <div class="panel-body">
                <div class="col-sm-12">
                    {!! Form::open(['route' => 'user.store', 'class' => 'form-horizontal panel']) !!}
                    @csrf
                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
                        {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                        {!! Form::label('email', ' ') !!}
                        {!! Form::email('email', null, array('class' => 'form-control', 'onchange' => 'test()', 'placeholder' => 'Email')) !!}
                        <span id="erreur"></span>
                        {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Mot de passe']) !!}
                        {!! $errors->first('password', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirmation mot de passe', ]) !!}
                    </div>
                    {{--<div class="form-group">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('admin', 1, null) !!} Administrateur
                            </label>
                        </div>
                    </div>--}}
                    {!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right', 'disabled'=>true,   'id' => 'valider']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <a href="javascript:history.back()" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
    </div>
@endsection

@section('js')
    <script>
        function test() {

            var email = $('#email').val();
            var chaine= email.indexOf('.');
            longChaine  = email.substring(chaine+1);
            //alert();
            if (longChaine.length >= 2 ){

                document.getElementById("valider").disabled = false;
            }else{
                document.getElementById('valider').disabled = true;
                document.getElementById('erreur').innerHTML = 'Veuillez vérifiez votre email'

            }

        }

    </script>
@endsection