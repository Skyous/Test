@extends('admin.layouts.admin')

@section('content')
    <!-- page content -->
    <!-- top tiles -->
    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i> {{ __('views.admin.dashboard.count_agents') }}</span>
            <div class="count green">{{ $counts['users'] }}</div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i>Nuevas Tarifas</span>
            <div class="count green">6</div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i>Bookings | Bookings Pendientes</span>
            <div>
                <span class="count green">{{  $counts['users'] - $counts['users_inactive'] }}</span>
                <span class="count">/</span>
                <span class="count red">{{ $counts['users_inactive'] }}</span>
            </div>
        </div>
    </div>
    <!-- /top tiles -->

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
           <div id="log_activity" class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>{{ __('views.admin.dashboard.sub_title_0') }}</h3>
                    </div>
                    <div class="col-md-6">
                        <div class="date_piker pull-right"
                             style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            <span class="date_piker_label">
                                {{ \Carbon\Carbon::now()->addDays(-6)->format('F j, Y') }} - {{ \Carbon\Carbon::now()->format('F j, Y') }}
                            </span>
                            <b class="caret"></b>
                        </div>
                    </div>
                </div>

                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="chart demo-placeholder" style="width: 100%; height:460px;"></div>
                </div>


                <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                    <div class="x_title">
                        <h2>{{ __('views.admin.dashboard.sub_title_1') }}</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-6">
                        <div>
                            <p>{{ __('views.admin.dashboard.log_level_0') }}</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar log-emergency" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>{{ __('views.admin.dashboard.log_level_1') }}</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar log-alert" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>{{ __('views.admin.dashboard.log_level_2') }}</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar log-critical" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>{{ __('views.admin.dashboard.log_level_3') }}</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="asdasdasd"></div>
                                    <div class="progress-bar log-error" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>{{ __('views.admin.dashboard.log_level_4') }}</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar log-warning" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>{{ __('views.admin.dashboard.log_level_5') }}</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar log-notice" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>{{ __('views.admin.dashboard.log_level_6') }}</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar log-info" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>{{ __('views.admin.dashboard.log_level_7') }}</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar log-debug" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>

    </div>


    <div class="row">

<div class="x_panel">
<div class="x_title">
<h2>Rates Posted <small>Shipping price list</small></h2>
<ul class="nav navbar-right panel_toolbox">
<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
<ul class="dropdown-menu" role="menu">
<li><a href="#">Settings 1</a>
</li>
<li><a href="#">Settings 2</a>
</li>
</ul>
</li>
<li><a class="close-link"><i class="fa fa-close"></i></a>
</li>
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">
<div class="table-responsive">
<table class="table table-striped jambo_table bulk_action">
<thead>
<tr class="headings">
<th>
<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
</th>
<th class="column-title">Shipping </th>
<th class="column-title">Shipping Date </th>
<th class="column-title">Order </th>
<th class="column-title">Shipper Name </th>
<th class="column-title">Status </th>
<th class="column-title">Amount </th>
<th class="column-title no-link last"><span class="nobr">Action</span>
</th>
<th class="bulk-actions" colspan="7">
<a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
</th>
</tr>
</thead>
<tbody>
<tr class="even pointer">
<td class="a-center ">
<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
</td>
<td class=" ">121000040</td>
<td class=" ">May 23, 2014 11:47:56 PM </td>
<td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td>
<td class=" ">John Blank L</td>
<td class=" ">Paid</td>
<td class="a-right a-right ">$7.45</td>
<td class=" last"><a href="#">View</a>
</td>
</tr>
<tr class="odd pointer">
<td class="a-center ">
<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
</td>
<td class=" ">121000039</td>
<td class=" ">May 23, 2014 11:30:12 PM</td>
<td class=" ">121000208 <i class="success fa fa-long-arrow-up"></i>
</td>
<td class=" ">John Blank L</td>
<td class=" ">Paid</td>
<td class="a-right a-right ">$741.20</td>
<td class=" last"><a href="#">View</a>
</td>
</tr>
<tr class="even pointer">
<td class="a-center ">
<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
</td>
<td class=" ">121000038</td>
<td class=" ">May 24, 2014 10:55:33 PM</td>
<td class=" ">121000203 <i class="success fa fa-long-arrow-up"></i>
</td>
<td class=" ">Mike Smith</td>
<td class=" ">Paid</td>
<td class="a-right a-right ">$432.26</td>
<td class=" last"><a href="#">View</a>
</td>
</tr>
<tr class="odd pointer">
<td class="a-center ">
<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
</td>
<td class=" ">121000037</td>
<td class=" ">May 24, 2014 10:52:44 PM</td>
<td class=" ">121000204</td>
<td class=" ">Mike Smith</td>
<td class=" ">Paid</td>
 <td class="a-right a-right ">$333.21</td>
<td class=" last"><a href="#">View</a>
</td>
</tr>
<tr class="even pointer">
<td class="a-center ">
<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
</td>
<td class=" ">121000040</td>
<td class=" ">May 24, 2014 11:47:56 PM </td>
<td class=" ">121000210</td>
<td class=" ">John Blank L</td>
<td class=" ">Paid</td>
<td class="a-right a-right ">$7.45</td>
<td class=" last"><a href="#">View</a>
</td>
</tr>
<tr class="odd pointer">
<td class="a-center ">
<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
</td>
<td class=" ">121000039</td>
<td class=" ">May 26, 2014 11:30:12 PM</td>
<td class=" ">121000208 <i class="error fa fa-long-arrow-down"></i>
</td>
<td class=" ">John Blank L</td>
<td class=" ">Paid</td>
<td class="a-right a-right ">$741.20</td>
<td class=" last"><a href="#">View</a>
</td>
</tr>
<tr class="even pointer">
<td class="a-center ">
<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
</td>
<td class=" ">121000038</td>
<td class=" ">May 26, 2014 10:55:33 PM</td>
<td class=" ">121000203</td>
<td class=" ">Mike Smith</td>
<td class=" ">Paid</td>
<td class="a-right a-right ">$432.26</td>
<td class=" last"><a href="#">View</a>
</td>
</tr>
<tr class="odd pointer">
<td class="a-center ">
<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
</td>
<td class=" ">121000037</td>
<td class=" ">May 26, 2014 10:52:44 PM</td>
<td class=" ">121000204</td>
<td class=" ">Mike Smith</td>
<td class=" ">Paid</td>
<td class="a-right a-right ">$333.21</td>
<td class=" last"><a href="#">View</a>
</td>
</tr>
<tr class="even pointer">
<td class="a-center ">
<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
</td>
<td class=" ">121000040</td>
<td class=" ">May 27, 2014 11:47:56 PM </td>
<td class=" ">121000210</td>
<td class=" ">John Blank L</td>
<td class=" ">Paid</td>
<td class="a-right a-right ">$7.45</td>
<td class=" last"><a href="#">View</a>
</td>
</tr>
<tr class="odd pointer">
<td class="a-center ">
<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
</td>
 <td class=" ">121000039</td>
<td class=" ">May 28, 2014 11:30:12 PM</td>
<td class=" ">121000208</td>
<td class=" ">John Blank L</td>
<td class=" ">Paid</td>
<td class="a-right a-right ">$741.20</td>
<td class=" last"><a href="#">View</a>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>

    </div>
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/dashboard.js')) }}
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection
