@extends('umkm.index')

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-profile">
				<div class="clearfix">
					<div class="profile-left">
						<div class="profile-header">
							<div class="overlay"></div>
							<div class="profile-main">
								<img src="" class="img-circle" alt="avatar">
								<h3 class="name">{{$member->nama_member}}</h3>
								<span class="online-status status-available">{{$member->alamat_member}}</span>
							</div>
							<div class="profile-stat">
								<div class="row">
									<div class="col-md-12 stat-item">
										Usaha <span>Keripik Ikan</span>
									</div>
								</div>
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
								<div class="text-center">
								@if (auth()->user()->role == 'member')
								<a href="/daftarmemberumkm/edit/{{$member->id_member}}" class="btn btn-warning">Edit Profile</a>
								<a href="/createusaha" class="btn btn-primary">Tambah Data Usaha</a>
							</div>
							@endif
							@if (auth()->user()->role == 'admin')
							<a href="/daftarmemberumkm/delete/{{$member->id_member}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')">Delete Member</a>
							@endif 
						</div>
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
								@if (auth()->user()->role == 'member') 
								<div class="text-center"><a href="/galeri" class="btn btn-default">Unggah Galeri Usaha</a></div>
								@endif 
							<div class="custom-tabs-line tabs-line-bottom left-aligned">
								<ul class="nav" role="tablist">
									<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Recent Activity</a></li>
									<li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Projects <span class="badge">7</span></a></li>
								</ul>
							</div>
							<div class="tab-content">
								<div class="tab-pane fade in active" id="tab-bottom-left1">
									<ul class="list-unstyled activity-timeline">
										<li>
											<i class="fa fa-comment activity-icon"></i>
											<p>Commented on post <a href="#">Prototyping</a> <span class="timestamp">2 minutes ago</span></p>
										</li>
										<li>
											<i class="fa fa-cloud-upload activity-icon"></i>
											<p>Uploaded new file <a href="#">Proposal.docx</a> to project <a href="#">New Year Campaign</a> <span class="timestamp">7 hours ago</span></p>
										</li>
										<li>
											<i class="fa fa-plus activity-icon"></i>
											<p>Added <a href="#">Martin</a> and <a href="#">3 others colleagues</a> to project repository <span class="timestamp">Yesterday</span></p>
										</li>
										<li>
											<i class="fa fa-check activity-icon"></i>
											<p>Finished 80% of all <a href="#">assigned tasks</a> <span class="timestamp">1 day ago</span></p>
										</li>
									</ul>
									<div class="margin-top-30 text-center"><a href="#" class="btn btn-default">See all activity</a></div>
								</div>
								<div class="tab-pane fade" id="tab-bottom-left2">
									<div class="table-responsive">
										<table class="table project-table">
											<thead>
												<tr>
													<th>Title</th>
													<th>Progress</th>
													<th>Leader</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><a href="#">Spot Media</a></td>
													<td>
														<div class="progress">
															<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
																<span>60% Complete</span>
															</div>
														</div>
													</td>
													<td><img src="assets/img/user2.png" alt="Avatar" class="avatar img-circle"> <a href="#">Michael</a></td>
													<td><span class="label label-success">ACTIVE</span></td>
												</tr>
												<tr>
													<td><a href="#">E-Commerce Site</a></td>
													<td>
														<div class="progress">
															<div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%;">
																<span>33% Complete</span>
															</div>
														</div>
													</td>
													<td><img src="assets/img/user1.png" alt="Avatar" class="avatar img-circle"> <a href="#">Antonius</a></td>
													<td><span class="label label-warning">PENDING</span></td>
												</tr>
												<tr>
													<td><a href="#">Project 123GO</a></td>
													<td>
														<div class="progress">
															<div class="progress-bar" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;">
																<span>68% Complete</span>
															</div>
														</div>
													</td>
													<td><img src="assets/img/user1.png" alt="Avatar" class="avatar img-circle"> <a href="#">Antonius</a></td>
													<td><span class="label label-success">ACTIVE</span></td>
												</tr>
												<tr>
													<td><a href="#">Wordpress Theme</a></td>
													<td>
														<div class="progress">
															<div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">
																<span>75%</span>
															</div>
														</div>
													</td>
													<td><img src="assets/img/user2.png" alt="Avatar" class="avatar img-circle"> <a href="#">Michael</a></td>
													<td><span class="label label-success">ACTIVE</span></td>
												</tr>
												<tr>
													<td><a href="#">Project 123GO</a></td>
													<td>
														<div class="progress">
															<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
																<span>100%</span>
															</div>
														</div>
													</td>
													<td><img src="assets/img/user1.png" alt="Avatar" class="avatar img-circle"> <a href="#">Antonius</a></td>
													<td><span class="label label-default">CLOSED</span></td>
												</tr>
												<tr>
													<td><a href="#">Redesign Landing Page</a></td>
													<td>
														<div class="progress">
															<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
																<span>100%</span>
															</div>
														</div>
													</td>
													<td><img src="assets/img/user5.png" alt="Avatar" class="avatar img-circle"> <a href="#">Jason</a></td>
													<td><span class="label label-default">CLOSED</span></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- END TABBED CONTENT -->
						</div>
						<!-- END RIGHT COLUMN -->
					</div>
				</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
@endsection 