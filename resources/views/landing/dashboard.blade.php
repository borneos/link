@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Dashboard Personal Link - {{ $landings[0]->title }} </h2>
        <div class="row">
            <div class="col-lg-8">
                <div class="card my-3">
                    <div class="card-body">
                        <p class="text-success font-weight-bold"> Total Kunjungan Halaman : {{ $landings[0]->visited }} klik </p>
                    </div>
                </div>
                <div class="card overflow-auto">
                    <div class="card-body">
                        <h3>Tambah Link Baru</h3>

                        @foreach ($landings as $landing)

                            @if ($landing->title == "")
                                <p class="text-danger"> Profil anda kosong, silahkan isi biodata terlebih dahulu! </p>
                                <a href="{{ route('biodata') }}" class="btn btn-primary">Isi Biodata</a>
                            @else

                                <form action="{{ route('storeLinks', $landing->id) }}" method="POST">
                                    @csrf
                                    {{-- @method('PUT') --}}

                                    {{-- <button type="button" class="btn btn-primary" id="add">Tambahkan Link</button> --}}
                                    <button type="submit" id="btnSave" class="btn btn-success my-3" disabled>Simpan Perubahan</button>
                                    @php
                                        $no = 1;
                                    @endphp

                                    <div id="item">

                                        {{-- @if ($data_link != null)
                                            @foreach ($data_link as $data) --}}
                                                {{-- {{ dd($data) }} --}}
                                                {{-- <div class='itemCard{{ $data->id }}' id='itemCard{{ $no++ }}' class='card mb-3 mt-3'>
                                                    <div class='card-body'>

                                                        <input type='text' name='text[]' id='itemText{{ $no++ }}' class='form-control mb-2' placeholder='Item Text' value="{{ $data->text }}">
                                                        <input type='text' name='url[]' id='itemUrl{{ $no++ }}' class='form-control mb-2' placeholder='Item Link URL' value="{{ $data->url}}">
                                                        <button type='button' id="btnDelete{{ $data->id }}" class='btn btn-outline-danger' onclick="deleteItem({{$data->id}})" >Hapus</button>
                                                    </div>
                                                </div> --}}
                                            {{-- @endforeach
                                        @else
                                        @endif --}}

                                        <div class='itemCard' id='itemCard' class='card mb-3 mt-3'>
                                            <input type='text' name='name' id="text" class='form-control mb-2 item' placeholder='Item Text'>
                                            <input type='text' name='link' id="url" class='form-control mb-2 item' placeholder='Item Link URL'>
                                        </div>
                                    </div>

                                </form>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="card my-3">
                    <div class="card-body vh-100 overflow-auto">
                        <h3>Edit data link</h3>
                            @foreach ($links as $link)
                                @php
                                    $no = 0;
                                @endphp
                                {{-- {{ dd($data) }} --}}
                                <div class='card mb-3 mt-3'>
                                    <div class='card-body'>
                                        <p class="text-success py-2">Total Kunjungan Link : {{ $link->visited }} Klik</p>
                                        <input type='text' name='text[]' id='itemText' class='form-control mb-2 itemText' placeholder='Item Text' value="{{ $link->name }}" readonly>
                                        <input type='text' name='url[]' id='itemUrl' class='form-control mb-2 itemUrl' placeholder='Item Link URL' value="{{ $link->link}}" readonly>

                                        <form method="POST" id="deleteForm" action="{{ route('links.destroy', $link->id) }}">
                                            <a href="{{ route('links.edit', $link->id) }}" class='btn btn-outline-primary editData'data-toggle="modal" data-target="#modalEdit" data-id="{{ $link->id }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-outline-danger show_confirm">Hapus</button>
                                        </form>
                                        {{-- <button type="button" class='btn btn-outline-danger btnDelete' data-id="{{ $link->id }}" >Hapus</button> --}}
                                    </div>
                                </div>
                            @endforeach
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        @foreach ($landings as $landing)

                            <div class="input-group">
                                <input type="text" id="link-personal" class="form-control my-2" value="{{ $landing->value }}" readonly>
                            </div>
                                <button type="button" id="btncopy" class="btn btn-dark btn-sm mb-2 btn-block" onclick="window.alert('Link telah disalin')" data-clipboard-target="#link-personal">Salin</button>

                            <div class="wrapper  overflow-auto">
                                <div class="image">
                                    <img src="{{ $landing->image == '' ? asset('images/undraw_profile_1.svg') : $landing->image }}" style="border-radius: 50%;
                                    object-fit: cover;" width="100" height="100" alt="">
                                </div>
                                <div class="title-desc">
                                    <h3 id="text-title"> {{ $landing->title }} </h3>
                                    <p id="text-desc">{{ $landing->description }}</p>
                                </div>

                                <div class="d-flex flex-column px-3 item-preview">
                                    @if ($links != null)
                                        @foreach ($links as $link)
                                            <a href="{{ $link->link }}" class="btn btn-light my-2">{{ $link->name }} </a>
                                        @endforeach
                                    @endif
                                </div>

                                @if ($landing->social_facebook || $landing->social_instagram || $landing->social_youtube || $landing->social_linkedin || $landing->social_twitter )

                                <div class="social-media">
                                    <h3>Social Media</h3>
                                    <div class="row">
                                        @if ($landing->social_facebook)
                                            <div class="col text-center">
                                                <a href="{{ $landing->social_facebook }}" target="_blank"><img src="{{ asset('images/facebook-color.png') }}" alt="" srcset=""></a>
                                            </div>
                                        @endif

                                        @if ($landing->social_instagram)
                                            <div class="col text-center">
                                                <a href="{{ $landing->social_instagram }}" target="_blank"><img src="{{ asset('images/instagram-color.png') }}" alt="" srcset=""></a>
                                            </div>
                                        @endif

                                        @if ($landing->social_youtube)
                                            <div class="col text-center">
                                                <a href="{{ $landing->social_youtube }}" target="_blank"><img src="{{ asset('images/youtube-color.png') }}" alt="" srcset=""></a>
                                            </div>
                                        @endif

                                        @if ($landing->social_linkedin)
                                            <div class="col text-center">
                                                <a href="{{ $landing->social_linkedin }}" target="_blank"><img src="{{ asset('images/linkedin-color.png') }}" alt="" srcset=""></a>
                                            </div>
                                        @endif

                                        @if ($landing->social_twitter)
                                            <div class="col text-center">
                                                <a href="{{ $landing->social_twitter }}" target="_blank"><img src="{{ asset('images/twitter-color.png') }}" alt="" srcset=""></a>
                                            </div>
                                        @endif

                                    </div>

                                </div>
                            @else

                            @endif

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit link</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formEdit" name="formEdit" method="POST">
                    <div class="modal-body">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="url">Link URL</label>
                                <input type="text" class="form-control" id="link" name="link">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>

@endsection

@extends('components.sidebar')
@extends('components.user')
