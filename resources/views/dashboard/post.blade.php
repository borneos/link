 @extends('layouts.admin')

@section('content')
<!-- Button trigger modal -->
<div class="container">

    @if ($errors->any())
        <div class="alert alert-danger px-5">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#exampleModal">
                Tambah Shortlink
                </button>

            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="table">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Prefix</th>
                          <th>Values</th>
                          <th>Short URL</th>
                          <th>Visited</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>

                    {{-- @php
                        $no = 1;
                    @endphp
                    @foreach ($posts as $post)
                        <tr>
                            <td> {{ $no++ }} </td>
                            <td> {{ $post->prefix }} </td>
                            <td> {{ $post->value }} </td>
                            <td> {{ $post->visited }} </td>
                            <td>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">

                                    <a title="Edit" class="btn btn-success" href="{{ route('posts.edit',$post->id) }}" tooltip="Edit"> <i class="fas fa-pen"></i></a>

                                    @csrf
                                    @method('DELETE')

                                    <button title="Delete" type="submit" class="btn btn-danger" onclick="confirm('Are you sure???')"> <i class="fas fa-trash"></i> </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach --}}

                  </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Shortlink baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('generate.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="prefix">Prefix</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="prefix" id="prefix" aria-describedby="prefix" placeholder="Klik tombol generate" autocomplete="off" required>
                            <button type="button" class="btn btn-primary" id="generate" onclick="generatePrefix()">
                                Generate
                            </button>
                        </div>
                        <p class="notice"></p>
                    </div>
                    <div class="form-group">
                        <label for="values">Link URL</label>
                        <textarea class="form-control" name="value" id="value" cols="20" rows="10" placeholder="https://contohlink.com"></textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('components.sidebar')

@extends('components.user')
