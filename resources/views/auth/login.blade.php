@extends('layouts.app')
@section('content')
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-xl-6 col-lg-8 col-md-8">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Penjadwalan Vidcon</h1>
                                </div>
                                <form class="user" action="{{ route('auth') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" placeholder="Username" name="username">
                                        @error('username')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Login">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection