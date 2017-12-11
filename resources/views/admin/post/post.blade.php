@extends('admin.layouts.app')

@section('custom_css')
  @parent
  <link href="{{asset('admin/css/plugins/summernote/summernote.css')}}" rel="stylesheet">
  <link href="{{asset('admin/css/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet">
  <link href="{{asset('admin/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
  <link href="{{asset('admin/css/plugins/chosen/chosen.css')}}" rel="stylesheet">
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
              <img alt="image" class="img-circle" src="{{ asset('admin/img/profile_small.jpg')}}" />
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
        <li class="active">
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
  <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
      <h2>Post</h2>
      <ol class="breadcrumb">
        <li>
          <a>Post</a>
        </li>
        <li class="active">
          <strong>Add Post</strong>
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
          <form method="post" action="{{ route('post.store')}}" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-sm-8">
                <div class="form-group">
                  <label class="col-sm-2 ">Post Title</label>
                  <div class="col-sm-10">
                    <input type="text" id="title" name="title" placeholder="Enter title" class="form-control">
                  </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                  <label class="col-sm-2 ">Sub Title</label>
                  <div class="col-sm-10">
                    <input type="text" id="subTitle" name="subTitle" placeholder="Enter sub title" class="form-control">
                  </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                  <label class="col-sm-2 ">Slug</label>
                  <div class="col-sm-10">
                    <input type="text" id="slug" name="slug" placeholder="Enter slug" class="form-control">
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
                        <input type="file" accept="image/*" name="inputImage" id="inputImage" onchange="loadFile(event)" class="hide">
                        Upload new image
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12">
                    <label class="checkbox-inline i-checks"> <input type="checkbox" id="cbPublish" name="cbPublish">  Publish</label>
                  </div>
                </div>
                <div class="hr-line-dashed"></div>

                <div class="form-group">
                  <label class="font-noraml">Selected Tags</label>
                  <div class="input-group">
                    <select data-placeholder="Choose a tags" class="chosen-select" multiple style="width:350px;" tabindex="4" name="tags[]">
                      @foreach ($tags as $tag)
                        <option value="{{$tag->id}}">{{ $tag->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="hr-line-dashed"></div>

                <div class="form-group">
                  <label class="font-noraml">Selected Categories</label>
                  <div class="input-group">
                    <select data-placeholder="Choose a category" class="chosen-select" multiple style="width:350px;" tabindex="4" name="categories[]">
                      @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="hr-line-dashed"></div>

              </div>

            </div> <!-- End row -->

            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                  <div class="ibox-title">
                    <h5>Write post body here</h5>
                    <div class="ibox-tools">
                      <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                      </a>
                    </div>
                  </div>
                  <div class="ibox-content no-padding">

                    <textarea id="editor1" name="bodyPost">
                    </textarea>

                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-12">
                <button class="btn btn-primary" type="submit">Save</button>
                <a class="btn btn-warning" href="{{route('post.index')}}" style="text-align: right;">Back</a>
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
  <script src="{{ asset('admin/js/plugins/summernote/dist/summernote.min.js')}}"></script>
  <script src="{{ asset('admin/js/plugins/summernote/dist/summernote-bs4.min.js')}}"></script>
  <!-- iCheck -->
  <script src="{{ asset('admin/js/plugins/iCheck/icheck.min.js')}}"></script>
  <!-- Choosen -->
  <script src="{{ asset('admin/js/plugins/chosen/chosen.jquery.js')}}"></script>
  <!-- CKEDITOR -->
  <script src="{{ asset('admin/js/plugins/ckeditor/ckeditor.js')}}"></script>
  <script>
  $(document).ready(function(){
    $('.i-checks').iCheck({
      checkboxClass: 'icheckbox_square-green',
      radioClass: 'iradio_square-green',
    });

    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }

    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }

  });

  CKEDITOR.replace( 'editor1' );

  function loadFile(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
  </script>
@endsection
