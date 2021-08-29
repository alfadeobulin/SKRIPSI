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
							</div>
					</div>
					<div class="profile-detail">
						<div class="profile-info">
							<h4 class="heading">Profil Admin</h4>
							<ul class="list-unstyled list-justify">
								<li>ID Admin <span>{{$user->id_users}}</span></li>
								<li>Nama  <span>{{$user->name}}</span></li>
								<li>Email <span>{{$user->email}}</span></li>
							</ul>
						</div>
					</div>
					<div class="text-center">
						@if (auth()->user()->role == 'admin')
						<a href="/daftaradminumkm/edit/{{$admin->id_admin}}" class="btn btn-warning">Edit Profile</a>
						<a href="/gantipassword" class="btn btn-primary">Reset Password</a>
						@endif
					</div>
				</div>
@endsection 