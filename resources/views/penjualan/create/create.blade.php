<form action="/penjualan" class="p-2" method="POST">
    @csrf

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (Session::has('success'))
        <div class="alert alert-success text-center">
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif

    <div class="m-3">
        <label class="form-label">Kode Penjualan</label>
        <input type="text" name="id_jual" class="form-control" value="{{ $newId }}" readonly>
        @error('id_jual')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="m-3">
        <label class="form-label">Tanggal</label>
        <input type="date" name="tanggal_jual" class="form-control @error('tanggal_jual') is-invalid @enderror" 
               value="{{ old('tanggal_jual') }}">
        @error('tanggal_jual')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <!-- Input hidden untuk id_pd -->
    <input type="hidden" name="id_pd" id="id_pd" value="{{ Str::uuid() }}">

    <div class="m-3 text-center mb-10">
        <label class="form-label">Total Harga</label>
        <h1 id="grand-total-display">Rp. 0</h1>
        <input type="hidden" id="total-price-input" name="totalharga_jual" value="0">
    </div>

    <label class="form-label">Barang yang Dibeli</label>
    <div class="m-3 bg-white p-2 rounded-3 shadow-sm">
        <table class="table table-bordered" id="table">
            <tr>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </table>

        <button type="button" id="add" class="btn btn-success mt-2">Tambah Barang</button>
    </div>

    <div class="m-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        var i = 0;

        function calculateGrandTotal() {
            var grandTotal = 0;
            $('.total-price-cell').each(function () {
                grandTotal += parseFloat($(this).text()) || 0;
            });
            $('#grand-total-display').text('Rp. ' + grandTotal.toLocaleString());
            $('#total-price-input').val(grandTotal);
        }

        $('#add').click(function () {
            i++;
            var row = `
                <tr>
                    <td>
                        <select name="barang[${i}][id_bar]" class="form-control barang-select">
                            <option value="">Pilih Barang</option>
                            @foreach ($barang as $item)
                                <option value="{{ $item->id_bar }}" data-price="{{ $item->harga }}">
                                    {{ $item->nama_bar }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="number" name="barang[${i}][jumlah]" class="form-control jumlah-input" min="1" value="1">
                    </td>
                    <td class="total-price-cell">0</td>
                    <td>
                        <button type="button" class="btn btn-danger remove-table-row">Hapus</button>
                    </td>
                </tr>`;
            $('#table').append(row);
        });

        $(document).on('change', '.barang-select, .jumlah-input', function () {
            var row = $(this).closest('tr');
            var harga = parseFloat(row.find('.barang-select option:selected').data('price')) || 0;
            var jumlah = parseInt(row.find('.jumlah-input').val()) || 1;
            var total = harga * jumlah;
            row.find('.total-price-cell').text(total);
            calculateGrandTotal();
        });

        $(document).on('click', '.remove-table-row', function () {
            $(this).closest('tr').remove();
            calculateGrandTotal();
        });

        calculateGrandTotal();
    });
</script>