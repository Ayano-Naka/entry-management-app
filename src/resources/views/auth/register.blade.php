@extends('layouts.logintemplate')

@section('content')
<div class="login-main">
        <div class="login-triangle">
        </div>
        <h2 class="login-header">Register</h2>
        <form class="login-container">
            <p><input type="text" placeholder="Name"></p>
            <p><input type="email" placeholder="Email"></p>
            <p><input type="password" placeholder="Password"></p>
            <p><input type="password" placeholder="Confirm Password"></p>
            <p><input type="submit" value="Register"></p>
        </form>
</div>
@endsection