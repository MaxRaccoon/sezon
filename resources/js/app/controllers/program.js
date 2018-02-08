app.controller('programController', ['$scope', 'dev4UService', '$http', 'API_URL',
    function($scope, dev4UService, $http, API_URL) {

        if (typeof trainerList === typeof undefined) {
            console.log("Не объявлен список тренеров: trainerList");
        } else {
            $scope.trainerList = trainerList;
        }

        $scope.updateList = function () {
            $http({
                method: 'GET',
                url: API_URL + "programs/list"
            }).then(function (response){
                $scope.programs = response.data;
            },function (error){
                console.log(error);
            });
        };
        $scope.updateList();

        //show modal form
        $scope.toggle = function(modalstate, id) {
            console.log($scope.trainerList);
            dev4UService.defaultToggle(
                modalstate,
                id,
                'program',
                {'add':'Добавить','edit':'Редактировать'}
            );
        };

        //save new record / update existing record
        $scope.save = function(modalstate, id) {
            console.log($scope.program);
            dev4UService.defaultSave(modalstate, $scope.program, 'program');
        };

        //delete record
        $scope.confirmDelete = function(id) {
            var isConfirmDelete = confirm('Удалить позицию?');
            if (isConfirmDelete) {
                dev4UService.defaultDelete(id, 'program');
            }
        }
    }
]);