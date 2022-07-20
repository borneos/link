@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">Profile</h1>
                        @foreach ($users as $user)

                            <div class="d-flex justify-content-center">
                                <img src="{{ $user->image ?? asset('images/undraw_profile_1.svg') }}" alt="" style="object-fit: cover; border-radius: 50%;" width="150" height="150">
                            </div>

                            <form action="{{ route('profile.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                {{-- Name readonly --}}
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" readonly>
                                </div>
                                {{-- Email readonly --}}
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" readonly>
                                </div>
                                {{-- Old Password  --}}
                                <div class="form-group">
                                    <label for="oldpassword">Password Lama</label>
                                    <input type="password" class="form-control" name="oldpassword" id="oldpassword" placeholder="*************">
                                </div>
                                {{-- New Password --}}
                                <div class="form-group">
                                    <label for="newpassword">Password Baru</label>
                                    <input type="password" class="form-control" name="newpassword" id="newpassword"  placeholder="*************">
                                </div>

                                {{-- Confirm New Password  --}}
                                <div class="form-group">
                                    <label for="confirmpassword">Konfirmasi Password Baru</label>
                                    <input type="password" class="form-control" name="confirmpassword" id="confirmpassword"  placeholder="*************">
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </form>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('components.sidebar')
@extends('components.user')
