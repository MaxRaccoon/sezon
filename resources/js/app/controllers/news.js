app.controller('newsController', ['$scope', 'dev4UService', '$http', 'API_URL', '$timeout', 'textAngularManager',
    function($scope, dev4UService, $http, API_URL, $timeout, textAngularManager) {

        //retrieve employees listing from API
        $scope.updateList = function () {
            $http({
                method: 'GET',
                url: API_URL + "news/list"
            }).then(function (response){
                $scope.newsList = response.data;
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
                'news',
                {'add':'Добавить данные','edit':'Редактировать данные'}
            );
        };

        //save new record / update existing record
        $scope.save = function(modalstate, id) {
            dev4UService.defaultSave(modalstate, $scope.news, 'news');
        };

        //delete record
        $scope.confirmDelete = function(id) {
            var isConfirmDelete = confirm('Удалить данные?');
            if (isConfirmDelete) {
                dev4UService.defaultDelete(id, 'news');
            }
        }
    }
]);