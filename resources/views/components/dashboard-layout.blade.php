@props([
    'webTitle' => '',
])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $webTitle }} | SiAsdosPadu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
          rel="stylesheet">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body class="font-jakarta-sans">
    @include('sweetalert::alert')
<x-dashboard-navbar/>
<section class="sm:flex pt-12">
    <x-side-bar class="sm:non-fixed w-full sm:w-1/4 lg:w-1/5"/> <!-- Sidebar with responsive width -->
    <main class="flex-grow w-full h-full overflow-y-auto sm:w-3/4 lg:w-4/5 m-4 sm:m-10 px-4 sm:px-6">
        {{ $slot }}
    </main>
</section>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
</body>
</html>
