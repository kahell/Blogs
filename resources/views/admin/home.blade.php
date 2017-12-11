@extends('admin.layouts.app')

@section('page-bg', 'gray-bg')
@section('header-bg', 'white-bg')

@section('navbar_side')
  @parent
  <nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
      <ul class="nav metismenu" id="side-menu">
        <li class="nav-header">
          <div class="dropdown profile-element">
            <span>
              <img alt="image" class="img-circle" src="{{ asset('admin/img/profile_small.jp')}}g" />
            </span>
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Helfi Pangestu</strong>
              </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span>
            </a>
            <ul class="dropdown-menu animated fadeInRight m-t-xs">
              <li><a href="profile.html">Profile</a></li>
              <li><a href="contacts.html">Contacts</a></li>
              <li><a href="mailbox.html">Mailbox</a></li>
              <li class="divider"></li>
              <li><a href="login.html">Logout</a></li>
            </ul>
          </div>
          <div class="logo-element">
            IN+
          </div>
        </li>
        <li>
          <a href="{{ route('post.index')}}"><i class="fa fa-desktop"></i> <span class="nav-label">Posts</span></a>
        </li>
        <li>
          <a href="{{ route('category.index')}}"><i class="fa fa-diamond"></i> <span class="nav-label">Categories</span></a>
        </li>
        <li>
          <a href="{{ route('tag.index')}}"><i class="fa fa-eyedropper"></i> <span class="nav-label">Tags</span></a>
        </li>
        <li>
          <a href="{{ route('user.index')}}"><i class="fa fa-user"></i> <span class="nav-label">Users</span></a>
        </li>
      </ul>
    </div>
  </nav>
@endsection

@section('content')
  @parent
  <div class="wrapper wrapper-content">
    <div class="row">

      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <span class="label label-success pull-right">Monthly</span>
            <h5>Income</h5>
          </div>
          <div class="ibox-content">
            <h1 class="no-margins">40 886,200</h1>
            <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
            <small>Total income</small>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection
