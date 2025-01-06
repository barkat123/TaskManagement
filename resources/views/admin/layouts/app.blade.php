<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- For Font Awesome Icons -->
</head>

<body class="bg-gray-100">

    <div class="flex h-screen">

        @include('admin.layouts.sidebar')
        <!-- Main Content -->
        @yield('content')
    </div>

</body>

</html>
