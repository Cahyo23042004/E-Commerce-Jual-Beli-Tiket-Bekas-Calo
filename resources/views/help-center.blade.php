<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/help-center.css') }}">
    </head>
    <body>
        <div class="help-center">
            <div class="container">
                <div class="header">
                    <h1>Help Center</h1>
                    <p>How can we assist you today?</p>
                </div>

                <div class="feature-boxes">
                    <div class="feature-box">
                        <i class='bx bxs-phone-call'></i>
                        <h2>Contact Us</h2>
                        <p>Get in touch with our support team directly via WhatsApp.</p>
                        <a href="https://wa.me/6285161236525" target="_blank" class="btn">Chat on WhatsApp</a>
                    </div>
                    <div class="feature-box">
                        <i class='bx bxs-help-circle'></i>
                        <h2>FAQs</h2>
                        <p>Find answers to the most frequently asked questions.</p>
                        <button class="btn show-faqs">View FAQs</button>
                    </div>
                    <div class="feature-box">
                        <i class='bx bxs-file'></i>
                        <h2>Documentation</h2>
                        <p>Access our detailed documentation and user guides.</p>
                        <button class="btn show-docs">Read Documentation</button>
                    </div>
                </div>
            </div>

            <section id="faqs" class="faqs-section">
                <h2>Frequently Asked Questions</h2>
                <div class="faq-item">
                    <button class="faq-question">Q: Bagaimana cara mengontak penjual?</button>
                    <div class="faq-answer">
                        <p>A: Kamu dapat menghubungi penjual setelah melakukan checkout tiket. Tenang saja, metode pembayaran yang berlaku di Calo hanya COD jadi sekali pun kamu sudah checkout tiket, saldo kamu tidak berkurang!
</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">Q: Bagaimana cara bertanya ke help center Calo?</button>
                    <div class="faq-answer">
                        <p>A: Silakan pilih section “Help Center” di navigation bar dan pilih menu “Contact Us”. Kamu akan terhubung dengan admin Calo melalui WhatsApp.
</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">Q: Apakah di Calo ada diskon?</button>
                    <div class="faq-answer">
                        <p>A: Untuk saat ini tidak ada karena kami adalah perusahaan start up sehingga kami masih harus balik modal. Mohon pengertiannya.
</p>
                    </div>
                </div>
                
            </section>

            <section id="docs" class="docs-section">
                <h2>Documentation</h2>
                [Getting Started]
Welcome to Calo, the premier destination for buying tickets online. Whether you're looking to attend a concert, sporting event, theater performance, or any other event, our platform makes it easy and convenient.

[Support]
For further assistance, please contact our support team:
Phone: 0812-8332-1577

            </section>
        </div>

        
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const faqItems = document.querySelectorAll('.faq-item');
            const showFaqsButton = document.querySelector('.show-faqs');
            const showDocsButton = document.querySelector('.show-docs');
            const faqsSection = document.getElementById('faqs');
            const docsSection = document.getElementById('docs');

            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question');
                question.addEventListener('click', () => {
                    item.classList.toggle('active');
                });
            });

            showFaqsButton.addEventListener('click', () => {
                faqsSection.classList.toggle('active');
            });

            showDocsButton.addEventListener('click', () => {
                docsSection.classList.toggle('active');
            });
        });
        </script>
    </body>
</x-app-layout>
