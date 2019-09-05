@extends('admin.layouts.admin')

@section('title', __('views.galilea.rate.title'))

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Rates & Tariff<small>Add</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        <br>
          <form id="form1" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
            <div class="form-group">
              <div class="col-md-3 col-sm-12 col-xs-12">
                <label class="control-label col-md-5 col-sm-5 col-xs-12">From Country</label>
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <select class="select2_group form-control">
                    <option value="0">From Country</option>
                    @foreach($countries['countries'] as $country)
                    <option value="{{$country->country_code}}">{{$country->country_name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-3 col-sm-12 col-xs-12">
                <label class="control-label col-md-5 col-sm-5 col-xs-12">From Port</label>
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <select class="select2_group form-control">
                    <optgroup label="Alaskan/Hawaiian Time Zone">
                      <option value="AK">Alaska</option>
                      <option value="HI">Hawaii</option>
                    </optgroup>
                    <optgroup label="Pacific Time Zone">
                      <option value="CA">California</option>
                      <option value="NV">Nevada</option>
                      <option value="OR">Oregon</option>
                      <option value="WA">Washington</option>
                    </optgroup>
                  </select>
                </div>
              </div>
              <div class="col-md-3 col-sm-12 col-xs-12">
                <label class="control-label col-md-5 col-sm-5 col-xs-12">To Country</label>
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <select class="select2_group form-control">
                    <option value="0">To Country</option>
                    @foreach($countries['countries'] as $country)
                    <option value="{{$country->country_code}}">{{$country->country_name}}</option>
                    @endforeach
                  </select>
                  </select>
                </div>
              </div>
              <div class="col-md-3 col-sm-12 col-xs-12">
                <label class="control-label col-md-5 col-sm-5 col-xs-12">To Port</label>
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <select class="select2_group form-control">
                    <optgroup label="Alaskan/Hawaiian Time Zone">
                      <option value="AK">Alaska</option>
                      <option value="HI">Hawaii</option>
                    </optgroup>
                    <optgroup label="Pacific Time Zone">
                      <option value="CA">California</option>
                      <option value="NV">Nevada</option>
                      <option value="OR">Oregon</option>
                      <option value="WA">Washington</option>
                    </optgroup>
                  </select>
                </div>
              </div>
            </div>
            <div class="ln_solid"></div>
            <br>
            <div class="form-group">
              <div class="col-md-3 col-sm-12 col-xs-12">
                <label class="control-label col-md-6 col-sm-6 col-xs-12">Airlane | Carrier</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="select2_group form-control">
                    <optgroup label="Alaskan/Hawaiian Time Zone">
                      <option value="AK">Alaska</option>
                      <option value="HI">Hawaii</option>
                    </optgroup>
                    <optgroup label="Pacific Time Zone">
                      <option value="CA">California</option>
                      <option value="NV">Nevada</option>
                      <option value="OR">Oregon</option>
                      <option value="WA">Washington</option>
                    </optgroup>
                  </select>
                </div>
              </div>
              <div class="col-md-3 col-sm-12 col-xs-12">
                <label class="control-label col-md-5 col-sm-5 col-xs-12">20'ST Price</label>
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <input type="text" class="form-control" placeholder="$20">
                </div>
              </div>
              <div class="col-md-3 col-sm-12 col-xs-12">
                <label class="control-label col-md-5 col-sm-5 col-xs-12">40'ST Price</label>
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <input type="text" class="form-control" placeholder="$20">
                </div>
              </div>
              <div class="col-md-3 col-sm-12 col-xs-12">
                <label class="control-label col-md-5 col-sm-5 col-xs-12">40'HQ Price</label>
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <input type="text" class="form-control" placeholder="$20">
                </div>
              </div>
            </div>
            <br>
            <div class="form-group">
              <div class="col-md-3 col-sm-12 col-xs-12">
                <label class="control-label col-md-6 col-sm-6 col-xs-12">Currency</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="select2_group form-control">
                      <option value="CA">USD</option>
                      <option value="NV">EUR</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3 col-sm-12 col-xs-12">
                <label class="control-label col-md-5 col-sm-5 col-xs-12">Transit Time</label>
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <input type="text" class="form-control" placeholder="20 days">
                </div>
              </div>
              <div class="col-md-3 col-sm-12 col-xs-12">
                <label class="control-label col-md-5 col-sm-5 col-xs-12">Include in O/F</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value=""> OTHC
                    </label>
                    <label>
                      <input type="checkbox" value=""> DTHC
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-12 col-xs-12">
                <label class="control-label col-md-6 col-sm-6 col-xs-12">Validity</label>
                  <div class="control-group">
                    <div class="controls">
                      <div class="input-prepend input-group">
                        <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                        <input type="text" style="width: 200px" name="reservation" id="reservation" class="form-control" value="">
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-3 col-sm-12 col-xs-12">
                <label class="control-label col-md-6 col-sm-6 col-xs-12">Import Excel</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <br>
                    <input type="file" data-role="magic-overlay" data-target="#excelBtn" data-edit="insertExcel">
                </div>
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button class="btn btn-primary" type="button">Cancel</button>
            <button class="btn btn-primary" type="reset">Reset</button>
            <button type="submit" class="btn btn-success">Submit</button>
            </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Test Table <small>Rates</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content" style="display: block;">
      </div>
    </div>
  </div>
  </div>
</div>

@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/dashboard.js')) }}
@endsection
