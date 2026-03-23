<x-filament-panels::page>


<h1 class="text-2xl font-bold mb-4">Student Information</h1>

<table class="min-w-full">
    <tbody>
        <!-- Dummy Data -->
        <tr>
            <th class="py-2 px-4 text-left text-gray-500">ID:</th>
            <td class="py-2 px-4">2021931874</td>
        </tr>
        <tr>
            <th class="py-2 px-4 text-left text-gray-500">Name:</th>
            <td class="py-2 px-4">{{auth()->user()->name}}</td>

        </tr>
        <tr>
            <th class="py-2 px-4 text-left text-gray-500">Email:</th>
            <td class="py-2 px-4">{{auth()->user()->email}}</td>
        </tr>
        <!-- Add more rows for other fields -->
    </tbody>
</table>

</div>
    
</x-filament-panels::page>
