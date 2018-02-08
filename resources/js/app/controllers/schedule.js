app.controller('scheduleController', ['$scope', 'dev4UService', '$http', 'API_URL',
    function($scope, dev4UService, $http, API_URL) {

        if (typeof programId === typeof undefined) {
            console.log("Не объявлен id программы: programId");
        } else {
            $scope.programId = programId;
        }
        $scope.days = [
            { value: 1, label: 'Понедельник' },
            { value: 2, label: 'Вторник' },
            { value: 3, label: 'Среда' },
            { value: 4, label: 'Четверг' },
            { value: 5, label: 'Пятница' },
            { value: 6, label: 'Суббота' },
            { value: 7, label: 'Воскресенье' }
        ];
        $scope.getDay = function (day) {
            for (var i=0;i<$scope.days.length;i++) {
                if ($scope.days[i].value == day) {
                    return $scope.days[i].label;
                }
            }
        },

        $scope.updateList = function () {
            $http({
                method: 'GET',
                url: API_URL + "schedule/list/" + $scope.programId
            }).then(function (response){
                console.log($scope.scheduleList);
                $scope.scheduleList = response.data;
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
                'schedule',
                {'add':'Добавить','edit':'Редактировать'}
            );
        };

        //save new record / update existing record
        $scope.save = function(modalstate, id) {
            $scope.schedule.program_id = programId;
            dev4UService.defaultSave(modalstate, $scope.schedule, 'schedule');
        };

        //delete record
        $scope.confirmDelete = function(id) {
            var isConfirmDelete = confirm('Удалить позицию?');
            if (isConfirmDelete) {
                dev4UService.defaultDelete(id, 'schedule');
            }
        }
    }
]);