<!DOCTYPE html>

<html lang="en" ng-app="fomcApp" ng-cloak>



<head>

    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">

    <mete http-equiv="X-UA-Compatible" content="IE=edge">

    <title>FOMC Word Counter</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">

    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.6.2/angular.min.js"></script>

    <script src="fomcapp.js"></script>

    <script src="/amcharts/amcharts.js" type="text/javascript"></script>

    <script src="/amcharts/serial.js" type="text/javascript"></script>

</head>



<style>

.dropshfont {

  color: #FFF;

  text-shadow: none;

  font-weight: 700;

  background-color: rgba(0, 0, 0, 0);

  text-decoration: none;

  border-width: 0px;

  border-color: #000;

  border-style: none;

  text-shadow: -1px 0 1px #000;

}

</style>



<body ng-controller="postController as formData">





<div class="mdl-layout mdl-js-layout">

  <header class="mdl-layout__header mdl-layout__header--scroll">

    <div class="mdl-layout__header-row">

      <div class="mdl-layout-spacer"></div>

      <span class="mdl-layout-title dropshfont">FOMC Statement Word Counter</span>

      <div class="mdl-layout-spacer"></div>

    </div>

  </header>



  <main class="mdl-layout__content">

  <div class="page-content">



  <div class="mdl-grid">

      <div class="mdl-layout-spacer"></div>

  <div class="mdl-cell mdl-cell--5-col  mdl-cell--4-col-tablet">



              <div class="demo-card-wide mdl-card mdl-shadow--2dp" style="padding: 10px; width: 100%; max-width: 500px;">

                <span class="mdl-chip mdl-chip--contact">

                    <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white"></span>

                    <span class="mdl-chip__text" width="100%"><b>Which Words to Count</b></span>

                </span>

              <div class="mdl-card__supporting-text">

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">

                        <input class="mdl-textfield__input" type="url" id="fomc" ng-model="url" required>

                        <label class="mdl-textfield__label" for="fomc">URL to FOMC Statement: </label>

                    </div>

                    <div class="mdl-grid" ng-repeat="word in words">

                      <div class="mdl-cell mdl-cell--4-col mdl-cell--2-col-phone" alight="right">

                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">

                            <input class="mdl-textfield__input" type="text" id="word" name="word" ng-model="word.word">

                            <label ng-show="$first" class="mdl-textfield__label" for="word">Words to Search: </label>  

                            </div>

                      </div>

                      <div class="mdl-cell mdl-cell--4-col mdl-cell--2-col-phone" align="center">

                            <button ng-click="addWord()" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab"><i class="material-icons">add</i></button>

                            <button ng-hide="$first" ng-click="delWord($index)" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored"><i class="material-icons">clear</i></button>

                      </div>

                    </div>

              </div>

              <div class="mdl-card__actions mdl-card--border" align="center">

                    <button ng-click="grabData()" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Submit</button>

                    <div class="mdl-progress mdl-js-progress mdl-progress__indeterminate" style="margin: 5px;" ng-show="loading"></div>

              </div>

            </div>



</div>

<div class="mdl-cell mdl-cell--5-col mdl-cell--4-col-tablet">



            <div class="demo-card-wide mdl-card mdl-shadow--2dp" style="padding: 10px; width: 100%; max-width: 500px;">

                <span class="mdl-chip mdl-chip--contact">

                    <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white"></span>

                    <span class="mdl-chip__text"><b>FOMC Statement Text & Chart</b></span>

                </span>

              <div class="mdl-card__supporting-text">

                <div style="padding: 10px;clear: both;box-sizing: border-box; height:318px; width: 100%;overflow: auto;border: 0">{{stmt}}</div>

              </div>

              <div class="mdl-card__actions mdl-card--border" ng-show="stmt">

                <div id="chartdiv" options="amChartOptions" style="padding: 10px;width: 90%; height: 300px;"></div>

              </div>

            </div>

          </div>



      <div class="mdl-layout-spacer"></div>

</div>



    </div>

  </main>

</div>

</body>

</html>