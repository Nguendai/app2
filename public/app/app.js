var app=angular.module('test-app2',[]);

app.controller('MembersControll',function($scope,$http){
	$http({
		method:'GET',
		url:'http://localhost/test2/public/list',
	}).then(function(reponse){
		$scope.members=reponse.data;
	},function(error){
		console.log(error);
	});

	$scope.modal=function(state,id){
		$scope.state=state;
		switch(state) {
			case "add":
				$scope.membera={};
				$('#file').val('');
				$scope.myFile=null;
				$scope.frmTitle="Add Member";
				$scope.member.$setPristine(true);
				break;
			case "edit" :
				$scope.membera={};
				$('#file').val('');
				$scope.myFile=null;
				$scope.frmTitle="Edit Member";
				$scope.member.$setPristine(true);
				$http({
					method:'GET',
					url:'http://localhost/test2/public/edit/'+id,
				}).then(function(reponse){
					$scope.membera=reponse.data;
				},function(error){
					console.log(error);
				});
				break;
			default:
		}
		$('#myModal').modal('show');
	}
	
	$scope.save= function(state,id){
		if(state=="add"){
			var file=document.getElementById('file');
			var data=new FormData();
			data.append('age',$scope.membera.age);
			data.append('address',$scope.membera.address);
			data.append('name',$scope.membera.name);
			data.append('file',file.files[0]);
			$http({
				method:'POST',
				data:data,
				url:'http://localhost/test2/public/add',
				headers :{'Content-Type':undefined}
			}).then(function(reponse){
				if(reponse.data=="name"){
					sweetAlert("Error", "Name Errors", "error");				
				}else if(reponse.data=="age"){
					sweetAlert("Error", "Age Errors", "error");
				}else if(reponse.data=="address"){
					sweetAlert("Error", "Address Errors", "error");
				}else{
					$('#myModal').modal('hide');
					$scope.members = reponse.data;
					sweetAlert("Success", "New member was added!", "success");
				}
			},function(error){
				console.log(error);
			});
		}
		if(state=="edit"){
			var file=document.getElementById('file');
			var data=new FormData();
			data.append('name',$scope.membera.name);
			data.append('age',$scope.membera.age);
			data.append('address',$scope.membera.address);
			data.append('file',file.files[0]);
			$http({
				method:'POST',
				data:data,
				url:'http://localhost/test2/public/edit/'+id,
				headers :{'Content-Type':undefined}
			}).then(function(reponse){
				if(reponse.data=="name"){
					sweetAlert("Error", "Name Errors", "error");				
				}else if(reponse.data=="age"){
					sweetAlert("Error", "Age Errors", "error");
				}else if(reponse.data=="address"){
					sweetAlert("Error", "Address Errors", "error");				
				}else{
					$('#myModal').modal('hide');
					$scope.members = reponse.data;
					sweetAlert("Success", "Member was edited!", "success");
				}
			},function(error){
				console.log(error);
			});
		}
	}
	$scope.comfirmDelete=function(id){
		var comfirm=confirm("Are you sure!");
		if(comfirm){
			$http({
					method:'GET',
					url:'http://localhost/test2/public/delete/'+id,
				}).then(function (reponse){
					$scope.members = reponse.data;
					sweetAlert("Congratulation", "You just kicked some asshole out of the squad", "success");
				},function(error){
					console.log(error);
				});	

		}else{
			return false;
		}

	}
	
});