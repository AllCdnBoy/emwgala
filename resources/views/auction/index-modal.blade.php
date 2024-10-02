<div class="modal fade" id="bidModal" tabindex="-1" aria-labelledby="bidModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content shadow-lg border-0 p-4 text-center">
            <div class="modal-body fs-2">
                <div class="bg-primary text-white modal-title fw-bold p-3" id="bidModalLabel">🎉 New Donation Received! 🎉</div>

                <h3 id="modalNumber" class="display-3 text-success fw-bold">$10,000</h3>
                <p class="text-primary" id="modalThankYou">Your donation means the world to us - thank you</p>
                <!-- Star animations -->
                <div class="stars">
                    <div class="star" style="top: 20%; left: 10%;"></div>
                    <div class="star" style="top: 30%; left: 80%;"></div>
                    <div class="star" style="top: 50%; left: 30%;"></div>
                    <div class="star" style="top: 70%; left: 70%;"></div>
                    <div class="star" style="top: 90%; left: 20%;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .modal-content {
        background: linear-gradient(145deg, #ffffff, #f1f1f1);
        border-radius: 20px;
        padding: 2rem;
    }

    .modal-body {
        position: relative;
    }

    .modal-body h3 {
        font-size: 8rem;
        color: #28a745;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2); /* Glow effect for the donation amount */
    }

    .modal-body p {
        font-size: 2.25rem;
        font-weight: bold;
        margin-top: 1.5rem;
    }

    /* Star Animations */
    .stars {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 0;
    }

    .star {
        position: absolute;
        width: 20px;
        height: 20px;
        background-color: #ff8b07;
        border-radius: 50%;
        box-shadow: 0 0 10px rgba(255, 119, 7, 0.93);
        animation: twinkle 2s infinite ease-in-out;
    }

    .star:nth-child(1) { animation-delay: 0.2s; }
    .star:nth-child(2) { animation-delay: 0.4s; }
    .star:nth-child(3) { animation-delay: 0.6s; }
    .star:nth-child(4) { animation-delay: 0.8s; }
    .star:nth-child(5) { animation-delay: 1s; }

    @keyframes twinkle {
        0%, 100% {
            opacity: 0;
            transform: scale(0.5);
        }
        50% {
            opacity: 1;
            transform: scale(1.2);
        }
    }
</style>
@endpush

