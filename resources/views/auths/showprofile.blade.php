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
								<h3 class="name">{{$user->name}}</h3>
								<span class="online-status status-available">Sedang Aktif</span>
							</div>
					</div>
					<div class="profile-detail">
						<div class="profile-info">
							<h4 class="heading">Profil Member</h4>
							<ul class="list-unstyled list-justify">
								<li>Email <span>{{$user->email}}</span></li>
								<li>Nama  <span>{{$user->name}}</span></li>
								<li>Terdaftar Sebagai <span>{{$user->role}}</span></li>
							</ul>
						</div>
					</div>
					<div class="text-center">
                        <a href="/gantipassword" class="btn btn-primary">Reset Password</a>
					</div>
				</div>
@endsection 