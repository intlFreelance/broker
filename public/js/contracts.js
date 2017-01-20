var app = angular.module('myApp', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
app.controller('ContractCtrl', function($scope, $http, $window, $filter) {
    $scope.terms= [];
    $scope.id = 0;
    $scope.contract_amount = "";
    $scope.frequency="";
    $scope.amount = "";

    $scope.services = [];
    $scope.providers = [];
    $scope.producers = [];
    $scope.clients = [];

    $scope.startLoad = function($callback){
      $http.get('/services/json/all/').then(function(res){
        $scope.services = res.data;
        $scope.services.push({ 'name': '+ Add Service',  'value': 'new', 'id':'999' });
        $http.get('/providers/json/all/').then(function(res){
          $scope.providers = res.data;
          $scope.providers.push({ 'name': '+ Add Provider',  'value': 'new', 'id':'999' });
          $http.get('/producers/json/all/').then(function(res){
            $scope.producers = res.data;
            $http.get('/clients/json/all/').then(function(res){
              $scope.clients = res.data;
              eval($callback);
            });
          });
        });
      });
    }

    $scope.getTerms = function($id){
      $http.get('/contracts/'+$id+'/terms/').then(function(res){
        angular.forEach(res.data, function(value, key) {
          $scope.terms.push({
            'provider': $filter('filter')($scope.providers, {id: value.provider_id })[0],
            'service': $filter('filter')($scope.services, {id: value.service_id })[0],
            'start_date':new Date(value.start_date),
            'end_date':new Date(value.end_date),
            'amount': value.amount,
            'frequency': value.frequency,
            'split': value.producer1_split,
            'split2': value.producer2_split,
            'second_pro':(value.producer2_id > 0)?'1':'0',
            'contract_amount':'0',
            'producer1_id': $filter('filter')($scope.producers, {id: value.producer1_id })[0],
            'producer2_id': $filter('filter')($scope.producers, {id: value.producer2_id })[0],
          });
        });
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
        'producer1_id': $scope.primary_producer,
        'producer2_id':'0'
      });
    }

    $scope.setBase = function(client_id,producer_id){
      $scope.primary_producer = $filter('filter')($scope.producers, {id: producer_id })[0];
      $scope.client_id = $filter('filter')($scope.clients, {id: client_id })[0];
    }

    $scope.new_producer = function(val) {
      if(val.value=="new"){
        $('#myPro').modal('show');
      }
    };
    $scope.logAction = function() {
      $http.post('/contracts/json/save',{client_id:$scope.client_id.id, producer_id:$scope.primary_producer.id}).then(function(res){
        $scope.contract_id = res.data;
        angular.forEach($scope.terms, function(value, key) {
          var data = {};
          data.contract_id = $scope.contract_id;
          data.provider_id = value.provider.id;
          data.service_id = value.service.id;
          data.start_date = value.start_date;
          data.end_date = value.end_date;
          data.amount = value.amount;
          data.frequency = value.frequency;
          data.producer1_id = value.producer1_id.id;
          data.producer1_split = value.split;
          data.producer2_id = value.producer2_id.id;
          data.producer2_split = value.split2;
          //console.log(data);
          $http.post('/terms',data).then(function(res){
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
      //$scope.services.pop();
      $http.post('/services',{'name':$scope.new_service_name}).then(function(res){
        $scope.services.push(res.data);
      });
      //$scope.services.push({ 'name': '+ Add Service',  'value': 'new', 'id':'999' });
      $('#myServ').modal('hide');
    };

    $scope.saveProvider = function(val) {
      //$scope.providers.pop();
      $http.post('/providers',{'name':$scope.new_pro_name}).then(function(res){
        $scope.providers.push(res.data);
      });
      //$scope.providers.push({ 'name': '+ Add Service',  'value': 'new', 'id':'999' });
      $('#myPro').modal('hide');
    };

});
