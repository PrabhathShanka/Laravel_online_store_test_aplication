<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>

    @include('libraries.styles')
    {{--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">  --}}


    <!-- Yield for page-specific styles -->
    @yield('styles')
</head>

<body>
    <div class="container">
        {{--  @include('components.nav')  --}}
        @yield('content')
        {{--  @include('components.footer')  --}}
        @include('libraries.scripts')
    </div>
</body>

</html>
