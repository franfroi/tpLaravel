@extends('page')
@extends('layouts.app')

@section('title')
Account
@endsection


@section('form')
<div class="container">
        <div class="row">
                        <div class="col-8">
                      
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

                        {{Form::open(array(
                                'route'=>'account-modify',
                                 
                        ))}}
                            <div class="form-group">
                                    {{Form::label('name','Name')}}
                                    {{Form::text('name',Auth::user()->name ,['class'=>'form-control'])}}
                            </div>
                            <div class="form-group">
                                    {{Form::label('email','Email')}}
                                    {{Form::text('email',Auth::user()->email ,['class'=>'form-control'])}}
                            </div>
                            <div class="form-group">
                                    {{Form::label('currentPassword','Current Password')}}
                                    {{Form::text('currentPassword',"",['class'=>'form-control'])}}
                            </div>
                            <div class="form-group">
                                    {{Form::label('newPassword','New Password')}}
                                    {{Form::text('newPassword',"",['class'=>'form-control'])}}
                            </div>
                            <div class="form-group">
                                    {{Form::label('renewPassword','Confirm new Password')}}
                                    {{Form::text('rePassword',"",['class'=>'form-control'])}}
                            </div>
                            {{Form::button('submit',array(
                                     'type'=>'submit',
                                     'class'=> 'btn btn-primary'
                                 ))}}
                                 <br>
                       
                        {{Form::close()}}
                           
                        
                        </div>
        </div>
</div>

@endsection