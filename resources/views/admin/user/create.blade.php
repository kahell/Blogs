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
        <li >
          <a href="{{ route('post.index')}}"><i class="fa fa-diamond"></i> <span class="nav-label">Posts</span></a>
        </li>
        <li>
          <a href="{{ route('category.index')}}"><i class="fa fa-diamond"></i> <span class="nav-label">Categories</span></a>
        </li>
        <li>
          <a href="{{ route('tag.index')}}"><i class="fa fa-diamond"></i> <span class="nav-label">Tags</span></a>
        </li>
        <li class="active">
          <a href="{{ route('user.index')}}"><i class="fa fa-diamond"></i> <span class="nav-label">Users</span></a>
        </li>
      </ul>
    </div>
  </nav>
@endsection

@section('content')
  @parent
  <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
      <h2>Create User</h2>
      <ol class="breadcrumb">
        <li>
          <a>User</a>
        </li>
        <li class="active">
          <strong>Add User</strong>
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
          <h5>User</h5>
          <div class="ibox-tools">
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>
          </div>
        </div>

        <div class="ibox-content">
          <form method="get" class="form-horizontal">
            <div class="row">
              <div class="col-sm-8">
                <div class="form-group">
                  <label class="col-sm-2 ">Title</label>
                  <div class="col-sm-10">
                    <input type="text" id="title" placeholder="Enter title" class="form-control">
                  </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                  <label class="col-sm-2 ">Sub Title</label>
                  <div class="col-sm-10">
                    <input type="text" id="subTitle" placeholder="Enter sub title" class="form-control">
                  </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                  <label class="col-sm-2 ">Slug</label>
                  <div class="col-sm-10">
                    <input type="text" id="slug" placeholder="Enter slug" class="form-control">
                  </div>
                </div>
              </div>

              <div class="col-sm-4">
                <div class="form-group">
                  <div class="col-sm-12">
                    <div class="img-preview img-preview-sm">
                      <img id="output" />
                    </div>
                    <br>
                    <label title="Upload image file" for="inputImage" class="btn btn-primary">
                        <input type="file" accept="image/*" name="file" id="inputImage" onchange="loadFile(event)" class="hide">
                        Upload new image
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <label class="checkbox-inline i-checks"> <input type="checkbox" value="publish">  Publish</label>
                  </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <button class="btn btn-primary" type="submit">Save</button>
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
  <!-- iCheck -->
  <script src="{{ asset('admin/js/plugins/iCheck/icheck.min.js')}}"></script>
  <script>
  $(document).ready(function(){
    $('#summernote').summernote({
      placeholder: 'Hello bootstrap 4'
    });

    $('.i-checks').iCheck({
      checkboxClass: 'icheckbox_square-green',
      radioClass: 'iradio_square-green',
    });
  });

  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
  </script>
@endsection
