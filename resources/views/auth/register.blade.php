@extends('layouts.auth')

@section('content')
    <div class="auth-card">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Register to login to the OPGI's website</h3>
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h5 class="text-center text-light">Register</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('register')}}" method="POST">
                            @csrf
                            <div class="form-group my-1">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" placeholder="Email Address" required autofocus>
    
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group my-1">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="User Name" required>
    
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group my-1">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}" placeholder="Password" autocomplete="new-password" required>
    
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group my-1">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" autocomplete="new-password" placeholder="Confirm your password" required>
    
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between mt-3">
                                <button type="submit" class="btn btn-warning">Register</button>
                                <a href="{{route('login')}}" class="btn btn-dark">Go to login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection