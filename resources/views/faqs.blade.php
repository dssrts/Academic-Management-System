<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/dist/app.css">
    <link rel="icon" type="image/png" href="{{url('/images/plm-logo.png')}}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Katibeh:wght@400;700&display=swap');
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
</head>
<body class="bg-white-10 font-inter">

<div class="container mx-auto py-8">
    <a href="{{ route('sign-in.get') }}">
        <img src="{{url('images/plm-logo.png')}}" alt="Logo" class="mx-auto mb-4 w-20 h-20 duration-150 hover:w-16 hover:h-16 hover:animate-[spin_0.2s_ease-in-out_infinite] animate-[pulse_0.25s_ease-in-out_infinite]" style="animation-iteration-count: 1">
    </a>
    <h1 class="font-semibold text-blue mb-6 text-center text-[24px]">Frequently Asked Questions</h1>

    <div class="accordion">
        <!-- FAQ Item 1 -->
            <div class="accordion-item  border-gray-200 mb-2">
            <div class="accordion-toggle   font-bold  cursor-pointer text-[17px] bg-gold-amber text-white-10 rounded-full pl-4 py-1 hover:opacity-80" id="faq1">How to Apply to PLM</div>
            <div class="accordion-content pl-4 py-1">
                <p class="py-2 text-[13px]">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
        </div></a>

        <!-- FAQ Item 2 -->
        <div class="accordion-item border-gray-200 mb-2">
            <div class="accordion-toggle   font-bold   cursor-pointer text-[17px] bg-gold-amber text-white-10 rounded-full pl-4 py-1 hover:opacity-80 " id="faq2">Is PLM Tuition Free?</div>
            <div class="accordion-content pl-4 py-1">
                <p class="py-2 text-[13px]">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
        </div>

          <!-- FAQ Item 3 -->
          <div class="accordion-item  border-gray-200 mb-2">
            <div class="accordion-toggle   font-bold   cursor-pointer text-[17px] hover:opacity-80  bg-gold-amber text-white-10 rounded-full pl-4 py-1 hover:opacity-80 " id="faq3">Who Owns PLM</div>
            <div class="accordion-content pl-4 py-1">
                <p class="py-2 text-[13px]">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
        </div>

        <!-- FAQ Item 4 -->
        <div class="accordion-item border-gray-200 mb-2">
            <div class="accordion-toggle  font-bold    cursor-pointer text-[17px] hover:opacity-80  bg-gold-amber text-white-10 rounded-full pl-4 py-1 " id="faq4">What is PLM?</div>
            <div class="accordion-content pl-4 py-1">
                <p class="py-2 text-[13px]">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
        </div>

          <!-- FAQ Item 5 -->
          <div class="accordion-item border-gray-200 mb-2">
            <div class="accordion-toggle  font-bold cursor-pointer text-[17px] bg-gold-amber hover:opacity-80 text-white-10 rounded-full pl-4 py-1 " id="faq4">Why PLM?</div>
            <div class="accordion-content pl-4 py-1">
                <p class="py-2 text-[13px]">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const accToggles = document.querySelectorAll('.accordion-toggle');

        accToggles.forEach(toggle => {
            toggle.addEventListener('click', function() {
                const content = this.nextElementSibling;
                content.classList.toggle('hidden');
            });
        });
    });
</script>

</body>
</html>
