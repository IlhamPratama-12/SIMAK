<footer class="footer-custom">
    <div class="container my-auto d-flex flex-column flex-md-row justify-content-between align-items-center">
        <!-- Left: Copyright -->
        <div class="copyright text-center text-md-start mb-2 mb-md-0">
            <span>© {{ date('Y') }} <strong>Yayasan Faisal</strong>. All Rights Reserved.</span>
        </div>

        <!-- Center: Navigation / Links -->
        <div class="footer-links text-center mb-2 mb-md-0">
            <a href="{{ url('/privacy') }}">Privacy Policy</a>
            <span class="mx-2">|</span>
            <a href="{{ url('/terms') }}">Terms of Service</a>
        </div>

        <!-- Right: Social Media -->
        <div class="footer-social text-center text-md-end">
            <a href="#" class="me-2"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="me-2"><i class="fab fa-twitter"></i></a>
            <a href="#" class="me-2"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
    </div>
</footer>

<style>
    .footer-custom {
        background: linear-gradient(90deg, #4e73df, #224abe);
        color: #fff;
        padding: 15px 0;
        box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
        font-size: 0.9rem;
        margin-top: auto;
    }

    .footer-custom a {
        color: #fff;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .footer-custom a:hover {
        color: #ffd966; /* warna emas saat hover */
    }

    .footer-social a {
        font-size: 1rem;
        display: inline-block;
        transition: transform 0.3s ease;
    }

    .footer-social a:hover {
        transform: scale(1.2);
    }
</style>
