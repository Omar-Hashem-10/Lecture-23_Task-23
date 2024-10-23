@extends('web.site.app')

@section('title', 'Major')

@section('content')
<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('home.index')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">register</li>
        </ol>
    </nav>
    <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">
        <form class="form" action="{{route('site.register.store')}}" method="POST">
            @csrf
            <div class="form-items">
                <div class="mb-3">
                    <label class="form-label required-label" for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name">
                    @error('name')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="phone">Phone</label>
                    <input type="tel" name="phone" class="form-control" id="phone">
                    @error('phone')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email">
                    @error('email')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="password">password</label>
                    <input type="password" name="password" class="form-control" id="password">
                    @error('password')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="doctor">Doctor</label>
                    <input type="radio" name="type" id="doctor" value="doctor">

                    <br>

                    <label for="patient">Patient</label>
                    <input type="radio" name="type" id="patient" value="patient">

                    <br>

                    @error('type')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

            </div>
            <button type="submit" class="btn btn-primary">Create account</button>
        </form>
        <div class="d-flex justify-content-center gap-2">
            <span>already have an account?</span><a class="link" href="#"> login</a>
        </div>
    </div>

</div>
@endsection
