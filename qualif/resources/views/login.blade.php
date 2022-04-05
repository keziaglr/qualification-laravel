@extends('template')
@section('content')
    <div>
        <form action="{{ url('/login') }}" style="margin: 50px 100px" method="POST">
            {{csrf_field()}}
                <legend> <strong class="d-flex justify-content-center">Login</strong> </legend>
                @if(session()->has('message'))
                    <div class="alert alert-dismissible alert-danger">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="form-group">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                        <label for="floatingInput">E-mail Address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                </div>
            <input style="margin: 25px 0" type="submit" class="btn btn-primary" value="Login">
        </form>
    </div>
@endsection
