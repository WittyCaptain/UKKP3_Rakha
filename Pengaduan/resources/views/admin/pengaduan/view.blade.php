@include('customer.layout.header');

    <!-- Main Menu area End-->
	<!-- Breadcomb area Start-->
	<div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="notika-icon notika-windows"></i>
									</div>
									<div class="breadcomb-ctn">
										<h1>PENGADUAN TABLE ADMIN</h1>
										<!-- <p>Welcome to user table i guess <span class="bread-ntd"></span></p> -->
                                       
                                        
                                        <h2>Selamat datang, {{ session('email') }}!</h2>
                                        <!-- </form> -->
                                        
									</div>
								</div>
							</div>
                            
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
								</div>
							</div>
                            
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcomb area End-->
    <!-- Normal Table area Start-->
    <div class="normal-table-area">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list mg-t-30">
                        <!-- <div class="basic-tb-hd">
                            <h2>Hover Row</h2>
                            <p>Enable a hover state (<code>.table-hover</code>) on table rows within a tbody</p>
                        </div> -->
                        <div class="bsc-tbl-hvr table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Email</th>
                                        <th>name</th>
                                        
                                        <th>Kategori</th>
                                        <th>Meja</th>
                                        <th colspan="1">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($areas as $user)
                                    <tr>
                                        <td>{{ $user->id_pengaduan }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->name }}</td>
                                        
                                        <td>{{ $user->shengyang->nama_kategori }}</td>
                                        <td>{{ $user->no_meja }}</td>
                                        <TD>
                                            <a href="{{ route('pengaduan.show', $user->id_pengaduan) }}" class="btn btn-warning">
                                                Read
                                            </a>
                                        </TD>
                                        
                                        <td>
                                            <form action="{{ route('pengaduan.destroy', $user->id_pengaduan) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td>Data kosong!</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
    <!-- Normal Table area End-->
    <!-- Start Footer area-->
@include('customer.layout.footer')