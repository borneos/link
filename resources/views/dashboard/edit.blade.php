@extends('layouts.admin')

@section('content')
    <div class="container my-3">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <a href="{{ url('generate') }}" class="btn btn-link my-3"> <li class="fas fa-chevron-circle-left"> </li> &nbsp; Back</a>

        <h2>Edit Posts</h2>

        {{-- {{dd($post->prefix)}} --}}
        <form action="{{ route('generate.update', $post->id) }}" method="POST">

            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="prefix">Prefix</label>
              <input type="text" class="form-control" id="prefix" name="prefix" aria-describedby="prefixHelp" value="{{ $post->prefix }}" readonly>
            </div>

            <div class="form-group">
              <label for="value">Value</label>
              <textarea name="value" id="value" cols="30" rows="10" class="form-control"> {{ $post->value }} </textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
@endsection

@extends('components.sidebar')
@extends('components.user')
