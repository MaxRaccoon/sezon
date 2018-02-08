app.controller('galleryController', ['$scope', 'dev4UService', '$http', 'API_URL', 'Upload',
    function($scope, dev4UService, $http, API_URL, Upload) {

        var imageData;

        $scope.updateList = function () {
            $http({
                method: 'GET',
                url: API_URL + "gallery/list"
            }).then(function (response){
                $scope.galleryItems = response.data;
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
                'gallery',
                {'add':'Добавить','edit':'Редактировать'}
            );
        };

        //save new record / update existing record
        $scope.save = function(modalstate, id) {
            if (typeof $scope.gallery == typeof undefined) {
                $scope.gallery = {};
            }
            console.log(imageData);
            $scope.gallery.image_link = imageData.image;
            $scope.gallery.image_thumb_link = imageData.thumb;
            dev4UService.defaultSave(modalstate, $scope.gallery, 'gallery');
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
                console.log(imageData);
                $scope.image_link = resp.data.image;
                $scope.image_thumb_link = resp.data.thumb;
            }, function (resp) {
                console.log('Error status: ' + resp.status);
            }, function (evt) {
                var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
                console.log('progress: ' + progressPercentage + '% ' + evt.config.data.file.name);
            });
        };

        //delete record
        $scope.confirmDelete = function(id) {
            var isConfirmDelete = confirm('Удалить позицию меню?');
            if (isConfirmDelete) {
                dev4UService.defaultDelete(id, 'gallery');
            }
        }
    }
]);