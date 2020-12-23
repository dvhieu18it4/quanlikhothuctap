@extends('admin.admin')

@section('title')
Dashboard | DANH SÁCH HÓA ĐƠN NHẬP
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">DANH SÁCH HÓA ĐƠN NHẬP </h4>
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Thêm hóa đơn</button>
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
								<h5 class="modal-title" id="exampleModalLabel">NHẬP HÓA ĐƠN</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								
							</div>
							<div class="modal-body has-success">
								<form action="addhoadonnhap" method="POST">
									{{ csrf_field() }}
									{{ method_field('POST') }}
									
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Tensanpham</label>
										<select name="idsanpham" class="form-control form-control-success">
											@foreach ($getnamesanpham as $row)
											<option value="{{ $row->id }}">{{ $row->tensp}}</option>
											@endforeach
										</select>
									</div>

									
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Giá nhập:</label>
										<input type="text" class="form-control" name="gianhap" id="recipient-gianhap" onkeyup="myFunction()">
									</div>
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Số lượng:</label>
										<input type="text" class="form-control" name="soluong" id="recipient-soluong" onkeyup="myFunction()">
									</div>
                                    <div class="form-group">
										<label for="recipient-name" class="col-form-label">Tổng tiền :</label>
										<input type="text" class="form-control" name="tongtien" id="recipient-tongtien">
									</div>
									
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Ngày :</label>
										<input type="date" class="form-control" name="date" id="recipient-pass">
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
					<table class="table">
						<thead class=" text-primary ">
						
							<th class="text-center"> STT </th>
							<th> tên sản phẩm</th>
                            <th> Giá nhập</th>
                            <th> Số lượng</th>
							<th> Tổng tiền</th>
							<th> Ngày nhập</th>
							<th class="text-center">Tác vụ</th>
						</thead>
							<tbody >
								@php
						$count = 1;
						@endphp
						@foreach ($hoadonnhap as $row)
						<tr>
							<td class="text-center">{{$count++ }}</td>
							<td>{{ $row->tensp}}</td>
							<td>{{ $row->gianhap }}</td>
							<td>{{ $row->soluong }}</td>
                            <td>{{ $row->tong }}</td>
                            <td>{{ date('d/m/Y', strtotime($row->ngaynhap)) }}</td>
							<td class="td-actions text-center">
								<a href="#">
									
									<button type="button" rel="tooltip" class="btn btn-success btn-sm btn-icon " data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Sửa hóa đơn" data-target="#acc{{$row->id}}" data-whatever="@getbootstrap"><i class="now-ui-icons business_badge"></i></button>
								</a>

								<div class="modal fade" id="acc{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Sửa thông tin hóa đơn</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>

											<div class="modal-body has-success">
												<form action="update-hoadonnhap/{{ $row->id}}" method="POST">
													{{ csrf_field() }}
													{{ method_field('PUT') }}
													
													<fieldset disabled>
														<div class="form-group">
														
														  <input type="hidden" id="disabledTextInput" class="form-control"  name="id" value="{{ $row->id}}" >
														</div>
													</fieldset>

													<div class="form-group">
														<label for="recipient-name" class="col-form-label" style=" text-right:none!important">ID sản phẩm :</label>
														<input type="text" class="form-control" name="idsp" id="recipient-name" value="{{ $row -> sanpham_id}}">
													</div>

													<div class="form-group">
														<label for="recipient-phone" class="col-form-label">Giá:</label>
														<input type="text" class="form-control" name="gia" id="recipient-phone" value="{{ $row -> gianhap}}">
													</div>

													<div class="form-group">
														<label for="recipient-email" class="col-form-label">Số lượng:</label>
														<input type="text" class="form-control" name="soluong" id="recipient-email" value="{{ $row -> soluong}}">
													</div>

                                                    <div class="form-group">
														<label for="recipient-phone" class="col-form-label">Tổng:</label>
														<input type="text" class="form-control" name="tong" id="recipient-phone" value="{{ $row -> tong}}">
													</div>
													

												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
													<button type="submit" class="btn btn-primary">Cập nhật</button>
												</div>
											
											</form>
										</div>
									</div>
								</div>
							</div>


							


							<a>
								<form action="delete-hoadonnhap/{{ $row->id }}" method="POST" class="btn btn-sm btn-icon">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<button   type="submit" rel="tooltip" title="Xóa sản phẩm"  class="btn btn-danger btn-sm btn-icon" >
										<i class="now-ui-icons ui-1_simple-remove"></i>
									</button>
								</form>
							</a>
							</td>
							<tr>
						@endforeach
						
							</tbody>
							
						</table>
					</div>
					<div class="row">
						<div class="col-12 d-flex justify-content-center">
							{{ $hoadonnhap->links() }}
						</div>
					</div>
					</table>
				</div>
			</div>
		</div>
	</div>
	
@endsection


@section('scripts')
<script>
	function myFunction() {
	  var x = document.getElementById("recipient-soluong");
	  var y = document.getElementById("recipient-gianhap");
	  var z = document.getElementById("recipient-tongtien");
	  z.value = x.value * y.value;
	}
</script>
@endsection