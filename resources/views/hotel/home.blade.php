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
    <title>Hotel</title>
    @vite('resources/js/app.js')

</head>

<body>
  
    <!-- navbar -->
    @include('components.navbar')

    <!-- content -->
    <div class="p-10 space-y-10">
        <!-- hotel -->
        @foreach ($hotel as $hotel)
        <div class="flex space-x-10 p-10 rounded border h-96 w-full bg-[#F8F8F8] shadow">
            <div>
                <img src="{{$hotel->gambar}}" alt="" class="w-72 h-36 mb-4">
                <iframe src="{{$hotel->video}}" frameborder="0" class="w-72 h-36"></iframe>
            </div>
            <div>
                <h1 class="font-bold text-3xl mb-4">{{$hotel->tipe}}</h1>
                <p class="text-justify text-xl">{{$hotel->fasilitas}}</p>
            </div>
        </div>     
        @endforeach
    </div>
</body>
</html>