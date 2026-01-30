@extends('layouts.app')

@section('content')
    <div class="position-relative rounded-4 overflow-hidden mb-5" style="min-height: 300px;">
        <div class="position-absolute top-0 start-0 w-100 h-100"
            style="background: linear-gradient(rgba(15, 23, 42, 0.6), rgba(15, 23, 42, 0.6)), url('https://58cdae7e3f.clvaw-cdnwnd.com/35f44a9baa5cac01861e284961d5f5cb/200000025-6080060803/DSC_1680.webp?ph=58cdae7e3f'); background-size: cover; background-position: center;">
        </div>
        <div class="position-relative d-flex flex-column justify-content-center align-items-center text-center py-5 px-3"
            style="min-height: 300px;">
            <h1 class="display-4 fw-bold text-white mb-3 shadow-lg">{{ __('messages.menu') }}</h1>
            <p class="lead text-white fw-medium shadow-lg">{{ __('Freshly prepared gourmet sandwiches and treats.') }}</p>
        </div>
    </div>

    @foreach($productsByCategory as $category => $products)
        <div class="mb-5">
            <div class="d-flex align-items-center mb-4">
                <h2 class="h3 text-warning mb-0">{{ $category }}</h2>
                <div class="flex-grow-1 ms-3 border-bottom border-secondary opacity-25"></div>
            </div>

            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
                @foreach($products as $product)
                    <div class="col">
                        <div class="card h-100 bg-dark border-secondary shadow-sm">
                            <div class="position-relative overflow-hidden rounded-top" style="height: 200px;">
                                <img src="{{ (strpos($product->image_path, 'http') === 0) ? $product->image_path : asset($product->image_path) }}"
                                    class="card-img-top h-100 w-100 object-fit-cover" alt="{{ $product->name }}">
                                <div class="position-absolute bottom-0 end-0 p-2">
                                    <span class="badge bg-warning text-dark fs-6 shadow-sm">
                                        {{ number_format($product->price, 2, ',', ' ') }}€
                                    </span>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column p-4">
                                <h5 class="card-title fw-bold mb-2">{{ $product->name }}</h5>
                                <p class="card-text text-secondary small flex-grow-1 mb-3">
                                    {{ $product->description }}
                                </p>
                                <div class="mt-auto">
                                    <a href="{{ route('cart.add', $product->id) }}" class="btn btn-warning w-100 fw-bold">
                                        Add to Cart
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach

@endsection