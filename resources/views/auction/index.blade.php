@extends('layouts.auction-app')
@section('content')

    <div class="container mt-5">
        <div class="card p-4 shadow-lg border-0" style="border-radius: 15px;">
            {!! html()->form('POST', route('auction.save'))->id('numberForm')->open() !!}
            <div class="d-flex align-items-center">
                {!! html()->label('Enter Donation Amount:', 'number')->class('form-label fw-bold me-3 text-primary') !!}
                {!! html()->number('number')->class('form-control me-3 border-primary shadow-sm')->required()->style('width: 150px;') !!}
                <button type="submit" class="btn btn-primary btn-lg px-4 shadow">Save</button>
            </div>
            {!! html()->form()->close() !!}
        </div>

        <div class="total-donations text-center text-primary fw-bold">Total Donations</div>

        <div class="position-relative text-center" style="height: 409px;">
            <!-- Background Image -->
            <img class="w-100" src="https://www.emwcf.org/image/w2000-h800-c20:8/files/100%20(32)%20(1)-1.JPG" alt="emw 1"
                 style="position: absolute; top: 0; left: 0; z-index: 1; height: 100%; object-fit: cover;">

            <div class="donation-total-container text-primary fw-bold text-center d-flex justify-content-center align-items-center">
                $ <span id="total-donations">{{ number_format($total) }}</span>
            </div>
        </div>

        {{--<div class="position-relative text-center" style="height: 768px;">
            <!-- Background Image -->
            <img class="w-100" src="https://www.emwcf.org/image/w1500/files/100%20(12).JPG" alt="emw 1"
                 style="position: absolute; top: 0; left: 0; z-index: 1; height: 100%; object-fit: cover;">

            <!-- Donation Total (On Top of Image) -->
            <div class="donation-total-container text-primary fw-bold text-center d-flex justify-content-center align-items-center">
                $ <span id="total-donations">{{ number_format($total) }}</span>
            </div>
        </div>--}}

    </div>

    @include('auction.index-modal')
@endsection

@push('styles')
    <style>

        /* Card Styling */
        .card {
            transition: all 0.3s ease;
        }

        .total-donations {
            font-size: 4rem;
            text-shadow: 2px 2px 5px rgba(0, 123, 255, 0.3);
        }

        /* Typography Styling */
        .donation-total-container {
            font-size: 6rem;
            color: #007bff;
            text-shadow: 2px 2px 5px rgba(0, 123, 255, 0.3);
            z-index: 2;
            position: relative;
            height: 100%;
            background: rgba(255, 255, 255, 0.7);
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }


        /* Button Hover Effects */
        .btn-primary {
            transition: background-color 0.3s ease, transform 0.3s ease;
            background-image: linear-gradient(135deg, #007bff, #0056b3);
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

    </style>
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#numberForm').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route("auction.save") }}',
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    $('#total-donations').text(response.total);
                    $('#modalNumber').text('$' + response.bid);
                    $('#modalThankYou').text(response.thankyou);
                    let bidModal = new bootstrap.Modal(document.getElementById('bidModal'));
                    bidModal.show();
                    $('#number').val('');
                }
            });
        });
    </script>

@endpush
