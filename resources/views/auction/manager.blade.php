@extends('layouts.auction-app')
@section('content')

    <div class="container mt-5">


        <h2 class="mt-5 text-primary fw-bold" style="text-shadow: 2px 2px 5px rgba(0, 123, 255, 0.5);">Donations - $ <span id="total-donations">{{ number_format($total) }}</span>
        </h2>

        <table class="table table-bordered table-striped table-hover mt-3 shadow" @style(["border-radius: 10px; overflow: hidden;"])>
            <thead class="table-dark">
            <tr>
                <th>Amount</th>
                <th>Time</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($numbers as $number)
                <tr>
                    <td>$ {{ number_format($number->bid) }}</td>
                    <td>{{ $number->created_at->format('h:i') }}</td>
                    <td><a href="{{ route('auction.delete',$number->id) }}">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

@push('styles')
    <style>
        /* Table Styling */
        table {
            background-color: #ffffff;
            transition: box-shadow 0.3s ease;
        }


        th, td {
            text-align: center;
            font-size: 1.2rem;
        }

        th {
            background-color: #343a40;
            color: white;
        }

        td {
            font-weight: bold;
            color: #007bff;
        }


        /* Typography Styling */
        h2 {
            font-size: 2.5rem;
            color: #007bff;
            text-shadow: 2px 2px 5px rgba(0, 123, 255, 0.3);
        }


        /* Global Page Styling */
        body {
            background: linear-gradient(135deg, #f8f9fa, #e0e7ff); /* Soft gradient background */
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

                    let rows = '';
                    response.numbers.forEach(function (number) {
                        rows += '<tr><td>$ ' + number.formatted_bid + '</td></tr>';
                    });
                    $('#numbersTable tbody').html(rows);

                    $('#modalNumber').text('$' + response.bid);
                    $('#modalThankYou').text(response.thankyou);
                    let bidModal = new bootstrap.Modal(document.getElementById('bidModal'));
                    bidModal.show();

                    // Automatically hide the modal after 5 seconds
                    setTimeout(function () {
                        bidModal.hide('slow');
                    }, 10000);


                    $('#number').val('');
                }
            });
        });
    </script>

@endpush
