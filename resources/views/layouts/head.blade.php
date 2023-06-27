<!--     Fonts and icons     -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<!-- CSS Files -->
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/light-bootstrap-dashboard.css?v=2.0.0') }} " rel="stylesheet" />
<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/statistique.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

<style>
    button{
    cursor: pointer;

  
}
.modal-backdrop {
    position: relative;
}
body
{
    overflow: hidden;
}
.btn{
    max-height: 50px
}
 
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

@yield('css')
