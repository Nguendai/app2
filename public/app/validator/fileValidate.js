app.directive('validFile', function () {
    return {

    	require : 'ngModel',
    	link: function (scope, el, attrs, ngModel) {
            el.bind('change', function (event) {
                var file = event.target.files[0];
                // console.log(file);
                scope.file = file ? file : null;
                scope.$apply();
            });
    	ngModel.$validators.size = function () {
                console.log(scope.file);
            	if (scope.file) {
            		if (scope.file.size > 100000) {
	            		return false;
	            	} else {
	            		return true;
	            	}
            	} else {
            		return true;
            	}
            }
            
            ngModel.$validators.extension = function () {
            	if (scope.file) {
            		if (scope.file.type == 'image/jpeg' || scope.file.type == 'image/png' || scope.file.type == 'image/gif') {
            			return true;
            		} else {
            			return false;
            		}
            	} else {
            		return true;
            	}
            }
        }
    };
});