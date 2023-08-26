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
    <title>Pemesanan Kamar</title>
    @vite('resources/js/app.js')

</head>

<body>

    <!-- navbar -->
    @include('components.navbar')

    <!-- content -->
    <!-- form pemesanan -->
    <div class="flex justify-center mt-20 mb-20">
        <form class="border rounded bg-[#F8F8F8] shadow p-5" enctype='multipart/form-data' action="{{route('pemesanan.form-pemesanan')}}" method="post">
            @csrf
            <h1 class="text-center mb-6 font-bold text-3xl">Form Pemesanan</h1>
            <!-- nama pemesan -->
            <div class="flex justify-between mb-4">
                <label for="nama">Nama Pemesan : </label>
                <input id="nama" value="{{old('nama')}}" name="nama" type="text" class="rounded border border-gray-300 w-48" required autofocus>
            </div>
            <!-- jenis kelamin -->
            <div class="flex justify-between mb-4">
                <label for="jk">Jenis Kelamin : </label>
                <div class="space-x-1">
                    <input {{old('jk')=="Laki-Laki"?"checked":""}} id="lk" name="jk" type="radio" value="Laki-Laki" class="rounded border border-gray-300" required autofocus checked>
                    <label for="lk">Laki-Laki</label>
                    <input {{old('jk')=="Perempuan"?"checked":""}} id="pr" name="jk" type="radio" value="Perempuan" class="rounded border border-gray-300" required autofocus>
                    <label for="pr">Perempuan</label>
                </div>
            </div>
            <!-- nomor identitas -->
            <div class="flex justify-between mb-4">
                <label for="no_identitas">Nomor Identitas : </label>
                <input id="no_identitas" value="{{old('no_identitas')}}" name="no_identitas" type="text" class="rounded border border-gray-300 w-48" required autofocus>
            </div>
            <!-- error validasi -->
            @error('no_identitas')
            <div id="error-identitas" class="flex justify-end font-sm font-bold text-red-600 alert alert-danger mb-4">{{ $message }}</div>
            @enderror
            <!-- tipe kamar -->
            <div class="flex justify-between mb-4">
                <label for="tipe_kamar">Tipe Kamar : </label>
                <select name="tipe_kamar" id="tipe_kamar" class="rounded border border-gray-300 w-48">
                    @foreach($hotel as $item)
                    <option {{ old('tipe_kamar') == $item->id ? "selected" : "" }} value="{{ $item->id }}">{{ $item->tipe }}</option>
                    @endforeach
                </select>
            </div>
            <!-- tanggal pesan -->
            <div class="flex justify-between mb-4">
                <label for="tanggal_pesan">Tanggal Pesan : </label>
                <input value="{{old('tanggal_pesan')}}" id="tanggal_pesan" name="tanggal_pesan" type="date" class="rounded border border-gray-300 w-48" required autofocus>
            </div>
            <!-- harga -->
            <div class="flex justify-between mb-4">
                <label for="harga">Harga : </label>
                <input value="{{old('harga')?old('harga'):number_format($hotel[0]->harga,0,'.','.')}}" id="harga" name="harga" type="text" value="{{$hotel[0]->harga}}" readonly class="rounded border border-gray-300 w-48" required autofocus>
            </div>
            <!-- durasi menginap -->
            <div class="flex justify-between mb-4">
                <label for="durasi">Durasi menginap : </label>
                <div class="flex space-x-5">
                    <input value="{{old('durasi')?old('durasi'):1}}" id="durasi" name="durasi" type="text" class="rounded border border-gray-300 w-36" required autofocus>
                    <p>Hari</p>
                </div>
            </div>
            <!-- error validas no identitas-->
            @error('durasi')
            <div id="error-durasi" class="flex justify-end font-sm font-bold text-red-600 alert alert-danger mb-4">{{ $message }}</div>
            @enderror
            <!-- breakfast -->
            <div class="flex mb-4">
                <label for="" class="w-1/2">Termasuk Breakfast : </label>
                <div class="flex ml-4 space-x-2">
                    <input {{old('breakfast')?"checked":""}} id="breakfast" type="checkbox" name="breakfast" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                    <label for="breakfast" class="text-sm font-medium text-gray-900">
                        Ya
                    </label>
                </div>
            </div>
            <!-- total bayar -->
            <div class="flex justify-between mb-4">
                <label for="nama">Total : </label>
                <input id="total" name="total" value="{{old('total')?old('total'):number_format($hotel[0]->harga,0,'.','.')}}" type="text" class="rounded border border-gray-300 w-48" readonly autofocus>
            </div>
            <!-- buttons -->
            <div class="flex justify-between space-x-10">
                <div class="rounded h-max w-max text-center p-2 bg-[#f0ad4e] shadow">
                    <button onclick="hitungTotal({{json_encode($hotel)}})" type="button" class="text-sm text-white font-bold">Hitung Total Bayar</button>
                </div>
                <div class="rounded h-max w-24 text-center p-2 bg-[#5cb85c] shadow">
                    <button type="submit" class="text-sm text-white font-bold">Simpan</button>
                </div>
                <div class="rounded h-max w-24 text-center p-2 bg-[#d9534f] shadow">
                    <button onclick="resetForm({{json_encode($hotel)}})" type="button" class="text-sm text-white font-bold">Cancel</button>
                </div>
            </div>
        </form>
    </div>

    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>
    <script>
        function hitungTotal(dataKamar) {
            //ambil nilai
            durasi = $("#durasi").val()
            breakfast = $("#breakfast").is(":checked")
            hargaKamar = 0

            // harga kamar
            // cek harga kamar
            dataKamar.map((val => {
                if ($("#tipe_kamar").val() == val.id) {
                    $("#harga").val(formatNumber(val.harga))
                    hargaKamar = val.harga
                }
            }))

            // total harga
            totalHarga = parseInt(hargaKamar)
            console.log(totalHarga)
            totalHarga = totalHarga * durasi
            // jika durasi menginap lebih dari 3 hari
            // kasih diskon 10%
            if (durasi > 3) {
                diskon = totalHarga * (10 / 100)
                totalHarga = totalHarga - diskon
            }

            // jika termasuk breakfast true
            console.log(breakfast)
            if (breakfast) {
                // tambah 80.000
                // totalHarga += 80000

                // tambah 80k/hari
                totalHarga += (80000 * durasi)
            }

            // edit input total harga
            $("#total").val(formatNumber(totalHarga))
        }

        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")
        }

        function resetForm(dataKamar) {
            $('#nama').val("")
            $('#lk').prop("checked", true)
            $('#pr').prop("checked", false)
            $('#no_identitas').val("")
            $('#error-identitas').remove()
            // remove "selected" from any options that might already be selected
            $('#tipe_kamar option[selected="selected"]').each(
                function() {
                    $(this).removeAttr('selected');
                }
            );

            // mark the first option as selected
            $("#tipe_kamar option:first").attr('selected', 'selected');
            $('#tanggal_pesan').val('')
            $('#durasi').val(1)
            $('#breakfast').prop("checked", false)
            $('#error-durasi').remove()
            $('#total').val(formatNumber(dataKamar[0].harga))
            $('#harga').val(formatNumber(dataKamar[0].harga))
        }
    </script>
</body>

</html>