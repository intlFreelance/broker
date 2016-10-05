<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', 'Client:') !!}
    {!! Form::select('client_id',$clients, null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('producer', 'Primary Producer:') !!}
    {!! Form::select('producer_id',$producers, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12 ">
    <h4 style="margin-bottom:25px">Terms <a class="btn btn-primary btn-sm pull-right" ng-click="addTerm()"><i class="fa fa-plus"></i> Add Terms</a></h4>
    <div ng-repeat="term in terms" class="row terms well">
      <div class="row">
        <div class="col-sm-6">
          Provider: <select class="form-control" name="provider" ng-model="term.provider" ng-change="new_producer(term.provider)">
                      <option>Blue Cross Blue Shield</option>
                      <option value="new">+ New Provider</option>
                    </select>
        </div>
        <div class="col-sm-6">
          Services: <select class="form-control" name="services" ng-model="term.service" ng-change="new_service(term.service)">
                    <option>Service 1</option>
                    <option>Medical</option>
                    <option value="new">+ New Service</option>
                    </select>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          Start Date: <input type="date" name="start_date" ng-model="term.start_date" class="form-control"/>
        </div>
        <div class="col-sm-3">
          End Date: <input type="date" name="end_date"  ng-model="term.end_date" class="form-control"/>
        </div>
        <div class="col-sm-3">
          Amount:
          <div class="input-group">
            <span class="input-group-addon">$</span>
            <input type="text" name="amount" class="form-control" ng-model="term.amount" placeholder="500.00">
          </div>
        </div>
        <div class="col-sm-3">
          Frequency:
          <select class="form-control" name="frequency" ng-model="term.frequency">
            <option value="12">Monthly</option>
            <option value="4">Quarterly</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-2">
          Estimated Total: <div class="form-control disabled" style="background-color:#DDD; text-align:right;">$<%term.amount*term.frequency%></div>
        </div>
        <div class="col-sm-2">
          Producer: {!! Form::select('producer_id',$producers, null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-2">
          Producer Split:
          <div class="input-group">
            <input type="text" name="split" class="form-control" ng-model="term.split" placeholder="10">
            <span class="input-group-addon">%</span>
          </div>
        </div>
        <div class="col-sm-2">
          Producer Total:
          <div class="form-control disabled" style="background-color:#DDD; text-align:right;">$<%(term.amount*term.frequency)*(0.01*term.split)%></div>
        </div>
        <div class="col-sm-2">
          Remaining Total:
          <div class="form-control disabled" style="background-color:#DDD; text-align:right;">$<%(term.amount*term.frequency)*(0.01*(100-term.split-(term.split2*term.second_pro)))%></div>
        </div>
        <div class="col-sm-2" ng-hide="term.second_pro != '0'">
          <a href="#" class="btn btn-default btn-sm" style="margin-top:26px;" ng-click="term.second_pro=1"><i class="fa fa-plus"></i> Add Second Producer</a>
        </div>
      </div>
      <div class="row" ng-show="term.second_pro != '0'">
        <div class="col-sm-2 col-sm-offset-2">
          Producer: {!! Form::select('producer_id',$producers, null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-2">
          Producer 2 Split:
          <div class="input-group">
            <input type="text" name="split" class="form-control" ng-model="term.split2" placeholder="10">
            <span class="input-group-addon">%</span>
          </div>
        </div>
        <div class="col-sm-2">
          Producer 2 Total:
          <div class="form-control disabled" style="background-color:#DDD; text-align:right;">$<%(term.amount*term.frequency)*(0.01*term.split2)%></div>
        </div>
      </div>
    </div>
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('contracts.index') !!}" class="btn btn-default">Cancel</a>
</div>

<!-- Modal -->
<div class="modal fade" id="myPro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Provider</h4>
      </div>
      <div class="modal-body">
        {!! Form::label('new_producer', 'New Producer:') !!}
        <input type="text" name="new_producer" class="form-control" placeholder="New Producer"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myPro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Service</h4>
      </div>
      <div class="modal-body">
        {!! Form::label('new_producer', 'New Service:') !!}
        <input type="text" name="new_service" class="form-control" placeholder="New Service"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
