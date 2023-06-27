 @extends(session('utilisateur')->role == 'admin' ? 'layouts.master' : 'layouts.user')

 @section('title')
     listes de defauts
 @endsection
 @section('css')
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

 @endsection

 @section('content')
     <div class="row d-flex justify-content-center">
         <div class="col-md-8">
            
            <div class="card" >
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Import utilisatuers </h4>
                    <p style="color:gray">Excel format : Matricule, mot de pass</p>
                    
                </div>
                <div class="card-body">
                    @error('users')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                   @enderror  
                   <form action="{{route('uploadUser')}}" method="post" enctype="multipart/form-data">
                       @csrf
                       <input type="file"  class="form-control" id="" name="users">
                       <button class="btn btn-success  mt-3 d-block ms-auto ">import</button>
                      
                   </form>
                </div>
            </div>
            <div class="card" >
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Import Type Defauts</h4>
                    <p style="color:gray">Excel format : nom de defaut </p>
                    
                </div>
                <div class="card-body">
                    @error('defauts')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                   @enderror  
                   <form action="{{route('uploadDefaut')}}" method="post" enctype="multipart/form-data">
                       @csrf
                       <input type="file"  class="form-control" id="" name="defauts">
                       <button class="btn btn-success  mt-3 d-block ms-auto">import</button>
                       
                   </form>
                </div>
            </div>
            <div class="card" >
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Import Types Anomalies</h4>
                    <p style="color:gray">Excel format : nom de anomalie </p>
                    
                </div>
                <div class="card-body">
                    @error('anomalies')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                   @enderror  
                   <form action="{{route('uploadAnomalie')}}" method="post" enctype="multipart/form-data">
                       @csrf
                       <input type="file"  class="form-control" id="" name="anomalies">
                       <button class="btn btn-success  mt-3 d-block ms-auto">import</button>
                       
                   </form>
                </div>
            </div>
         </div>
     </div>
 @endsection


 @section('script')
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

     <script>

         // type = ['primary', 'info', 'success', 'warning', 'danger'];
         @if (session('success'))

             demo.showNotification('bottom', 'right', 2, "reclamation   est supprimer", "nc-icon nc-check-2")
         @endif
     </script>
 @endsection
