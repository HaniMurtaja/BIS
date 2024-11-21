<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>متجر إلكتروني</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body>
    <div class="container mx-auto">
        <!-- Navigation -->
        <nav class="bg-gray-800 p-4">
            <ul class="flex justify-center space-x-4">
                <li><a href="/" class="text-white">الرئيسية</a></li>
                <li><a href="/categories" class="text-white">الفئات</a></li>
                <li><a href="/cart" class="text-white">السلة</a></li>
                <li><a href="/orders" class="text-white">الطلبات</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white text-center py-4 mt-8">
            <p>&copy; 2024 متجر إلكتروني | جميع الحقوق محفوظة</p>
        </footer>
    </div>
</body>
</html>
