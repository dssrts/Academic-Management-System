<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLM AMS</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-opacity-80" style="background-image: url('images/PLM.png'); background-size: cover; font-family: 'Inter', sans-serif;">
    <div class="flex flex-col h-screen">
        <!-- Header -->
        <div class="bg-white flex items-center justify-between p-4">
            <div class="flex items-center">
                <img src="images/plm-logo.png" alt="PLM AMS" class="h-9 ml-3 mr-2">
                <h1 class="text-[24px] font-bold ml-2 text-blue"> PLM AMS</h1>
            </div>
        </div>

        <div class="flex flex-1 overflow-hidden">
            <!-- Sidebar Component with activePage -->
            @include('components.student-sidebar', ['activePage' => 'Appeals Inbox'])
            <!-- Main content -->
            <div class="bg-white p-6 rounded-lg shadow-md h-128 w-full overflow-auto">
                <div class="mb-4">
                    <h2 class="text-[22px] font-bold text-center text-white-10 font-inter italic">STUDENT INBOX
                    </h2>
                    <input type="text" id="searchInput" placeholder="Search by subject..."
                        class="mb-1 mt-3 px-4 py-2 w-full rounded-xl border-1 border-blue focus:outline-none focus:border-blue-500 transition-colors">
                </div>
                <div class="space-y-4">
                    @foreach ($appeals as $appeal)
                        <div class="p-4 rounded-lg bg-white-10 shadow-xl cursor-pointer appeal-item {{ empty($appeal->remarks) ? 'opacity-90' : 'opacity-100' }}
                            hover:opacity-95 bg-white-10"
                            onclick="toggleVisibility(this)">
                            <div class="flex justify-between items-center">
                                @if (!empty($appeal->remarks))
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor"
                                        class="bi bi-check-square-fill mr-2 text-green-bright"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="mr-2 text-gold-amber bi bi-pencil-square"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                    </svg>
                                @endif
                                <h3 class="text-lg font-semibold text-[16px] text-black-200 flex-grow">
                                    {{ $appeal->subject }}</h3>
                                <span class="text-black-200 text-sm">{{ $appeal->created_at }}</span>
                            </div>
                            <p class="text-black-200 text-[12px]"><span>To: </span>{{ $appeal->user->email }}
                            </p>
                            <div class="hidden">
                                <hr class="mt-2 bg-gray-100 bg-opacity-50 border-0 h-px">
                                <p class="text-gray-700 mt-2">{{ $appeal->message }}</p>
                                @if ($appeal->filepath)
                                    <p class="text-blue-500 mt-2 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="#2D349A" class="bi bi-filetype-pdf mr-1"
                                            viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z" />
                                        </svg>
                                        <a href="{{ $appeal->filepath }}" target="_blank"
                                            class="hover:underline text-blue ">View attached file</a>
                                    </p>
                                @endif
                                <hr class="mt-2 bg-gray-100 bg-opacity-50 border-0 h-px">
                                <p class="text-gray-500 mt-2">Remarks: {{ $appeal->remarks }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0/dist/alpine.min.js" defer></script>
</body>
</html>
