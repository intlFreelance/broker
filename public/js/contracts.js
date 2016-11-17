var app = angular.module('myApp', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
app.controller('ContractCtrl', function($scope, $http, $window) {
    $scope.terms= [];
    $scope.id = 0;
    $scope.contract_amount = "";
    $scope.primary_producer;
    $scope.frequency="";
    $scope.amount = "";

    $scope.services = [];
    $scope.providers = [];

    $scope.providers.push({ 'label': 'Blue Cross Blue Shield',  'value': 'Blue Cross Blue Shield' });
    $scope.providers.push({ 'label': 'Humana',  'value': 'Humana' });
    $scope.providers.push({ 'label': '+ Add Provider',  'value': 'new' });

    $scope.services.push({ 'label': 'Service 1',  'value': 'Service 1' });
    $scope.services.push({ 'label': '+ Add Service',  'value': 'new' });

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
        'contract_amount':'0',
        'producer_id': $scope.primary_producer
      });
    }

    $scope.new_producer = function(val) {
      if(val.value=="new"){
        $('#myPro').modal('show');
      }
    };
    $scope.logAction = function() {
      $http.post('/contracts/json/save',{client_id:$scope.client_id, producer_id:$scope.primary_producer}).then(function(res){
        $scope.contract_id = res.data;
        angular.forEach($scope.terms, function(value, key) {
          var data = {};
          data.contract_id = $scope.contract_id;
          data.start_date = value.start_date;
          data.end_date = value.end_date;
          data.amount = value.amount;
          data.frequency = value.frequency;
          data.producer_id = value.producer_id;
          data.producer_split = value.split;
          data.provider = value.provider.value;
          data.service = value.service.value;
          $http.post('/contract_payments/json/save',data).then(function(res){
            console.log(res.data);
          });
        });
        $window.location.href = '/contracts';
      });
    };

    $scope.new_service = function(val) {
      if(val.value=="new"){
        $('#myServ').modal('show');
      }
    };

    $scope.saveService = function(val) {
      $scope.services.pop();
      $scope.services.push({ 'label': $scope.new_service_name,  'value': $scope.new_service_name });
      $scope.services.push({ 'label': '+ Add Service',  'value': 'new' });
      $('#myServ').modal('hide');
    };

    $scope.saveProvider = function(val) {
      $scope.providers.pop();
      $scope.providers.push({ 'label': $scope.new_pro_name,  'value': $scope.new_pro_name });
      $scope.providers.push({ 'label': '+ Add Provider',  'value': 'new' });
      $('#myPro').modal('hide');
    };

});
