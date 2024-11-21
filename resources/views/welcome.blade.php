@extends('layouts.app')

@section('content')
<div class="my-8">
    <h1 class="text-center text-3xl font-semibold mb-6">مرحباً بكم في متجرنا الإلكتروني</h1>

    <!-- Category Navigation -->
    <div class="mb-8">
        <h2 class="text-2xl font-semibold mb-4 text-center">الفئات</h2>
        <div class="flex justify-center space-x-6">
            @foreach($categories as $category)
                <div class="bg-gray-200 rounded-lg p-4 text-center">
                    <a href="{{ route('category.show', $category->id) }}" class="text-xl text-blue-600">
                        {{ $category->name_ar }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Product List -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($products as $product)
            <div class="border rounded-lg p-4 shadow-md">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name_ar }}" class="w-full h-48 object-cover rounded-t-lg">
                <h3 class="text-xl font-bold text-center mt-4">{{ $product->name_ar }}</h3>
                <p class="text-sm text-center mt-2">{{ $product->description_ar }}</p>
                <div class="text-center mt-4">
                    <p class="text-xl text-green-600">{{ number_format($product->price, 2) }} ج.م</p>
                    <a href="{{ route('product.show', $product->id) }}" class="mt-4 block text-center text-white bg-blue-600 py-2 px-4 rounded-lg hover:bg-blue-700">
                        عرض التفاصيل
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
