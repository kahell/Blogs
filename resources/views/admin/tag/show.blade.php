@extends('admin.layouts.app')

@section('custom_css')
  @parent
  <link href="{{asset('admin/css/plugins/footable/footable.core.css')}}" rel="stylesheet">
@endsection

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
        <li class="active">
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
            <span class="label label-primary pull-right">
              <a class="text-white" href="{{route('tag.create')}}">Add New</a>
            </span>
            <h5>Tag</h5>
          </div>
          <div class="ibox-content">
            <div class="row">
              <div class="col-lg-12">
                <input type="text" class="form-control input-sm m-b-xs" id="filter"
                placeholder="Search in table">
                <table class="footable table table-stripped" data-page-size="8" data-filter=#filter>
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Tag Name</th>
                      <th>Slug</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($tags as $tag)
                      <tr>
                        <td>{{ $loop->index }}</td>
                        <td>{{ $tag->name}}</td>
                        <td>{{ $tag->slug}}</td>
                        <td>
                          <a href="{{ route('tag.edit', $tag->id)}}"><i class="fa fa-edit text-navy"> Edit </i></a>
                          <form id="delete-form-{{ $tag->id}}" method="post" action={{ route('tag.destroy',$tag->id)}} style="display: none">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                          </form>
                          <a href="" onclick="
                          if(confirm('Are u sure, you want to delete this?'))
                          {
                            event.preventDefault();
                            document.getElementById('delete-form-{{$tag->id}}').submit();
                          }
                          else{
                            event.preventDefault();
                          }"><i class="fa fa-times text-danger">  Delete</i></a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="5">
                        <ul class="pagination pull-right"></ul>
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection


@section('custom_js')
  @parent
  <script src="{{ asset('admin/js/plugins/footable/footable.all.min.js')}}"></script>
  <!-- Page-Level Scripts -->
  <script>
  $(document).ready(function() {
    $('.footable').footable();
  });
  </script>
@endsection
