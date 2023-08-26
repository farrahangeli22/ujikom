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
                        clifford: '#da373d',
                    }
                }
            }
        }
    </script>
    <title>Detail Pemesanan</title>
    @vite('resources/js/app.js')

</head>

<body>

    <!-- navbar -->
    @include('components.navbar')

    <!-- content -->
    
    <div class="p-20">
        <div class="p-10 space-y-10 mx-auto max-w-md border rounded bg-[#F8F8F8] shadow">
            <!-- hotel -->
            <h1 class="text-2xl font-bold text-center">Pemesanan Anda Berhasil</h1>
            <p class="font-bold">Detail Pemesan:</p>
            <div class="flex">
                <p class="w-1/2">Nama Pemesan</p>
                <p class="w-1/2">: {{$pemesanan->nama}}</p>
            </div>
            <div class="flex">
                <p class="w-1/2">Nomor Identitas</p>
                <p class="w-1/2">: {{$pemesanan->no_identitas}}</p>
            </div>
            <div class="flex">
                <p class="w-1/2">Jenis Kelamin</p>
                <p class="w-1/2">: {{$pemesanan->jenis_kelamin}}</p>
            </div>
            <div class="flex">
                <p class="w-1/2">Tipe Kamar</p>
                <p class="w-1/2">: {{$pemesanan->hotel->tipe}}</p>
            </div>
            <div class="flex">
                <p class="w-1/2">Durasi Penginapan</p>
                <p class="w-1/2">: {{$pemesanan->durasi}} Hari</p>
            </div>
            <div class="flex">
                <p class="w-1/2">Discount</p>
                <p class="w-1/2">: {{$pemesanan->durasi > 3 ? "10%" : "0%"}}</p>
            </div>
            <div class="flex">
                <p class="w-1/2">Total Bayar</p>
                <p class="w-1/2">: Rp {{number_format($pemesanan->total, 0, ',', '.')}}</p>
            </div>
        </div>
    </div>
</body>

</html>