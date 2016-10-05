var app = angular.module('myApp', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
app.controller('ContractCtrl', function($scope, $http) {
    $scope.terms= [];
    $scope.id = 0;
    $scope.contract_amount = "";
    $scope.frequency="";
    $scope.amount = "";

    $scope.getTerms = function($id){
      $http.get('/contracts/'+$id+'/terms/').then(function(res){
        $scope.terms = res.data;
      });
    }

    $scope.addTerm = function(){
      var today = new Date();
      var yearOut = new Date();
      yearOut.setDate(today.getDate()+364);
      $scope.terms.push({
        'provider':'0',
        'service':'0',
        'start_date':today,
        'end_date':yearOut,
        'amount':'0',
        'frequency':'',
        'split':'0',
        'split2':'0',
        'second_pro':'0',
        'contract_amount':'0'
      });
    }

    $scope.new_producer = function(val) {
      if(val=="new"){
        $('#myPro').modal('show');
      }
    };

    $scope.new_service = function(val) {
      if(val=="new"){
        $('#myServ').modal('show');
      }
    };

});
