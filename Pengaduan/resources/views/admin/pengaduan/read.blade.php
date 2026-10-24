@include('customer.layout.header')

<div class="normal-table-area">
        <div class="container">     
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list mg-t-10">
                        <!-- <div class="basic-tb-hd">
                            <h2>Hover Row</h2>
                            <p>Enable a hover state (<code>.table-hover</code>) on table rows within a tbody</p>
                        </div> -->
                        
                        
                        ID: {{ $pengaduan->id_pengaduan }}<br>
                        No. Meja: {{ $pengaduan->no_meja}}<br>
Email: {{ $pengaduan->email }}<br>
Nama: {{ $pengaduan->name }}<br>
No. Telepon: {{ $pengaduan->no_tp }}<br>
Kategori: {{ $pengaduan->shengyang->nama_kategori ?? '-' }}<br>
Deskripsi: {{ $pengaduan->deskripsi}}<br>

<img
    src="{{ asset('storage/' . $pengaduan->foto) }}"
    alt="Foto pengaduan"
    width="300"
    style="height: auto;"
>
                        
                        
                        
</div>
                </div>
            </div>
            
            
        </div>
    </div>

@include('customer.layout.footer')