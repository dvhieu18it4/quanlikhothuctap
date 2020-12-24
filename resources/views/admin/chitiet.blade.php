@extends('admin.admin')

@section('title')
Dashboard | TÌNH TRẠNG SẢN PHẨM
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">SẢN PHẨM </h4>
					<button type="button" class="btn btn-info" data-toggle="#" data-target="#exampleModal" data-whatever="@getbootstrap">In báo cáo</button>
				<div class="input-group no-border">
                <input id="myInput" type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
				@if (session('status'))
                        <div class="alert alert-success" role="alert" >
                            {{ session('status') }}
                          {{-- 	<button   type="submit" rel="tooltip"  class="flex-row-reverse btn btn-danger btn-sm btn-icon navbar-right" >
											<i class="now-ui-icons ui-1_simple-remove"></i>
										</button> --}}
                        </div>
                    @endif

				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">NHẬP SẢN PHẨM</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								
							</div>
							<div class="modal-body has-success">
								<form action="addsanpham" method="POST">
									{{ csrf_field() }}
									{{ method_field('POST') }}
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Tên sản phẩm :</label>
										<input type="text" class="form-control" name="tensanpham" id="recipient-name">
									</div>
									
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Nhà cung cấp :</label>
										<input type="text" class="form-control" name="ncc" id="recipient-email">
									</div>
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Thông tin :</label>
										<input type="text" class="form-control" name="thongtin" id="recipient-pass">
									</div>
									
								
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
								<button type="submit" class="btn btn-primary">Thêm</button>
							</div>
							</form>
						</div>
					</div>
				</div>

			</div>
			<div class="card-body">
				<div class="table-responsive">
                Tình trạng
                <table class="table">
						<thead class=" text-primary ">
							<th> Đã nhập</th>
                            <th> Đã bán</th>
                            <th> Tồn kho</th>
							<th> Lợi nhuận</th>
						</thead>
							<tbody class=" text-primary ">
                            <th> {{$tongnhap}}</th>
                            <th> {{$tongxuat}}</th>
                            @php
						    $count = $tongnhap-$tongxuat;
						    @endphp
                            <th> {{$count}}</th>
							@php
						    $loinhuan = $tongtienxuat-$tongtiennhap;
						    @endphp
							<th> {{$loinhuan}} VND</th>
							</tbody>
							
						</table>
					</div>
					<div class="row">
						<div class="col-12 d-flex justify-content-center">
							{{ $nhap->links() }}
						</div>
					</div>
					</table>
					<div class="table-responsive">
                Hóa đơn nhập
				
                <table class="table">
						<thead class=" text-primary ">
						
                        <th class="text-center"> STT </th>
							<th> Tên sản phẩm</th>
                            <th> Giá nhập</th>
                            <th> Số lượng</th>
							<th> Tổng tiền</th>
							<th> Ngày nhập</th>
						</thead>
							<tbody >
								@php
						$count = 1;
						@endphp
						@foreach ($nhap as $row)
						<tr>
							<td class="text-center">{{$count++ }}</td>
							<td>{{ $row->sanpham_id}}</td>
							<td>{{ $row->gianhap }} VND</td>
							<td>{{ $row->soluongnhap }}</td>
                            <td>{{ $row->tongnhap }} VND</td>
							<td>{{ date('d/m/Y', strtotime($row->ngaynhap)) }}</td>
			
							
							<tr>
						@endforeach
						
							</tbody>
							
						</table>
					</div>
					<div class="row">
						<div class="col-12 d-flex justify-content-center">
							{{ $nhap->links() }}
						</div>
					</div>
					</table>
					<div class="table-responsive">
                 Hóa đơn xuất
				 
                    <table class="table">
						<thead class=" text-primary ">
						
                        <th class="text-center"> STT </th>
							<th> Tên sản phẩm</th>
                            <th> Giá nhập</th>
                            <th> Số lượng</th>
							<th> Tổng tiền</th>
							<th> Ngày xuất</th>
						</thead>
							<tbody >
								@php
						$count = 1;
						@endphp
						@foreach ($xuat as $rows)
						<tr>
							<td class="text-center">{{$count++ }}</td>
							<td>{{ $rows->sanpham_id}}</td>
							<td>{{ $rows->giaxuat }} VND</td>
							<td>{{ $rows->soluongxuat }}</td>
                            <td>{{ $rows->tongxuat }} VND</td>
							<td>{{ date('d/m/Y', strtotime($row->ngayxuat)) }}</td>
			
							<tr>
						@endforeach
						
							</tbody>
							
						</table>
					</div>
					<div class="row">
						<div class="col-12 d-flex justify-content-center">
							{{ $nhap->links() }}
						</div>
					</div>
					</table>

				</div>
			</div>
		</div>
	</div>
	
@endsection


@section('scripts')
{{-- expr --}}
@endsection