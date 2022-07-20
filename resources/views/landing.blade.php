<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @foreach ($landings as $landing)
        <title>{{ $landing->title }}</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.svg') }}">
    @endforeach

    {{-- Font and Bootstrap --}}
    {{-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700&display=swap" rel="stylesheet"> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/landing_style.css') }}">

</head>
<body>


    <div class="container">
        <div class="main-content py-5">
            @foreach ($landings as $landing)

            <div class="image">
                <img src="{{ $landing->image == '' ? asset('images/undraw_profile_1.svg') : $landing->image }}" class="img-profile" width="100" height="100" class="img-profile" alt="">
            </div>

                <div class="title-desc">
                    <h3>{{ $landing->title }}</h3>
                    <p>{{ $landing->description }}</p>
                </div>

                <div class="d-flex flex-column item-preview">
                    @if ($links == null)

                    @else
                        @foreach ($links as $link)

                        {{-- <a href="{{ $link->link }}" class="btn btn-lg btn-links my-2 mx-auto" target="_blank">{{ $link->name }}</a> --}}
                        <form action="{{ route('show-link') }}">
                            @csrf

                            <input type="hidden" name="id" value="{{ $link->id }}">
                            <button type="submit" class="btn btn-lg btn-links my-2 mx-auto" formtarget='_blank'>{{ $link->name }}</button>

                        </form>

                            {{-- {{ Links::increment('visited', 1, ['id' => $link->link]) }} --}}

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

            @endforeach
        </div>

        <div class="copyright">
              <a href="/"> Powered by borneos.co </a>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
