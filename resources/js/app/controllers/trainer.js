app.controller('trainerController', ['$scope', 'dev4UService', '$http', 'API_URL', 'Upload',
    function($scope, dev4UService, $http, API_URL, Upload) {

        var imageData;

        //retrieve employees listing from API
        $scope.updateList = function () {
            $http({
                method: 'GET',
                url: API_URL + "trainers/list"
            }).then(function (response){
                $scope.trainers = response.data;
            },function (error){
                console.log(error);
            });
        };
        $scope.updateList();

        //show modal form
        $scope.toggle = function(modalstate, id) {
            dev4UService.defaultToggle(
                modalstate,
                id,
                'trainer',
                {'add':'Добавить','edit':'Редактировать'}
            );
        };

        //save new record / update existing record
        $scope.save = function(modalstate, id) {
            if (imageData) {
                $scope.trainer.photo_link = imageData.image;
            }
            dev4UService.defaultSave(modalstate, $scope.trainer, 'trainer');
        };

        $scope.upload = function (file) {
            if (!file) {
                return;
            }
            Upload.upload({
                url: API_URL + "upload",
                data: { file: file }
            }).then(function (resp) {
                imageData = resp.data;
                $scope.photo_link = resp.data.image;
            }, function (resp) {
                console.log('Error status: ' + resp.status);
            }, function (evt) {
                var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
                console.log('progress: ' + progressPercentage + '% ' + evt.config.data.file.name);
            });
        };

        //delete record
        $scope.confirmDelete = function(id) {
            var isConfirmDelete = confirm('Удалить позицию?');
            if (isConfirmDelete) {
                dev4UService.defaultDelete(id, 'trainer');
            }
        }
    }
]);