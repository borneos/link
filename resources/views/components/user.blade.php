@section('user')

@php
    use App\Landing;
    use App\Post;
    $data = Landing::select('landings.*', 'posts.*')->join('posts', 'landings.post_id', '=',  'posts.id')->where('posts.user_id', Auth::user()->id)->get();
@endphp


<li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small"> {{ Auth::user()->name }} </span>
        @foreach ($data as $item)
            <img class="img-profile rounded-circle"
                src="{{ ($item->image == '') ? asset('images/undraw_profile_1.svg') : $item->image }}" style="object-fit: cover">
        @endforeach
    </a>
    <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="userDropdown">
        <a class="dropdown-item" href="{{ route('profile.index') }}">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profile
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</li>
@endsection
