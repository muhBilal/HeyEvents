@extends('layouts.auth')

@section('title', 'Daftar')
    
@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<main class="flex justify-start flex-col md:flex-row">
    <!-- Right Section -->
    <section class="w-1/2 min-h-full bg-prime py-10  flex-col items-center justify-center hidden md:flex">

        <!-- Card -->
        <div class="card border-none mt-5">
            <!-- Logo -->
            <div class="bg-white w-max p-3 absolute  -left-6 -top-6 shadow-md">
                <img src="{{asset('img/logo.svg')}}">
            </div>
            <!-- End Logo-->
             <!-- Author -->
             <div class="bg-white w-max py-4 px-6 absolute  -right-6 -top-8 shadow-md text-center">
                <img src="{{asset('storage/' . $event->user->photo)}}" class="mx-auto" width="53" height="53">
                <p class="text-prime font-bold mt-3">{{Str::limit($event->user->name, 10, $end='...') }}</p>
                <p class="text-grey">{{Str::limit($event->user->bio, 10, $end='...') }}</p>
            </div>
            <!-- End Author-->
            <div class="mb-5">
                <img src="{{asset('storage/' . $event->photo)}}" class="w-full">
            </div>
            <div class="mb-5 w-full">
                <h4 class="text-prime font-bold text-xl w-full mb-2">{{Str::limit($event->name, 31, $end='...') }}</h4>
                <div class="text-grey max-w-full break-words whitespace-pre-wrap card-text">{{strip_tags(Str::limit($event->description, 70, $end='...')) }}</div>
            </div>
            <div class="grid grid-cols-2 gap-y-5 mb-5">
                <div class="flex items-center">
                    <img src="{{asset('img/ic_location.svg')}}">
                    <p class="text-grey ml-3">{{$event->category->name}}</p>
                </div>
                <div class="flex items-center">
                    <img src="{{asset('img/ic_people.svg')}}">
                    <p class="text-grey ml-3">{{$event->quota}} Peserta</p>
                </div>
                <div class="flex items-center">
                    <img src="{{asset('img/ic_calendar.svg')}}">
                    <p class="text-grey ml-3">{{ \Carbon\Carbon::parse($event->date)->isoFormat('D MMMM Y')}}</p>
                </div>
                <div class="flex items-center">
                    <img src="{{asset('img/ic_ticket.svg')}}">
                    <p class="text-prime font-semibold ml-3">{{$event->status->name}}</p>
                </div>
            </div>
           <div>
                <div class="flex items-center">
                    <img src="{{asset('storage/' . $event->user->photo)}}" width="53" height="53">
                    <div class="ml-5">
                        <p class="text-prime font-bold">{{$event->user->name}}</p>
                        <p class="text-grey">{{$event->user->bio ? $event->user->bio : 'Bio belum di set'}}</p>
                    </div>
                </div>
            </div>
            <a href="{{route('event.show', $event->slug)}}" class="btn-event absolute right-0 bottom-0 py-4 group overflow-hidden">
                <svg class="group-active:relative group-active:-right-4 transform group-hover:scale-125  transition duration-100 ease-in-out"
                    width="32" height="32" viewBox="0 0 32 32" fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.33337 15.6343C5.33337 15.128 5.70958 14.7096 6.19768 14.6434L6.33337 14.6343L23.912 14.6351L17.5614 8.31036C17.17 7.92068 17.1687 7.28752 17.5583 6.89615C17.9126 6.54037 18.4681 6.5069 18.8602 6.79652L18.9726 6.89311L27.0392 14.9251C27.0908 14.9765 27.1356 15.0321 27.1736 15.0908C27.1844 15.1084 27.1953 15.1265 27.2057 15.145C27.2152 15.1608 27.2238 15.1772 27.232 15.1938C27.2433 15.2179 27.2543 15.2429 27.2643 15.2683C27.2724 15.288 27.2792 15.307 27.2854 15.3263C27.2928 15.3501 27.3 15.3756 27.3061 15.4014C27.3107 15.4194 27.3143 15.4367 27.3175 15.4542C27.3219 15.4801 27.3257 15.5069 27.3284 15.534C27.3307 15.5547 27.3321 15.5752 27.3329 15.5957C27.3331 15.6082 27.3334 15.6212 27.3334 15.6343L27.3329 15.673C27.3321 15.6926 27.3308 15.7122 27.3288 15.7318L27.3334 15.6343C27.3334 15.6974 27.3275 15.7591 27.3164 15.819C27.3138 15.8333 27.3107 15.8479 27.3072 15.8626C27.3001 15.8927 27.2919 15.9217 27.2825 15.9501C27.2778 15.9642 27.2724 15.9793 27.2667 15.9943C27.255 16.0243 27.2423 16.053 27.2283 16.081C27.2218 16.0941 27.2145 16.1079 27.2069 16.1215C27.1944 16.1437 27.1816 16.1648 27.1679 16.1854C27.1583 16.1999 27.1477 16.2151 27.1366 16.23L27.1279 16.2415C27.101 16.2767 27.0718 16.3101 27.0405 16.3414L27.0393 16.3423L18.9726 24.3756C18.5813 24.7654 17.9481 24.764 17.5584 24.3727C17.2041 24.017 17.173 23.4613 17.4643 23.0705L17.5613 22.9585L23.9094 16.6351L6.33337 16.6343C5.78109 16.6343 5.33337 16.1866 5.33337 15.6343Z"
                        fill="white" />
                </svg>
            </a>
        </div>
        <!-- End Card -->
    </section>
    <!--End Right Section -->

    <!-- Left Section -->
    <section class="md:py-10 md:pl-20 py-10 px-5">
        <a href="{{route('home')}}" class="flex">
            <img src="./img/logo.svg" class="mr-3">
            <p href="#" class="font-bold text-prime text-2xl">HeyEvents!</p>
        </a>

        <div class="mt-16">
            <h3 class="text-prime font-bold text-xl">Daftar Akun</h3>
            <p class="text-grey mt-2">Jadilah bagian dari komunitas HeyEvents!</p>
        </div>
        <form action="{{route('register')}}" method="POST" class="mt-10">
            @csrf
            <div class="flex flex-col mb-3">
                <label for="name">Nama</label>
                @error('name')
                <span class="text-red-600 italic text-xs">{{$message}}</span>
                @enderror
                <input value="{{old('name')}}" type="text" name="name" id="name" class="form-control mt-2" placeholder="e.g Taisei Marukawa">
            </div>
            <div class="flex flex-col mb-3">
                <label for="email">Email</label>
                @error('email')
                <span class="text-red-600 italic text-xs">{{$message}}</span>
                @enderror
                <input value="{{old('email')}}" type="text" name="email" id="email" class="form-control mt-2" placeholder="e.g marukawa_san@gmail.com">
            </div>
            <div class="flex flex-col mb-3">
                <label for="password">Password</label>
                @error('password')
                <span class="text-red-600 italic text-xs">{{$message}}</span>
                @enderror
                <input type="password" name="password" id="password"
                    class="form-control mt-2" placeholder="kata sandi akun">
            </div>
            <div class="flex flex-col mb-3">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="form-control mt-2" placeholder="konfirmasi kata sandi akun">
            </div>

            <div class="mt-5">
                <button type="submit" class="btn-primary w-full">Daftar</button>
                <a href="{{ '/auth/redirect'}}" class="btn-outline-primary w-full mt-3">
                    <img src="{{asset('img/ic_google.svg')}}" class="mr-3">
                    <span>Daftar dengan Google</span>
                </a>
            </div>
        </form>

        <p class="text-center text-grey mt-5">Sudah punya akun? <a href="{{route('login')}}" class="font-semibold text-prime">Masuk</a></p>
    </section>
    <!--End Left Section -->

</main>
@endsection
