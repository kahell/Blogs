@extends('admin.layouts.app')

@section('custom_css')
  @parent
  <link href="{{asset('admin/css/plugins/summernote/summernote.css')}}" rel="stylesheet">
  <link href="{{asset('admin/css/plugins/summernote/summernote-bs3.css')}}" rel="stylesheet">
  <link href="{{asset('admin/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
@endsection

@section('page-bg', 'gray-bg')
@section('header-bg', 'gray-bg')

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
        <li class="active">
          <a href="{{ route('category.index')}}"><i class="fa fa-diamond"></i> <span class="nav-label">Categories</span></a>
        </li>
        <li >
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
  <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
      <h2>Category</h2>
      <ol class="breadcrumb">
        <li>
          <a>Category</a>
        </li>
        <li class="active">
          <strong>Add Category</strong>
        </li>
      </ol>
    </div>
    <div class="col-lg-2">

    </div>

  </div>
  <div class="wrapper wrapper-content">

    <div class="row">
      <div class="ibox float-e-margins">

        <div class="ibox-title">
          <h5>Titles</h5>
          <div class="ibox-tools">
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>
          </div>
        </div>

        @include('includes.messages')

        <div class="ibox-content">
          <form method="post" action="{{ route('category.store')}}" class="form-horizontal">
            {{csrf_field()}}
            <div class="row">

              <div class="col-sm-12">
                <div class="form-group">
                  <label class="col-sm-2 ">Category Title</label>
                  <div class="col-sm-10">
                    <input type="text" id="title" name="title" placeholder="Enter Category" class="form-control">
                  </div>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="form-group">
                  <label class="col-sm-2 ">Category Slug</label>
                  <div class="col-sm-10">
                    <input type="text" id="subTitle" name="subTitle" placeholder="Enter Category slug" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12">
                    <button class="btn btn-primary" type="submit" style="text-align: right;">Save</button>
                    <a class="btn btn-warning" href="{{route('category.index')}}" style="text-align: right;">Back</a>

                  </div>
                </div>
              </div>

            </div>
          </form>

        </div>

      </div>
    </div>

  </div>

@endsection

@section('custom_js')
  @parent
  <!-- SUMMERNOTE -->
  <script src="{{ asset('admin/js/plugins/summernote/summernote.min.js')}}"></script>
@endsection
