@extends('layouts.admin')
@section('content')

<div class="container">

    <h3>Biodata Personal Link</h3>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">


                    @if (isset($landings))

                        @foreach ($landings as $landing)


                            <form action="{{ route('landing.update', $landing->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">Upload Foto</span>
                                        </div>
                                        <div class="custom-file">
                                        <input type="file" accept="image/*" onchange="preview()" class="custom-file-input" id="images" name="images" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Judul" value="{{ $landing->title }}">
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control" id="description" name="description" rows="5" placeholder="Deskripsi">{{ $landing->description }}</textarea>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><img src="{{ asset('images/facebook-color.png') }}" alt=""></span>
                                        </div>
                                        <input type="text" class="form-control" name="facebook" placeholder="Facebook URL" aria-label="facebook" aria-describedby="basic-addon1" value="{{ $landing->social_facebook }}">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><img src="{{ asset('images/twitter-color.png') }}" alt=""></span>
                                        </div>
                                        <input type="text" class="form-control" name="twitter" placeholder="Twitter URL" aria-label="twitter" aria-describedby="basic-addon1" value="{{ $landing->social_twitter }}">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><img src="{{ asset('images/youtube-color.png') }}" alt=""></span>
                                        </div>
                                        <input type="text" class="form-control" name="youtube" placeholder="YouTube URL" aria-label="youtube" aria-describedby="basic-addon1" value="{{ $landing->social_youtube }}">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><img src="{{ asset('images/instagram-color.png') }}" alt=""></span>
                                        </div>
                                        <input type="text" class="form-control" name="instagram" placeholder="Instagram URL" aria-label="instagram" aria-describedby="basic-addon1" value="{{ $landing->social_instagram }}">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><img src="{{ asset('images/linkedin-color.png') }}" alt=""></span>
                                        </div>
                                        <input type="text" class="form-control" name="linkedin" placeholder="linkedIn URL" aria-label="linkedin" aria-describedby="basic-addon1" value="{{ $landing->social_linkedin }}">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </form>

                        @endforeach
                    @else
                        <p class="text-danger">Silahkan buat personal link anda terlebih dahulu</p>
                    @endif




                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="wrapper">
                        @foreach ($landings as $landing)
                            {{-- {{ dd($landing->image) }} --}}
                            <div class="image">
                                <img src="{{ $landing->image == '' ? asset('images/undraw_profile_1.svg') : $landing->image }}" style="border-radius: 50%;
                                object-fit: cover;" width="100" height="100" alt="" id="imgpreview">
                            </div>
                                <div class="title-desc">
                                    <h3 id="text-title"> {{ $landing->title }} </h3>
                                    <p id="text-desc">{{ $landing->description }}</p>
                                </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@extends('components.sidebar')
@extends('components.user')
