@extends('backend.layouts.master')
@section('content')
<section class="content pt-4">
    <div class="row">
        <div class="col-md-4 col-sm-12 pb-4 box-size-1">
			<a href="#">
				<div class="card bg-warning text-light border-0  overflow-hidden shadow">
					<div class="card-header border-0 bg-transparent text-light text-capitalize">
						<h4 class="">Pengunjung Webiste</h4>
					</div>
					<div class="card-body">
						<div class="text-left text-light">
							<h1></h1>
						</div>
						<div class="text-right" style="margin-top: -20px;">
							
							<i class="fa fa-eye logo-dashboard" aria-hidden="true"></i>
						</div>

					</div>
				</div>
			</a>
		</div>
        <div class="col-md-4 col-sm-12 pb-4 box-size-1">
			<a href="">
				<div class="card bg-primary text-light border-0  overflow-hidden shadow">
					<div class="card-header border-0 bg-transparent text-light text-capitalize">
						<h4 class="">Jumlah Post</h4>
					</div>
					<div class="card-body">
						<div class="text-left text-light">
							<h1></h1>
						</div>
						<div class="text-right" style="margin-top: -20px;">
							
							<i class="fa fa-video logo-dashboard" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</a>
		</div>
		
		<div class="col-md-4 col-sm-12 pb-4 box-size-1">
			<a href="#">
				<div class="card bg-secondary text-light border-0  overflow-hidden shadow">
					<div class="card-header border-0 bg-transparent text-light text-capitalize">
						<h4 class="">Admin</h4>
					</div>
					<div class="card-body">
						<div class="text-left text-light">
							<h1></h1>
						</div>
						<div class="text-right" style="margin-top: -20px;">
							
							<i class="fa fa-file logo-dashboard" aria-hidden="true"></i>
						</div>

					</div>
				</div>
			</a>
		</div>
        <div class="col-md-4 col-sm-12 pb-4 box-size-1">
			<a href="">
				<div class="card bg-dark text-light border-0  overflow-hidden shadow">
					<div class="card-header border-0 bg-transparent text-light text-capitalize">
						<h4 class="">Team</h4>
					</div>
					<div class="card-body">
						<div class="text-left text-light">
							<h1></h1>
						</div>
						<div class="text-right" style="margin-top: -20px;">
							
							<i class="fa fa-users logo-dashboard" aria-hidden="true"></i>
						</div>

					</div>
				</div>
			</a>
		</div>
        
        
    </div>
</section>
@stop