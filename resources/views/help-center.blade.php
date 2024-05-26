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
                    <button class="faq-question">What is your return policy?</button>
                    <div class="faq-answer">
                        <p>Our return policy allows returns within 30 days of purchase.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">What is your return policy?</button>
                    <div class="faq-answer">
                        <p>Our return policy allows returns within 30 days of purchase.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">What is your return policy?</button>
                    <div class="faq-answer">
                        <p>Our return policy allows returns within 30 days of purchase.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">What is your return policy?</button>
                    <div class="faq-answer">
                        <p>Our return policy allows returns within 30 days of purchase.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">What is your return policy?</button>
                    <div class="faq-answer">
                        <p>Our return policy allows returns within 30 days of purchase.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">What is your return policy?</button>
                    <div class="faq-answer">
                        <p>Our return policy allows returns within 30 days of purchase.</p>
                    </div>
                </div>
                
            </section>

            <section id="docs" class="docs-section">
                <h2>Documentation</h2>
                <!-- Add your documentation content here -->
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
