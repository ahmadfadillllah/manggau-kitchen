@include('layout.head')
@include('layout.header')
@include('layout.sidebar')
<div class="content-body">
    <div class="container-fluid">
        @include('auth.notif.index')
        <div class="row">
            <div class="col-xl-6 col-xxl-12">
                <div class="row">
                    <div class="col-xl-12 col-xxl-6 col-lg-12 col-sm-12 row">
                        @foreach ($meja as $m)
                        <div class="col-xl-4 col-xxl-4 col-lg-4 col-sm-4">
                            <div class="card bg-blue action-card" type="button" id="meja" value="{{ $m->id }}" onclick="showMenu({{ $m->id }})">
                                <div class="card-body text-white">
                                    <h2 class="text-white fs-20 text-center">{{ $m->name }}</h2>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="col-xl-12 col-xxl-6 col-lg-12 col-sm-12">
                        <form action="{{ route('pesananmasuk.pesanan_berakhir') }}" method="POST">
                            @csrf
                            <div class="card">
                                <div class="card-header d-block d-sm-flex border-0">
                                    <div>
                                        <h4 class="card-title mb-2">Pesanan <a href="javascript:void(0)" class="badge badge-xl badge-warning" id="namameja"></a></h4>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="invoice-list row" id="result">

                                    </div>
                                </div>

                                <div class="card-header d-block d-sm-flex border-0">
                                    <div class="col-lg-9">
                                        <div class="me-auto" id="tulisantotal">

                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <span class="fs-20 text-black font-w400" id="totalorder"></span>
                                    </div>
                                </div>

                                <div class="card-footer border-0 col-lg-12" id="tombolbutton">

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++) if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp' + rupiah.split('', rupiah.length - 1).reverse().join('');
    }

    function showMenu(idTiket) {
			var user_id = idTiket;
			$.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token1"]').attr('content')
                },
				url: "{{ route('pesanan_masuk.show_data') }}",
				method: "GET",
				data: {user_id: user_id},
				success: function(data){
                    let total;
                    console.log(data);
                    document.getElementById('namameja').innerHTML = data[0]['user']['name'];
                    document.getElementById('tombolbutton').innerHTML = `<button type="submit" class="btn btn-outline-info d-block btn-lg col-lg-12" onclick="return confirm('Apakah anda yakin menyelesaikan pesanan tersebut? pastikan meja tersebut telah membayar!!')">Selesai</button>
                                    <p style="color:red">Harap klik tombol selesai jika meja tersebut telah melakukan pembayaran.</p>`;
                    document.getElementById('tulisantotal').innerHTML = `<h6 class="fs-16 font-w600 mb-0"><a href="javascript:void(0)" class="text-black">Total</a></h6>`;
					$("#result").html("");
                    data.map(item => {
                    $("#result").append(`
                    <div class="col-lg-9">
                        <div class="me-auto">
                            <input type="text" name="user_id[]" value="${item.id}" hidden>
                            <h6 class="fs-16 font-w600 mb-0"><a href="javascript:void(0)" class="text-black">${item.produk.nama}</a></h6>
                            <span class="fs-12">x${item.jumlah} x ${convertToRupiah(item.produk.harga)}</span>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <span class="fs-16 text-black font-w400">${convertToRupiah(item.produk.harga*item.jumlah)}</span>
                    </div>
                        `)
                        total = item.produk.harga * item.jumlah
                    });
                    document.getElementById('totalorder').innerHTML = convertToRupiah(total);
                        console.log(total);
				}
			})
    }

</script>
@include('layout.footer')
