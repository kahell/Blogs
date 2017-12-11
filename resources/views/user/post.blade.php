@extends('user.layouts.app')

@section('custom_css')
  @parent
  <!-- Prism -->
  <link href="{{asset('user/css/prism.css')}}" rel="stylesheet">
@endsection

@section('bg-img', asset('user/img/post-bg.jpg'))
@section('title', $post->title)
@section('sub-heading', $post->subtitle)
@section('meta')
  @parent
  <span class="meta">Posted by
    <a href="#">{{$post->posted_by}}</a>
    on August 24, 2017</span>
@endsection

@section('main-content')
  @parent
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=546966379000208';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <small>Created At {{ $post->created_at->diffForHumans() }}</small>
            @foreach ($post->categories as $category)
              <small class="pull-right" style="margin-right: 20px">
                <a href="{{ route('category',$category->slug)}}"> {{ $category->name}}</a>
              </small>
            @endforeach
          {!! htmlspecialchars_decode($post->body) !!}

          {{-- Tag clouds--}}
          <h3>Tag Clouds</h3>
          @foreach ($post->tags as $tag)
            <small class="pull-left" style="margin-right: 20px; border-radius: 5px; border: 1px solid gray;
            padding: 5px">
              <a href="{{ route('tag',$tag->slug)}}" >{{ $tag->name}}</a>
            </small>
          @endforeach
        </div>
        <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5"></div>
      </div>
    </div>
  </article>

  <hr>
@endsection

@section('custom_js')
  @parent
  <!-- Prism -->
  <script src="{{ asset('user/js/prism.js')}}"></script>
@endsection
