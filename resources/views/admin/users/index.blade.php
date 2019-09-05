@extends('admin.layouts.admin')

@section('title', __('views.admin.users.index.title'))

@section('content')
    <div class="row" id="userss">
      <button type="button" name="button" onclick="myFunction()">Agregar</button>
      <button type="button" name="button" onclick="verContact()">Ver Transportistas</button>
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>@sortablelink('email', __('views.admin.users.index.table_header_0'),['page' => $users->currentPage()])</th>
                <th>@sortablelink('name',  __('views.admin.users.index.table_header_1'),['page' => $users->currentPage()])</th>
                <th>{{ __('views.admin.users.index.table_header_2') }}</th>
                <th>@sortablelink('active', __('views.admin.users.index.table_header_3'),['page' => $users->currentPage()])</th>
                <th>@sortablelink('confirmed', __('views.admin.users.index.table_header_4'),['page' => $users->currentPage()])</th>
                <th>@sortablelink('created_at', __('views.admin.users.index.table_header_5'),['page' => $users->currentPage()])</th>
                <th>@sortablelink('updated_at', __('views.admin.users.index.table_header_6'),['page' => $users->currentPage()])</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->roles->pluck('name')->implode(',') }}</td>
                    <td>
                        @if($user->active)
                            <span class="label label-primary">{{ __('views.admin.users.index.active') }}</span>
                        @else
                            <span class="label label-danger">{{ __('views.admin.users.index.inactive') }}</span>
                        @endif
                    </td>
                    <td>
                        @if($user->confirmed)
                            <span class="label label-success">{{ __('views.admin.users.index.confirmed') }}</span>
                        @else
                            <span class="label label-warning">{{ __('views.admin.users.index.not_confirmed') }}</span>
                        @endif</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.users.show', [$user->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.show') }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-xs btn-info" href="{{ route('admin.users.edit', [$user->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        @if(!$user->hasRole('administrator'))
                            <a href="{{ route('admin.users.destroy', [$user->id]) }}" class="btn btn-xs btn-danger user_destroy" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.delete') }}">
                                <i class="fa fa-trash"></i>
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            {{ $users->links() }}
        </div>
        <div class="row">
          <div class="col-md-6 col-xs-12 hidden" id="registrar">
            <div class="x_panel">

            <div class="x_title">
            <h2>Registration Form <small>Click to validate</small></h2>
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
            <div class="x_content" style="display: block;">

            <form id="demo-form" data-parsley-validate="" novalidate="">
            <label for="fullname">Full Name * :</label>
            <input type="text" id="fullname" class="form-control" name="fullname" required="">
            <label for="email">Email * :</label>
            <input type="email" id="email" class="form-control" name="email" data-parsley-trigger="change" required="">
            <p>
            <label for="heard">Rol *:</label>
            <select id="heard" class="form-control" required="">
            <option value="">Choose..</option>
            <option value="press">Transportista</option>
            <option value="net">Embarcador</option>
            <option value="mouth">Proveedor</option>
            <option value="mouth">Cliente</option>
            </select>
            <label for="message">Adicional Description (20 chars min, 100 max) :</label>
            <textarea id="message" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"></textarea>
            <br>
            <span class="btn btn-primary">Validate form</span>
            </p></form>

            </div>
</div>
</div>
        </div>
    </div>
    <div class="row hidden" id="contac">
      <button type="button" name="button" onclick="verShipps()">Ver Envios</button>
      <div class="col-md-12 hidden" id="shipps">
      <div class="x_panel">

  <div class="x_title">
  <h2>Calendar Events <small>Sessions</small></h2>
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
  <div id="calendar" class="fc fc-unthemed fc-ltr"><div class="fc-toolbar fc-header-toolbar"><div class="fc-left"><div class="fc-button-group"><button type="button" class="fc-prev-button fc-button fc-state-default fc-corner-left"><span class="fc-icon fc-icon-left-single-arrow"></span></button><button type="button" class="fc-next-button fc-button fc-state-default fc-corner-right"><span class="fc-icon fc-icon-right-single-arrow"></span></button></div><button type="button" class="fc-today-button fc-button fc-state-default fc-corner-left fc-corner-right fc-state-disabled" disabled="">today</button></div><div class="fc-right"><div class="fc-button-group"><button type="button" class="fc-month-button fc-button fc-state-default fc-corner-left fc-state-active">month</button><button type="button" class="fc-agendaWeek-button fc-button fc-state-default">week</button><button type="button" class="fc-agendaDay-button fc-button fc-state-default">day</button><button type="button" class="fc-listMonth-button fc-button fc-state-default fc-corner-right">list</button></div></div><div class="fc-center"><h2>September 2019</h2></div><div class="fc-clear"></div></div><div class="fc-view-container" style=""><div class="fc-view fc-month-view fc-basic-view" style=""><table><thead class="fc-head"><tr><td class="fc-head-container fc-widget-header"><div class="fc-row fc-widget-header"><table><thead><tr><th class="fc-day-header fc-widget-header fc-sun"><span>Sun</span></th><th class="fc-day-header fc-widget-header fc-mon"><span>Mon</span></th><th class="fc-day-header fc-widget-header fc-tue"><span>Tue</span></th><th class="fc-day-header fc-widget-header fc-wed"><span>Wed</span></th><th class="fc-day-header fc-widget-header fc-thu"><span>Thu</span></th><th class="fc-day-header fc-widget-header fc-fri"><span>Fri</span></th><th class="fc-day-header fc-widget-header fc-sat"><span>Sat</span></th></tr></thead></table></div></td></tr></thead><tbody class="fc-body"><tr><td class="fc-widget-content"><div class="fc-scroller fc-day-grid-container" style="overflow: hidden; height: 491px;"><div class="fc-day-grid fc-unselectable"><div class="fc-row fc-week fc-widget-content" style="height: 81px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2019-09-01"></td><td class="fc-day fc-widget-content fc-mon fc-today fc-state-highlight" data-date="2019-09-02"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2019-09-03"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2019-09-04"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2019-09-05"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2019-09-06"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2019-09-07"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2019-09-01"><span class="fc-day-number">1</span></td><td class="fc-day-top fc-mon fc-today fc-state-highlight" data-date="2019-09-02"><span class="fc-day-number">2</span></td><td class="fc-day-top fc-tue fc-future" data-date="2019-09-03"><span class="fc-day-number">3</span></td><td class="fc-day-top fc-wed fc-future" data-date="2019-09-04"><span class="fc-day-number">4</span></td><td class="fc-day-top fc-thu fc-future" data-date="2019-09-05"><span class="fc-day-number">5</span></td><td class="fc-day-top fc-fri fc-future" data-date="2019-09-06"><span class="fc-day-number">6</span></td><td class="fc-day-top fc-sat fc-future" data-date="2019-09-07"><span class="fc-day-number">7</span></td></tr></thead><tbody><tr><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable"><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">All Day Event</span></div></a></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable"><div class="fc-content"><span class="fc-time">10:30a</span> <span class="fc-title">Meeting</span></div></a></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable"><div class="fc-content"><span class="fc-time">7p</span> <span class="fc-title">Birthday Party</span></div></a></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 81px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2019-09-08"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2019-09-09"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2019-09-10"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2019-09-11"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2019-09-12"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2019-09-13"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2019-09-14"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-future" data-date="2019-09-08"><span class="fc-day-number">8</span></td><td class="fc-day-top fc-mon fc-future" data-date="2019-09-09"><span class="fc-day-number">9</span></td><td class="fc-day-top fc-tue fc-future" data-date="2019-09-10"><span class="fc-day-number">10</span></td><td class="fc-day-top fc-wed fc-future" data-date="2019-09-11"><span class="fc-day-number">11</span></td><td class="fc-day-top fc-thu fc-future" data-date="2019-09-12"><span class="fc-day-number">12</span></td><td class="fc-day-top fc-fri fc-future" data-date="2019-09-13"><span class="fc-day-number">13</span></td><td class="fc-day-top fc-sat fc-future" data-date="2019-09-14"><span class="fc-day-number">14</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 81px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2019-09-15"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2019-09-16"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2019-09-17"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2019-09-18"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2019-09-19"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2019-09-20"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2019-09-21"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-future" data-date="2019-09-15"><span class="fc-day-number">15</span></td><td class="fc-day-top fc-mon fc-future" data-date="2019-09-16"><span class="fc-day-number">16</span></td><td class="fc-day-top fc-tue fc-future" data-date="2019-09-17"><span class="fc-day-number">17</span></td><td class="fc-day-top fc-wed fc-future" data-date="2019-09-18"><span class="fc-day-number">18</span></td><td class="fc-day-top fc-thu fc-future" data-date="2019-09-19"><span class="fc-day-number">19</span></td><td class="fc-day-top fc-fri fc-future" data-date="2019-09-20"><span class="fc-day-number">20</span></td><td class="fc-day-top fc-sat fc-future" data-date="2019-09-21"><span class="fc-day-number">21</span></td></tr></thead><tbody><tr><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable"><div class="fc-content"><span class="fc-time">12p</span> <span class="fc-title">Lunch</span></div></a></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 81px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2019-09-22"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2019-09-23"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2019-09-24"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2019-09-25"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2019-09-26"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2019-09-27"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2019-09-28"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-future" data-date="2019-09-22"><span class="fc-day-number">22</span></td><td class="fc-day-top fc-mon fc-future" data-date="2019-09-23"><span class="fc-day-number">23</span></td><td class="fc-day-top fc-tue fc-future" data-date="2019-09-24"><span class="fc-day-number">24</span></td><td class="fc-day-top fc-wed fc-future" data-date="2019-09-25"><span class="fc-day-number">25</span></td><td class="fc-day-top fc-thu fc-future" data-date="2019-09-26"><span class="fc-day-number">26</span></td><td class="fc-day-top fc-fri fc-future" data-date="2019-09-27"><span class="fc-day-number">27</span></td><td class="fc-day-top fc-sat fc-future" data-date="2019-09-28"><span class="fc-day-number">28</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" href="http://google.com/"><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">Click for Google</span></div></a></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 81px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2019-09-29"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2019-09-30"></td><td class="fc-day fc-widget-content fc-tue fc-other-month fc-future" data-date="2019-10-01"></td><td class="fc-day fc-widget-content fc-wed fc-other-month fc-future" data-date="2019-10-02"></td><td class="fc-day fc-widget-content fc-thu fc-other-month fc-future" data-date="2019-10-03"></td><td class="fc-day fc-widget-content fc-fri fc-other-month fc-future" data-date="2019-10-04"></td><td class="fc-day fc-widget-content fc-sat fc-other-month fc-future" data-date="2019-10-05"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-future" data-date="2019-09-29"><span class="fc-day-number">29</span></td><td class="fc-day-top fc-mon fc-future" data-date="2019-09-30"><span class="fc-day-number">30</span></td><td class="fc-day-top fc-tue fc-other-month fc-future" data-date="2019-10-01"><span class="fc-day-number">1</span></td><td class="fc-day-top fc-wed fc-other-month fc-future" data-date="2019-10-02"><span class="fc-day-number">2</span></td><td class="fc-day-top fc-thu fc-other-month fc-future" data-date="2019-10-03"><span class="fc-day-number">3</span></td><td class="fc-day-top fc-fri fc-other-month fc-future" data-date="2019-10-04"><span class="fc-day-number">4</span></td><td class="fc-day-top fc-sat fc-other-month fc-future" data-date="2019-10-05"><span class="fc-day-number">5</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 86px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-other-month fc-future" data-date="2019-10-06"></td><td class="fc-day fc-widget-content fc-mon fc-other-month fc-future" data-date="2019-10-07"></td><td class="fc-day fc-widget-content fc-tue fc-other-month fc-future" data-date="2019-10-08"></td><td class="fc-day fc-widget-content fc-wed fc-other-month fc-future" data-date="2019-10-09"></td><td class="fc-day fc-widget-content fc-thu fc-other-month fc-future" data-date="2019-10-10"></td><td class="fc-day fc-widget-content fc-fri fc-other-month fc-future" data-date="2019-10-11"></td><td class="fc-day fc-widget-content fc-sat fc-other-month fc-future" data-date="2019-10-12"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-other-month fc-future" data-date="2019-10-06"><span class="fc-day-number">6</span></td><td class="fc-day-top fc-mon fc-other-month fc-future" data-date="2019-10-07"><span class="fc-day-number">7</span></td><td class="fc-day-top fc-tue fc-other-month fc-future" data-date="2019-10-08"><span class="fc-day-number">8</span></td><td class="fc-day-top fc-wed fc-other-month fc-future" data-date="2019-10-09"><span class="fc-day-number">9</span></td><td class="fc-day-top fc-thu fc-other-month fc-future" data-date="2019-10-10"><span class="fc-day-number">10</span></td><td class="fc-day-top fc-fri fc-other-month fc-future" data-date="2019-10-11"><span class="fc-day-number">11</span></td><td class="fc-day-top fc-sat fc-other-month fc-future" data-date="2019-10-12"><span class="fc-day-number">12</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div></div></div></td></tr></tbody></table></div></div></div>
  </div>

      </div>
      </div>
<div class="col-md-12" id="cont">
<div class="x_panel">
<div class="x_content">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12 text-center">
<ul class="pagination pagination-split">
<li><a href="#">A</a></li>
<li><a href="#">B</a></li>
<li><a href="#">C</a></li>
<li><a href="#">D</a></li>
<li><a href="#">E</a></li>
<li>...</li>
<li><a href="#">W</a></li>
<li><a href="#">X</a></li>
<li><a href="#">Y</a></li>
<li><a href="#">Z</a></li>
</ul>
</div>
<div class="clearfix"></div>
<div class="col-md-4 col-sm-4 col-xs-12 profile_details">
<div class="well profile_view">
<div class="col-sm-12">
<h4 class="brief"><i>Transport</i></h4>
<div class="left col-xs-7">
<h2>Nicole Pearson</h2>
<p><strong>About: </strong> Web Designer / UX / Graphic Artist / Coffee Lover </p>
<ul class="list-unstyled">
<li><i class="fa fa-building"></i> Address: </li>
<li><i class="fa fa-phone"></i> Phone #: </li>
</ul>
</div>
<div class="right col-xs-5 text-center">
<img src="{{ auth()->user()->avatar }}" alt="">
</div>
</div>
<div class="col-xs-12 bottom text-center">
<div class="col-xs-12 col-sm-6 emphasis">
<p class="ratings">
<a>4.0</a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star-o"></span></a>
</p>
</div>
<div class="col-xs-12 col-sm-6 emphasis">
 <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
</i> <i class="fa fa-comments-o"></i> </button>
<button type="button" class="btn btn-primary btn-xs">
<i class="fa fa-user"> </i> View Profile
</button>
</div>
</div>
</div>
</div>
<div class="col-md-4 col-sm-4 col-xs-12 profile_details">
<div class="well profile_view">
<div class="col-sm-12">
<h4 class="brief"><i>Transport</i></h4>
<div class="left col-xs-7">
<h2>Nicole Pearson</h2>
<p><strong>About: </strong> Web Designer / UI. </p>
<ul class="list-unstyled">
<li><i class="fa fa-building"></i> Address: </li>
<li><i class="fa fa-phone"></i> Phone #: </li>
</ul>
</div>
<div class="right col-xs-5 text-center">
<img src="{{ auth()->user()->avatar }}" alt="">
</div>
</div>
<div class="col-xs-12 bottom text-center">
<div class="col-xs-12 col-sm-6 emphasis">
<p class="ratings">
<a>4.0</a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star-o"></span></a>
</p>
</div>
<div class="col-xs-12 col-sm-6 emphasis">
<button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
</i> <i class="fa fa-comments-o"></i> </button>
<button type="button" class="btn btn-primary btn-xs">
<i class="fa fa-user"> </i> View Profile
</button>
</div>
</div>
</div>
</div>
<div class="col-md-4 col-sm-4 col-xs-12 profile_details">
<div class="well profile_view">
<div class="col-sm-12">
<h4 class="brief"><i>Transport</i></h4>
<div class="left col-xs-7">
<h2>Nicole Pearson</h2>
<p><strong>About: </strong> Web Designer / UI. </p>
<ul class="list-unstyled">
<li><i class="fa fa-building"></i> Address: </li>
<li><i class="fa fa-phone"></i> Phone #: </li>
</ul>
</div>
<div class="right col-xs-5 text-center">
<img src="{{ auth()->user()->avatar }}" alt="">
</div>
</div>
<div class="col-xs-12 bottom text-center">
<div class="col-xs-12 col-sm-6 emphasis">
<p class="ratings">
<a>4.0</a>
<a href="#"><span class="fa fa-star"></span></a>
 <a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star-o"></span></a>
</p>
</div>
<div class="col-xs-12 col-sm-6 emphasis">
<button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
</i> <i class="fa fa-comments-o"></i> </button>
<button type="button" class="btn btn-primary btn-xs">
<i class="fa fa-user"> </i> View Profile
</button>
</div>
</div>
</div>
</div>
<div class="col-md-4 col-sm-4 col-xs-12 profile_details">
<div class="well profile_view">
<div class="col-sm-12">
<h4 class="brief"><i>Transport</i></h4>
<div class="left col-xs-7">
<h2>Nicole Pearson</h2>
<p><strong>About: </strong> Web Designer / UI. </p>
<ul class="list-unstyled">
<li><i class="fa fa-building"></i> Address: </li>
<li><i class="fa fa-phone"></i> Phone #: </li>
</ul>
</div>
<div class="right col-xs-5 text-center">
<img src="{{ auth()->user()->avatar }}" alt="">
</div>
</div>
<div class="col-xs-12 bottom text-center">
<div class="col-xs-12 col-sm-6 emphasis">
<p class="ratings">
<a>4.0</a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star-o"></span></a>
</p>
</div>
<div class="col-xs-12 col-sm-6 emphasis">
<button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
</i> <i class="fa fa-comments-o"></i> </button>
<button type="button" class="btn btn-primary btn-xs">
<i class="fa fa-user"> </i> View Profile
</button>
</div>
</div>
</div>
</div>
<div class="col-md-4 col-sm-4 col-xs-12 profile_details">
<div class="well profile_view">
<div class="col-sm-12">
<h4 class="brief"><i>Transport</i></h4>
<div class="left col-xs-7">
<h2>Nicole Pearson</h2>
<p><strong>About: </strong> Web Designer / UX / Graphic Artist / Coffee Lover </p>
<ul class="list-unstyled">
<li><i class="fa fa-building"></i> Address: </li>
<li><i class="fa fa-phone"></i> Phone #: </li>
</ul>
</div>
<div class="right col-xs-5 text-center">
 <img src="{{ auth()->user()->avatar }}" alt="">
</div>
</div>
<div class="col-xs-12 bottom text-center">
<div class="col-xs-12 col-sm-6 emphasis">
<p class="ratings">
<a>4.0</a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star-o"></span></a>
</p>
</div>
<div class="col-xs-12 col-sm-6 emphasis">
<button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
</i> <i class="fa fa-comments-o"></i> </button>
<button type="button" class="btn btn-primary btn-xs">
<i class="fa fa-user"> </i> View Profile
</button>
</div>
</div>
</div>
</div>
<div class="col-md-4 col-sm-4 col-xs-12 profile_details">
<div class="well profile_view">
<div class="col-sm-12">
<h4 class="brief"><i>Transport</i></h4>
<div class="left col-xs-7">
<h2>Nicole Pearson</h2>
<p><strong>About: </strong> Web Designer / UI. </p>
<ul class="list-unstyled">
<li><i class="fa fa-building"></i> Address: </li>
<li><i class="fa fa-phone"></i> Phone #: </li>
</ul>
</div>
<div class="right col-xs-5 text-center">
<img src="images/user.png" alt="" class="img-circle img-responsive">
</div>
</div>
<div class="col-xs-12 bottom text-center">
<div class="col-xs-12 col-sm-6 emphasis">
<p class="ratings">
<a>4.0</a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star-o"></span></a>
</p>
</div>
<div class="col-xs-12 col-sm-6 emphasis">
<button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
</i> <i class="fa fa-comments-o"></i> </button>
<button type="button" class="btn btn-primary btn-xs">
<i class="fa fa-user"> </i> View Profile
</button>
</div>
</div>
</div>
</div>
<div class="col-md-4 col-sm-4 col-xs-12 profile_details">
<div class="well profile_view">
<div class="col-sm-12">
<h4 class="brief"><i>Transport</i></h4>
<div class="left col-xs-7">
<h2>Nicole Pearson</h2>
<p><strong>About: </strong> Web Designer / UI. </p>
<ul class="list-unstyled">
<li><i class="fa fa-building"></i> Address: </li>
<li><i class="fa fa-phone"></i> Phone #: </li>
</ul>
</div>
<div class="right col-xs-5 text-center">
<img src="{{ auth()->user()->avatar }}" alt="">
</div>
</div>
<div class="col-xs-12 bottom text-center">
<div class="col-xs-12 col-sm-6 emphasis">
<p class="ratings">
<a>4.0</a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star-o"></span></a>
</p>
</div>
<div class="col-xs-12 col-sm-6 emphasis">
<button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
</i> <i class="fa fa-comments-o"></i> </button>
<button type="button" class="btn btn-primary btn-xs">
<i class="fa fa-user"> </i> View Profile
</button>
</div>
</div>
</div>
</div>
<div class="col-md-4 col-sm-4 col-xs-12 profile_details">
<div class="well profile_view">
<div class="col-sm-12">
<h4 class="brief"><i>Transport</i></h4>
<div class="left col-xs-7">
<h2>Nicole Pearson</h2>
<p><strong>About: </strong> Web Designer / UI. </p>
<ul class="list-unstyled">
<li><i class="fa fa-building"></i> Address: </li>
<li><i class="fa fa-phone"></i> Phone #: </li>
</ul>
</div>
<div class="right col-xs-5 text-center">
<img src="{{ auth()->user()->avatar }}" alt="">
</div>
</div>
<div class="col-xs-12 bottom text-center">
<div class="col-xs-12 col-sm-6 emphasis">
<p class="ratings">
<a>4.0</a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star-o"></span></a>
</p>
</div>
<div class="col-xs-12 col-sm-6 emphasis">
<button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
</i> <i class="fa fa-comments-o"></i> </button>
<button type="button" class="btn btn-primary btn-xs">
<i class="fa fa-user"> </i> View Profile
</button>
</div>
 </div>
</div>
</div>
<div class="col-md-4 col-sm-4 col-xs-12 profile_details">
<div class="well profile_view">
<div class="col-sm-12">
<h4 class="brief"><i>Transport</i></h4>
<div class="left col-xs-7">
<h2>Nicole Pearson</h2>
<p><strong>About: </strong> Web Designer / UI. </p>
<ul class="list-unstyled">
<li><i class="fa fa-building"></i> Address: </li>
<li><i class="fa fa-phone"></i> Phone #: </li>
</ul>
</div>
<div class="right col-xs-5 text-center">
<img src="{{ auth()->user()->avatar }}" alt="">
</div>
</div>
<div class="col-xs-12 bottom text-center">
<div class="col-xs-12 col-sm-6 emphasis">
<p class="ratings">
<a>4.0</a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star"></span></a>
<a href="#"><span class="fa fa-star-o"></span></a>
</p>
</div>
<div class="col-xs-12 col-sm-6 emphasis">
<button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
</i> <i class="fa fa-comments-o"></i> </button>
<button type="button" class="btn btn-primary btn-xs">
<i class="fa fa-user"> </i> View Profile
</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

    </div>
    <script type="text/javascript">
      function myFunction(){
        var element = document.getElementById("registrar");
        element.classList.remove("hidden");
      }
      function verContact(){
        var cuerpo = document.getElementById("contac");
        var user = document.getElementById("userss");
        cuerpo.classList.remove("hidden");
        user.classList.add("hidden");
      }
      function verShipps(){
        var cuerpo = document.getElementById("shipps");
        var user = document.getElementById("cont");
        cuerpo.classList.remove("hidden");
        user.classList.add("hidden");
      }
    </script>
@endsection
