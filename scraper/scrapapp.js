angular.module('scrapApp',[])

.controller('postController', function($scope,$http){

    $scope.url = 'https://ww1.gogoanime.io/pokemon-sun-moon-episode-###';
    $scope.multiple = '0';
    $scope.first = 1;
    $scope.last = 1;
    $scope.path = '//*[@id="wrapper_bg"]/section/section[1]/div[1]/div[2]/h1';
    $scope.cf = '1';

    $scope.grabData = function (){
    $scope.path64 = window.btoa($scope.path);
    $scope.loading = true;
            $http({
                method: 'GET', 
                url: 'https://yingliu.herokuapp.com/scrape',
                params: {url: $scope.url, first: $scope.first, last: $scope.last, path: $scope.path64, cf: $scope.cf}
            }).then(function(result){
                console.log(result);
                $scope.resultset = result.data;
                $scope.loading = false;
            });

        }

});