@extends('layouts.app')

@section('content')
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="display-4 fw-bold text-warning mb-3">{{ __('messages.find_us') }}</h1>
        </div>
    </div>

    <!-- Opening Hours - Full Width Top -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card bg-dark border-secondary shadow-sm text-center">
                <div class="card-body p-4">
                    <h2 class="h3 text-warning mb-3">{{ __('messages.opening_hours') }}</h2>
                    <p class="fs-4 mb-0 fw-bold">{{ __('messages.hours_detail') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-5">
        <!-- Contact Information & Directions -->
        <div class="col-lg-6">
            <div class="mb-5">
                <h3 class="h4 text-warning mb-4">{{ __('messages.how_to_reach') }}</h3>
                <div class="card bg-dark border-0 h-100">
                    <div class="card-body p-4">
                        <p class="fs-5 lh-base mb-0">
                            {{ __('messages.reach_description') }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="mb-0">
                <h3 class="h4 text-warning mb-4">{{ __('messages.contact_info') }}</h3>
                <div class="card bg-dark border-0">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-2">PB CHLEBÍČKY</h4>
                        <p class="fs-5 mb-4 text-secondary">{{ __('messages.address') }}</p>

                        <div class="d-flex align-items-center mb-3">
                            <span class="fs-4 fw-bold text-white">+421 915 930 008</span>
                        </div>

                        <div class="mb-0">
                            <a href="mailto:objednavkypbchlebicky@gmail.com" class="text-warning fs-5 text-decoration-none">
                                objednavkypbchlebicky@gmail.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="col-lg-6">
            <h3 class="h4 text-warning mb-4">{{ __('messages.contact_us') }}</h3>
            <div class="card bg-dark border-0 shadow-lg">
                <div class="card-body p-4">
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="form-label fw-bold">{{ __('Name') }}</label>
                            <input type="text" class="form-control form-control-lg bg-dark border-secondary text-white"
                                name="name" id="name" required placeholder="Ján Novák">
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label fw-bold">{{ __('Email') }}</label>
                            <input type="email" class="form-control form-control-lg bg-dark border-secondary text-white"
                                name="email" id="email" required placeholder="jan@example.sk">
                        </div>

                        <div class="mb-4">
                            <label for="message" class="form-label fw-bold">{{ __('Message') }}</label>
                            <textarea class="form-control form-control-lg bg-dark border-secondary text-white"
                                name="message" id="message" rows="6" required placeholder="Vaša správa..."></textarea>
                        </div>

                        <button type="submit" class="btn btn-warning w-100 btn-lg fw-bold py-3 mt-2 rounded-3 shadow">
                            {{ __('Send Message') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Map - Full Width Bottom -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="rounded-4 overflow-hidden border border-secondary shadow-lg"
                style="height: 450px; background: #2d3238;">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2605.5463773173!2d18.42398531568779!3d49.12462317931441!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4714652495d85257%3A0xc3f8e58e378c3c86!2sHliny%201412%2C%20017%2007%20Pova%C5%BEsk%C3%A1%20Bystrica!5e0!3m2!1sen!2ssk!4v1700000000000!5m2!1sen!2ssk"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
@endsection