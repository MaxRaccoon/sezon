app.controller('programPhotoController', ['$scope', 'dev4UService', '$http', 'API_URL', 'Upload',
    function($scope, dev4UService, $http, API_URL, Upload) {

        var imageData;

        if (typeof programId === typeof undefined) {
            console.log("Не объявлен id программы: programId");
        } else {
            $scope.programId = programId;
        }

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
                $scope.photo_thumb_link = resp.data.thumb;
            }, function (resp) {
                console.log('Error status: ' + resp.status);
            }, function (evt) {
                var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
                console.log('progress: ' + progressPercentage + '% ' + evt.config.data.file.name);
            });
        };

        $scope.updateList = function () {
            $http({
                method: 'GET',
                url: API_URL + "programPhoto/list/" + $scope.programId
            }).then(function (response){
                $scope.programPhotoList = response.data;
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
                'programPhoto',
                {'add':'Добавить','edit':'Редактировать'}
            );
        };

        //save new record / update existing record
        $scope.save = function(modalstate, id) {
            if (typeof $scope.programPhoto == typeof undefined) {
                $scope.programPhoto = {};
            }
            $scope.programPhoto.program_id = programId;
            $scope.programPhoto.photo_link = imageData.image;
            $scope.programPhoto.photo_thumb_link = imageData.thumb;
            dev4UService.defaultSave(
                modalstate,
                $scope.programPhoto,
                'programPhoto'
            );
        };

        //delete record
        $scope.confirmDelete = function(id) {
            var isConfirmDelete = confirm('Удалить позицию?');
            if (isConfirmDelete) {
                dev4UService.defaultDelete(id, 'programPhoto');
            }
        }
    }
]);