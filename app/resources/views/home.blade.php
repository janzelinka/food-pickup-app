@extends('layouts.app')

@section('content')
    @if(auth()->check() && count($todayPickups) > 0)
        <div class="row mb-4">
            <div class="col-12">
                <div class="alert alert-warning border-0 shadow-lg text-center py-4 rounded-4" role="alert">
                    <div class="d-flex align-items-center justify-content-center">
                        <span class="fs-1 me-3">🍱</span>
                        <div class="text-start">
                            <h4 class="alert-heading fw-bold mb-1">Objednávka na dnes! / Order Today!</h4>
                            <p class="mb-0 fs-5">
                                @if(count($todayPickups) == 1)
                                    Máte naplánovaný odber na dnes o <strong>{{ \Carbon\Carbon::parse($todayPickups[0]->pickup_time)->format('H:i') }}</strong>.
                                @else
                                    Máte naplánovaných <strong>{{ count($todayPickups) }}</strong> odberov na dnes.
                                @endif
                                Tešíme sa na vás!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Hero Section -->
    <div class="position-relative rounded-4 overflow-hidden mb-5" style="min-height: 400px;">
        <div class="position-absolute top-0 start-0 w-100 h-100"
            style="background: linear-gradient(rgba(15, 23, 42, 0.8), rgba(15, 23, 42, 0.8)), url('{{ asset('images/Misa1.webp') }}'); background-size: cover; background-position: center;">
        </div>
        <div class="position-relative d-flex flex-column justify-content-center align-items-center text-center py-5 px-3"
            style="min-height: 400px;">
            <h1 class="display-4 fw-bold text-white mb-3">{{ __('messages.hero_title') }}</h1>
            <p class="lead text-light mb-4">{{ __('messages.hero_subtitle') }}</p>
            <a href="{{ route('products.index') }}" class="btn btn-warning btn-lg px-5">{{ __('messages.browse_menu') }}</a>
        </div>
    </div>

    <!-- Product Carousel Section -->
    <div class="mb-5 position-relative">
        <h2 class="text-center text-warning mb-4">{{ __('Our Favorites') }}</h2>

        <div class="carousel-container position-relative px-5">
            <!-- Navigation Arrows -->
            <button class="carousel-btn prev-btn bg-dark border-secondary text-warning" id="prevBtn">
                &#10094;
            </button>
            <button class="carousel-btn next-btn bg-dark border-secondary text-warning" id="nextBtn">
                &#10095;
            </button>

            <div class="product-marquee py-3" id="marquee">
                <div class="product-track" id="track">
                    {{-- Duplicate list for infinite effect --}}
                    @foreach($products->concat($products)->concat($products) as $product)
                        <div class="product-card">
                            <div class="card bg-dark border-secondary h-100 shadow-sm">
                                <img src="{{ (strpos($product->image_path, 'http') === 0) ? $product->image_path : asset($product->image_path) }}"
                                    class="card-img-top" alt="{{ $product->name }}" style="height: 140px; object-fit: cover;">
                                <div class="card-body p-3 d-flex flex-column">
                                    <h6 class="card-title fw-bold text-white mb-1 text-truncate">{{ $product->name }}</h6>
                                    <p class="small text-secondary mb-2 text-truncate">{{ $product->category }}</p>
                                    <div class="mt-auto d-flex justify-content-between align-items-center">
                                        <span
                                            class="text-warning fw-bold small">{{ number_format($product->price, 2, ',', ' ') }}€</span>
                                        <a href="{{ route('cart.add', $product->id) }}"
                                            class="btn btn-warning btn-sm px-3 py-1">Add</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-8">
            <h2 class="text-center text-warning mb-4">{{ __('messages.about_chef') }}</h2>
            <div class="card bg-dark border-secondary border-0 shadow-lg">
                <div class="card-body d-flex flex-column flex-md-row align-items-center gap-4 p-4">
                    <img src="https://images.unsplash.com/photo-1583394293214-28ded15ee548?auto=format&fit=crop&w=300&q=80"
                        alt="Chef" class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                    <div>
                        <p class="fs-5 mb-3">
                            Hi, I'm Jan! I've been cooking passionately for over 10 years. My mission is to bring
                            high-quality,
                            home-cooked meals to our community using locally sourced ingredients.
                        </p>
                        <p class="text-secondary mb-0">
                            Everything is prepared fresh daily. Simply browse the menu, place your order, and pick it up at
                            a time
                            that works for you!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .carousel-container {
            width: 100%;
            display: flex;
            align-items: center;
        }

        .product-marquee {
            width: 100%;
            overflow: hidden;
            mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
            -webkit-mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
        }

        .product-track {
            display: flex;
            width: max-content;
            animation: scroll 120s linear infinite;
            /* Slower animation (120s instead of 60s) */
        }

        .product-track:hover {
            animation-play-state: paused;
        }

        .product-card {
            width: 260px;
            padding: 0 10px;
            flex-shrink: 0;
        }

        /* Arrows Styling */
        .carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 45px;
            height: 45px;
            border-radius: 50%;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            opacity: 0.8;
        }

        .carousel-btn:hover {
            opacity: 1;
            background-color: #f97316 !important;
            color: black !important;
            border-color: #f97316 !important;
        }

        .prev-btn {
            left: 0;
        }

        .next-btn {
            right: 0;
        }

        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-33.33%);
            }

            /* Adjusted for 3x duplication */
        }

        @media (max-width: 768px) {
            .product-track {
                animation-duration: 60s;
            }

            .carousel-btn {
                width: 35px;
                height: 35px;
                font-size: 16px;
            }

            .carousel-container {
                padding: 0 40px;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const track = document.getElementById('track');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const cardWidth = 260; // card + padding

            let currentTranslate = 0;

            function moveTrack(direction) {
                // To allow manual movement, we first pause the animation
                // Actually, a better way is to toggle a class that stops animation
                // and then manually manipulate transform.

                track.style.animation = 'none';

                // Get current computed style
                const style = window.getComputedStyle(track);
                const matrix = new WebKitCSSMatrix(style.transform);
                currentTranslate = matrix.m41;

                const step = cardWidth * 2; // move by 2 cards
                const newTranslate = currentTranslate + (direction * step);

                track.style.transition = 'transform 0.5s ease-out';
                track.style.transform = `translateX(${newTranslate}px)`;

                // Restart animation after a delay, or just leave it paused if user is interacting
                clearTimeout(track.resumeTimeout);
                track.resumeTimeout = setTimeout(() => {
                    track.style.transition = 'none';
                    track.style.animation = 'scroll 120s linear infinite';
                    // We need to account for the jump, but for simplicity we just restart
                }, 5000);
            }

            prevBtn.addEventListener('click', () => moveTrack(1));
            nextBtn.addEventListener('click', () => moveTrack(-1));
        });
    </script>
@endsection