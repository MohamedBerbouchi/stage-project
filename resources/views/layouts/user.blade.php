<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}
    @include('layouts.head')
    <style type="text/css">
               .input-elevated{
font-size: 16px;
line-height: 1.5;
border: none;
background: #FFFFFF;
background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 20 20'><path fill='%23838D99' d='M13.22 14.63a8 8 0 1 1 1.41-1.41l4.29 4.29a1 1 0 1 1-1.41 1.41l-4.29-4.29zm-.66-2.07a6 6 0 1 0-8.49-8.49 6 6 0 0 0 8.49 8.49z'></path></svg>");
background-repeat: no-repeat;
background-position: 10px 10px;
background-size: 20px 20px;
box-shadow: 0 2px 4px 0 rgba(0,0,0,0.08);
border-radius: 5px;
width: 300px;
padding: .5em 1em .5em 2.5em;
} 

.input-elevated::placeholder{
  color: #838D99;
}

.input-elevated:focus {
  outline: none;
  box-shadow: 0 4px 10px 0 rgba(0,0,0,0.16);
}
    </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">IKS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('defaut.create')}}">defauts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  " aria-current="page" href="{{route('logout')}}">se deconnecter</a>
           

          </li>
          
           
        </ul>
      </div>
    </div>
  </nav>
  <div class="content mt-5">
    <div class="container-fluid"> 
    @yield('content')
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    @include('layouts.script')
</body>
</html>

