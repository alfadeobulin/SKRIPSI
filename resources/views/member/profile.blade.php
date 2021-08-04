@extends('umkm.index')

@section('content')
<div class="main">
	<div class="main-content">
		<div class = "container-fluid ">
			<div class="clearfix">
				<div class="profile-left">
					<div class="profile-header">
						<div class="overlay"></div>
							<div class="profile-main">
								<img src="" class="img-circle" alt="avatar">
								<h3 class="name">{{$member->nama_member}}</h3>
								<span class="online-status status-available">{{$member->alamat_member}}</span>
							</div>
					</div>
					<div class="profile-detail">
						<div class="profile-info">
							<h4 class="heading">Profil Member</h4>
							<ul class="list-unstyled list-justify">
								<li>ID Member <span>{{$member->id_member}}</span></li>
								<li>Nama  <span>{{$member->nama_member}}</span></li>
								<li>Kontak <span>{{$member->nohp_member}}</span></li>
								<li>Alamat <span>{{$member->alamat_member}}</span></li>
							</ul>
						</div>
					</div>
					<div class="text-center">
						@if (auth()->user()->role == 'member')
						<a href="/daftarmemberumkm/edit/{{$member->id_member}}" class="btn btn-warning">Edit Profile</a>
						@endif
					</div>
				</div>
				<div class="profile-right">
					<h4 class="heading"> {{$member->nama_member}}</h4>
					<div class="awards">
						<div class="row">
							<div class="col-md-20 col-sm-20">
								<div class="award-item">
									<div class="hexagon">
										<span class="lnr lnr-picture award-icon"></span>
									</div>
								</div>
							</div>
						</div>
					<div class="text-center"><a href="/galeriku" class="btn btn-default">Galeriku</a></div>
				</div>
			
					
@endsection 