@extends('layouts.admin')
@section('content')

<div class="container">
    <h2>Biodata</h2>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('landing.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Foto</label>
                            <input class="form-control" type="file" id="images" name="images" multiple>
                        </div>
                        <div class="mb-3">
                            {{-- <label for="exampleFormControlInput1" class="form-label">Judul</label> --}}
                            <input type="text" wire:model="title" class="form-control" id="title" name="title" placeholder="Judul">
                        </div>
                        <div class="mb-3">
                            {{-- <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label> --}}
                            <textarea class="form-control" id="description" name="description" rows="5" placeholder="Deskripsi"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="wrapper">
                        <div class="image">
                            <img src="{{ asset('images/undraw_profile_2.svg') }}" width="100" alt="">
                        </div>
                
                        <div class="title-desc">
                            <h3> Title </h3>
                            <p>Deskripsi Landing Page</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   
@endsection

@extends('components.sidebar')
@extends('components.user')