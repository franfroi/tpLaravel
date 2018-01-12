
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tableau de bord de {{ Auth::user()->name }} 
                    <div class="text-right">
                        <button type="button" class="btn btn-success "><a href ="{{ route('account') }}">Account </a></button>
                    </div>
                </div>
                        <div class="panel-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                {{session()->get('message')}}
                                </div>
                                @endif
                        
                               @include ("wallet")
                               
                            <div >
                                <button type="button" class="btn btn-success "><a href ="{{ route('transfer') }}">transfer </a></button>
                            </div>
                           
                  

                        
                        </div>
                       

            </div>
        </div>
    </div>
</div>
@endsection
