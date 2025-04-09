<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container">
        <div class="row">
            <nav>
                <ul>
                    <li><a href="{{route('main.index')}}">Home</a></li>
                    <li><a href="{{route('post.index')}}">Posts</a></li>
                    <li><a href="{{route('about.index')}}">About</a></li>
                    <li><a href="{{route('contact.index')}}">Contacts</a></li>
                    @can('view', auth()->user())
                    <li><a href="{{route('admin.post.index')}}">Admin</a></li>
                    @endcan
                </ul>
            </nav>
        </div>
        @yield('content')
    </div>
</body>
</html>