

@extends(session('utilisateur')->role == "admin" ? 'layouts.master': "layouts.user" )
 

 @section('title')
    modifier reclamation
 @endsection


@section('content')
    
<div class="row d-flex justify-content-center">
  <div class="col-md-8">
<div class="card">
  <div class="card-header d-flex justify-content-between">
      <h4 class="card-title">Modifier Reclamation  Client: {{$reclamation->ref}} </h4>
      <a class="btn btn-info btn-fill text-light" href="{{ route('reclamation.index') }}">liste de defauts</a>
  </div>
  <div class="card-body">
     
      <form action="{{route('reclamation.update', ['id'=> $reclamation->id ])}}" method="post">
        @csrf
         
         <div class="row">
          <div class="col-md-12">
              <div class="form-group">
                  <label>References</label>
                  <input type="text" placeholder="reference" class="form-control @error('ref') is-invalid @enderror" name="ref" value="{{$reclamation->ref}}">
                  @error('ref')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                  @enderror  
              </div>
          </div>
         
        </div>
         <div class="row">
          <div class="col-md-12">
              <div class="form-group">
                  <label>type Anomalie</label>
                  <select name="id_anomalie"   class=" @error('id_anomalie') is-invalid @enderror" style="width:100%"> 
      
                    <option value="">choisir</option>
                    @foreach ($anomalies as $item)
                    <option value="{{$item->id}}" @selected($item->id == $reclamation->id_anomalie)> {{$item->nom}}</option> 
                    @endforeach
                    
                  </select>
                  @error('id_anomalie')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                  @enderror  
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
              <div class="form-group">
                <label>Commentaire</label>
                <textarea placeholder="commentaire ici" class="form-control  @error('commentaire') is-invalid @enderror" rows="10" name="commentaire"     style="height: 150px">{{$reclamation->commentaire}}</textarea>
                @error('commentaire')
                      <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror  
              </div>
            </div>
          </div>
          @if ($reclamation->reponse)
          <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                  <label>reponse</label>
                  <textarea placeholder="commentaire ici" class="form-control  @error('commentaire') is-invalid @enderror" rows="10" name="reponse"     style="height: 150px">{{$reclamation->reponse}}</textarea>
                  @error('reponse')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                  @enderror  
                </div>
              </div>
            </div>
          @endif
          <button type="submit" class="btn btn-info btn-fill pull-right">Enregistrer</button>
           <div class="clearfix"></div>
      </form>
  </div>
</div>
  </div>
</div>

@endsection


@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

    <script>
  // type = ['primary', 'info', 'success', 'warning', 'danger'];
@if (session("success"))
  
demo.showNotification('bottom','right',2, "Reclamation  est modifier", "nc-icon nc-check-2")
@endif
    </script>
@endsection
 