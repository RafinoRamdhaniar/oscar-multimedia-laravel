    <style>
        .jasa-komputer-wrapper {
            position: relative;
            overflow: hidden;
            margin: 0 auto;
            border-radius: 12px;
        }

        .jasa-komputer-wrapper:hover .jasa-komputer-image {
            transform: scale(1.05);
        }

        .jasa-komputer-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            opacity: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 1s ease;
        }

        .jasa-komputer-wrapper:hover .jasa-komputer-overlay {
            opacity: 1;
        }
    </style>
<section id="jasa-komputer" class="pt-5" style="margin-bottom: 5px;">
    <h2 class="text-center section-title mb-4">JASA KOMPUTER</h2>

    <div class="jasa-komputer-wrapper">
            <img src="{{ asset('jasa komputer.png') }}"
                 alt="Jasa Komputer"
                 class="jasa-komputer-image img-fluid">

            <div class="jasa-komputer-overlay">
                <a href="https://wa.me/628112890087?text=Halo%2C%20saya%20ingin%20menggunakan%20layanan%20jasa%20komputer"
                   target="_blank"
                   class="btn px-4 py-2 rounded-pill fw-semibold"
                   style= "background-color: #e8b535; color: #fff;">
                    Beli via WhatsApp
                </a>
            </div>
        </div>
</section>
