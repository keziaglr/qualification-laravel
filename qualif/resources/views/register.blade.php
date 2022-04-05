@extends('template')

@section('content')
    <form action="{{ url('/register') }}" style="margin: 50px 100px" method="POST">
        {{csrf_field()}}
        <legend> <strong class="d-flex justify-content-center" >Register</strong> </legend>
        @if ($errors->any())
            <div class="alert alert-dismissible alert-danger">
                {{$errors->first()}}
            </div>
        @endif
        @if(session()->has('message'))
            <div class="alert alert-dismissible alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="form-group">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" value="{{old('email')}}">
                <label for="floatingInput">E-mail Address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="{{old('password')}}">
                <label for="floatingPassword">Password</label>
            </div>
            <label class="form-label mt-4" >Gender</label>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="gender" id="optionsRadios1" value="male" >
                    Male
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="gender" id="optionsRadios2" value="female">
                    Female
                </label>
            </div>
            <div class="form-group">
                <label for="exampleTextarea" class="form-label mt-4">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" value="{{old('address')}}"></textarea>
            </div>
        </div>
        <input style="margin: 25px 0" type="submit" class="btn btn-primary" value="Register">
    </form>
@endsection
