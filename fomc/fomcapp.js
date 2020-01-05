angular.module('fomcApp',[])

.controller('postController', function($scope,$http){
    $scope.url = 'https://www.federalreserve.gov/newsevents/pressreleases/monetary20170201a.htm';
    $scope.words = [{word: 'rate'},{word: 'market'}];
    $scope.wordsappend = '';

    $scope.addWord = function (){
        $scope.words.push({word: ''});
        console.log($scope.words);
        }

    $scope.delWord = function(item) {
    $scope.words.splice(item, 1);
    };

    $scope.grabData = function (){
    $scope.loading = true;

    angular.forEach($scope.words, function(value, key) {
    console.log(value.word);
    if (value.word != ''){$scope.wordsappend += '&word=' + value.word;}
    });

    $scope.urltograb = 'https://yingliu.herokuapp.com/fomc?url=' + $scope.url + $scope.wordsappend
    console.log($scope.urltograb);
            $http({
                method: 'GET', url: $scope.urltograb
            }).then(function(result){
                console.log(result);
                $scope.wordsappend = '';

                $http({
                method: 'GET', url: 'https://yingliu.herokuapp.com/fomcStmt', transformResponse: undefined
                }).then(function(result){
                $scope.stmt = result.data;
                console.log(result);
                });

                chartData = result.data;
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData;
                chart.categoryField = "word";
                chart.startDuration = 1;

                // AXES
                var categoryAxis = chart.categoryAxis;
                categoryAxis.labelRotation = 0;
                categoryAxis.gridPosition = "start";

                // GRAPH
                var graph = new AmCharts.AmGraph();
                graph.valueField = "count";
                graph.balloonText = "[[category]]: <b>[[value]]</b>";
                graph.type = "column";
                graph.fillColors = "#3f51b5";
                graph.lineAlpha = 0;
                graph.fillAlphas = 0.8;
                chart.addGraph(graph);

                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chartCursor.cursorAlpha = 0;
                chartCursor.zoomable = false;
                chartCursor.categoryBalloonEnabled = false;
                chart.addChartCursor(chartCursor);

                chart.write("chartdiv");

                $scope.loading = false;

                console.log($scope.amChartOptions);
            });

        }

});