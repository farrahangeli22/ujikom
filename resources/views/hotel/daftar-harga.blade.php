<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
            extend: {
                colors: {
                clifford: '#da373d',}
            }
        }
    }
    </script>
    <title>Daftar Harga</title>
    @vite('resources/js/app.js')

</head>

<body>
  
    <!-- navbar -->
    @include('components.navbar')

    <!-- content -->
    
    <div class="relative overflow-x-auto mb-8 p-10">
        <table class="w-full text-sm text-center shadow-md sm:rounded-lg">
            <thead class="text-lg text-white bg-[#f0ad4e]">
                <tr>
                    <th scope="col" class="px-6 py-3 border">
                        Gambar
                    </th>
                    <th scope="col" class="px-6 py-3 border">
                        Tipe
                    </th>
                    <th scope="col" class="px-6 py-3 border">
                        Harga
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach($hotel as $hotel)
                <tr class="bg-white border-b">
                    <td class="flex items-center justify-center px-6 py-4 border">
                        <img src="{{$hotel->gambar}}" class="w-48 h-28">
                    </td>
                    <td class="px-6 py-4 border">
                        {{$hotel->tipe}}
                    </td>
                    <td class="px-6 py-4 border">
                        {{$hotel->harga}}/malam
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>