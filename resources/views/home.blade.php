@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tableau de bord de {{ Auth::user()->name }} </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                   email: {{ Auth::user()->email }} 
                 
                  
                   
                   
                   
                    <div class="text-right">
                    <button type="button" class="btn btn-success "><a href ="modifyUser">Modifier </a></button>
                    <div class="text-right">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
