@extends('layouts.app')

@section('content')

    <br>



    <?php //phpinfo(); ?>
    <div >
        @if(session()->has('ok'))
            <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
        @endif


        <div class="panel panel-primary ">

            <div class="panel-heading">
                <h3 class="panel-title">Liste des utilisateurs</h3>
            </div>

            <table class="table">
                <thead align="center">
                <tr>
                    <th>#</th>
                    <th >Nom</th>
                    <th colspan="3" >Action</th>

                </tr>
                </thead>
                <tbody align="center">
                @foreach ($users as $user)
                    <tr>
                        <td>{!! $user->id !!}</td>
                        <td class="text-primary"><strong>{!! $user->name !!}</strong></td>
                        <td>{!! link_to_route('user.show', 'Voir', [$user->id], ['class' => 'btn btn-success btn-block']) !!}</td>
                        <td>{!! link_to_route('user.edit', 'Modifier', [$user->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]) !!}
                            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')']) !!}

                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{!! link_to_route('user.create', 'Ajouter un utilisateur', [], ['class' => 'btn btn-info pull-right']) !!}</td>
                </tr>
                </tbody>


            </table>

        </div>

            {!! $links !!}

    </div>

@endsection

@section('js')


    <script src="{{asset('/js/jscroll.js')}}"></script>
    <script type="text/javascript">
       // alert()
        $('ul.pagination').hide();
        $(function() {
            $('.infinite-scroll').jscroll({
                autoTrigger: true,
                loadingHtml: '<img class="center-block" src="https://ayssacars.com/dashbord/img/myload.gif" alt="Loading..." />',
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.infinite-scroll',
                callback: function() {
                    $('ul.pagination').remove();
                }
            });
        });
    </script>

@stop

@section('css')

    <style>
        .vertical-menu {
            width: 200px;
        }

        .vertical-menu a {
            background-color: #eee;
            color: black;
            display: block;
            padding: 12px;
            text-decoration: none;
        }

        .vertical-menu a:hover {
            background-color: #ccc;
        }

        .vertical-menu a.active {
            background-color: #4CAF50;
            color: white;
        }
    </style>

@stop

{{-- <div class="infinite-scroll">

                <table class="table">

                    @foreach ($users as $user)


                        <tr >
                            <td>{!! $user->id !!}</td>
                            <td class="text-primary"><strong>{!! $user->name !!}</strong></td>
                            <td>{!! link_to_route('user.show', 'Voir', [$user->id], ['class' => 'btn btn-success btn-block']) !!}</td>
                            <td>{!! link_to_route('user.edit', 'Modifier', [$user->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
                            <td>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]) !!}
                                {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>

                    @endforeach
                        {!! $users->links() !!}
                </table>
                    </div>--}}
