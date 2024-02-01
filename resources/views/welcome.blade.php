@extends('layout')

@section('link')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@endsection

@section('header')

<header class="header" style="background-image:url({{asset('images/kisiiun.jpg')}});">
        <div class="header-text">
          <h1>kisii university acadamics <Br> Research</Br></h1>
          <h4>Dashboard of verified news...</h4>
          
        </div>
        <div class="overlay"></div>
      </header>


@endsection



@section('main') 

      <!-- main -->
      <main class="container">
        <h2 class="header-title">Latest Research Posts</h2>
        <section class="cards-blog latest-blog">

        @foreach ($posts as $post)
       
       <div class="card-blog-content">
         <img src="{{asset($post->imagePath)}}" width ="500px" />
         <p>
               {{$post->created_at->diffForHumans()}}
            <span>Written By  {{$post->user->name}} </span>
         </p>
         <h4 style="font-weight: bolder">
           <a href="{{route('single-blog.show',$post)}}">{{$post->title}}</a>
         </h4>
       </div>

 @endforeach

         
        </section>
      </main>

      <!-- Main footer -->
      <footer class="main-footer">
        <div>
          <a href=""><i class="fab fa-facebook-f"></i></a>
          <a href=""><i class="fab fa-instagram"></i></a>
          <a href=""><i class="fab fa-twitter"></i></a>
        </div>
        <small>&copy 2023 Aquila Blog</small>
      </footer>
    </div>
@endsection
    <!-- Click events to menu and close buttons using javaascript-->
    <script>
      document
        .querySelector(".menuButton")
        .addEventListener("click", function () {
          document.querySelector(".sidebar").style.width = "100%";
          document.querySelector(".sidebar").style.zIndex = "5";
        });

      document
        .querySelector(".closeButton")
        .addEventListener("click", function () {
          document.querySelector(".sidebar").style.width = "0";
        });
    </script>
  </body>
</html>
