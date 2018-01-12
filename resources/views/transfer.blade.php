@extends('layouts.app')

@section("transfer")
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <div class="panel-body">
        <h3>Transfer</h3>

@if(session()->has('message'))
                        <div class="alert alert-danger">
                        {{session()->get('message')}}
                        </div>
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


{{Form::open(array('route'=>'set-transfer'))}}

     
<div class="form-group">
                    {{Form::label('account','Account')}}
                    {{ Form::select('account',$key) }}
            </div>
                      
            <div class="form-group">
                    {{Form::label('wallet','Wallet')}}
                    {{Form::text('wallet',"",['class'=>'form-control'])}}
            </div>

            
            
            <div class="form-group">
                {{Form::label('amount','Amount')}}
                {{Form::text('amount',"",['class'=>'form-control'])}}
            </div>
            
            {{Form::button('submit',array(
                        'type'=>'submit',
                        'class'=> 'btn btn-primary'
            ))}}
                
        
            {{Form::close()}}
                           




</div> 

</div>
</div>   
</div>
@endsection