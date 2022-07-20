@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('landing.store') }}" method="POST">
                    @csrf
                    <label for="basic-url" class="form-label">Buat Personal Link Kamu!</label>
                    <form action="{{ route('landing.store') }}" method="POST">
                        @csrf
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">https://borneos.link/</span>
                            </div>
                            <input type="text" name="prefix" id="prefixLanding" class="form-control" placeholder="linkanda" aria-label="link" aria-describedby="addon-wrapping">
                            
                            <button type="submit" class="btn btn-primary">Buat Link</button>
                        </div>
                    </form>
                    <button type="button" class="btn btn-outline-primary my-3" id="checkPrefixLanding" onclick="checkPrefixLanding()">
                        Cek Ketersediaan Link
                    </button>
                    <p class="notice"></p>
                </form>
            </div>
        </div>
    </div>
@endsection


@extends('components.sidebar')
@extends('components.user')