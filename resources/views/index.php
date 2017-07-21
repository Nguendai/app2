<!DOCTYPE html>
<html lang="en" ng-app="test-app2">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	
	<link type="text/css" rel="stylesheet" href="<?php echo 'asset/css/bootstrap.min.css';?>" />
	<link type="text/css" rel="stylesheet" href="<?php echo 'asset/css/style.css';?>" />
	<link type="text/css" rel="stylesheet" href="<?php echo 'asset/sweetalert/dist/sweetalert.css';?>" />
</head>
<body>
<div class="container"  ng-controller="MembersControll">
		<center><h2>List Member</h2></center>
		<button id="btn-add" class="btn btn-primary btn-xs" ng-click="modal('add');resetForm()"  >Thêm Sinh Viên</button>
		<table class="table table-bordered" id="table_id" class="display">
			<thead>
				<tr>
					<th><a href="" ng-click="orderByField='id'; reverseSort = !reverseSort">STT</a></i></th>
					<th width="30%"><a href="" ng-click="orderByField='name'; reverseSort = !reverseSort">Name</a></th>
					<th>  <a href="" ng-click="orderByField='age'; reverseSort = !reverseSort">Age</a> </th>
					<th><a href="" ng-click="orderByField='address'; reverseSort = !reverseSort">Adress</a></th>
					<th>Image</th>
					<th width="10%">Action</th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="mb in members | orderBy:orderByField:reverseSort">

					<td>{{ mb.id }}</td>
					<td>{{ mb.name }}</td>
					<td>{{ mb.age }}</td>
					<td>{{ mb.address }}</td>
					<td><img ng-src="upload/images/{{mb.images}}" alt="" width="100px" class="thumbnail"></td>
					<td>
						<button class="btn btn-default btn-xs btn-detail" id="btn-edit" ng-click="modal('edit',mb.id)">Edit</button>
						<button class="btn btn-danger btn-xs btn-delete" ng-click="comfirmDelete(mb.id)">Delete</button>
					</td>
				</tr>
			</tbody>
		</table>
		
		<!-- Modal -->
		<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">{{frmTitle}}</h4>
			  </div>
			  <div class="modal-body">
				<form  name="member"  class="form-horizontal" novalidate>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="name" name="name" ng-model="membera.name" ng-maxlength="100"  required placeholder="Please,Enter Name" />
							<span id="helpBlock2" class="help-block" ng-show="member.name.$error.required ">Please,Enter Name</span>
							<span id="helpBlock2" class="help-block" ng-show="member.name.$error.maxlength ">Name must be less than 100 char</span>
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Age</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" max="99" id="age" name="age" ng-model="membera.age"  ng-required="true"  placeholder="Please,Enter Age" >
							<span id="helpBlock2" class="help-block" ng-show="member.age.$error.required"  >Please,Enter Age</span>
							<span id="helpBlock2" class="help-block" ng-show="member.age.$error.max " >Please,Enter1 Age</span>
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Address</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="address" ng-model="membera.address" ng-maxlength="300"  required name="address" placeholder="Please,Enter Address" />
							<span id="helpBlock2" class="help-block" ng-show="member.address.$error.required ">Please,Enter Address</span>
							<span id="helpBlock2" class="help-block" ng-show="member.address.$error.maxlength ">Address must be less than 300 char</span>
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Image</label>
						<div class="col-sm-9">
							<input type="file" ng-model="file" id="file" valid-file=".jpeg,.gif,.png" validFile class="form-control" name="file">
							<span id="helpBlock2" class="help-block" ng-show="member.file.$error.size">Image size 10mb</span>
							<span id="helpBlock2" class="help-block" ng-show="member.file.$error.extension">NOt Images</span>
						</div>
					</div>
				</form>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-primary" ng-disabled="member.$invalid" ng-click="save(state,membera.id)">Save</button>
			  </div>
			</div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</div>
	<!-- Script -->
	<script type="text/javascript" src="<?php echo 'asset/js/jquery.min.js';?>"></script>
	<script type="text/javascript" src="<?php echo 'asset/js/bootstrap.min.js';?>"></script>
	<script type="text/javascript" src="<?php echo 'app/lib/angular.min.js';?>"></script> 
	<script type="text/javascript" src="<?php echo 'asset/sweetalert/dist/sweetalert.min.js';?>"></script> 
	<script type="text/javascript" src="<?php echo 'app/app.js';?>"></script>
	
	
	
</body>
</html>