app.controller('newsPhotoController', ['$scope', 'dev4UService', '$http', 'API_URL', 'Upload',
    function($scope, dev4UService, $http, API_URL, Upload) {

        var imageData;

        if (typeof newsId === typeof undefined) {
            console.log("Не объявлен id программы: newsId");
        } else {
            $scope.newsId = newsId;
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
                $("#uploadProgress .progress-bar")
                    .attr("aria-valuenow", progressPercentage)
                    .css("width", progressPercentage + "%")
                    .text(progressPercentage + "%");
                console.log('progress: ' + progressPercentage + '% ' + evt.config.data.file.name);
            });
        };

        $scope.updateList = function () {
            $http({
                method: 'GET',
                url: API_URL + "newsPhoto/list/" + $scope.newsId
            }).then(function (response){
                $scope.newsPhotoList = response.data;
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
                'newsPhoto',
                {'add':'Добавить','edit':'Редактировать'}
            );
        };

        //save new record / update existing record
        $scope.save = function(modalstate, id) {
            if (typeof $scope.newsPhoto == typeof undefined) {
                $scope.newsPhoto = {};
            }
            $scope.newsPhoto.news_id = newsId;
            $scope.newsPhoto.photo_link = imageData.image;
            $scope.newsPhoto.photo_thumb_link = imageData.thumb;
            dev4UService.defaultSave(
                modalstate,
                $scope.newsPhoto,
                'newsPhoto'
            );
        };

        //delete record
        $scope.confirmDelete = function(id) {
            var isConfirmDelete = confirm('Удалить позицию?');
            if (isConfirmDelete) {
                dev4UService.defaultDelete(id, 'newsPhoto');
            }
        }
    }
]);