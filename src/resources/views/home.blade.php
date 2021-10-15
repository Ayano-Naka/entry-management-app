@extends('layouts.logintemplate')

@section('content')
<div class="home-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="home-wrapper">
                            <div class="home-title">
                                <i class="material-icons">done</i>
                                {{ __('You are logged in!') }}
                            </div>
                            <p><a href="/">TOP</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection