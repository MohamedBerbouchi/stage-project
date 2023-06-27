 

@extends(session('utilisateur')->role == "admin" ? 'layouts.master': "layouts.user" )
 
@section('title')
Saisir default confection
@endsection

 @section('css')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

 @endsection

@section('content')
    
<div class="row d-flex justify-content-center">
  <div class="col-md-8">
<div class="card">
  <div class="card-header d-flex justify-content-between">
      <h4 class="card-title">Saisir default confection</h4>
      <a class="btn btn-info btn-fill text-light" href="{{ route('defaut.index') }}">liste de defauts</a>
  </div>
  <div class="card-body">
      <form action="{{route('defaut.store')}}" method="post">
        @csrf
         <div class="row">
          <div class="col-md-12">
              <div class="form-group">
                  <label>Operatrice</label>
                  <input type="text" class="form-control @error('operatrice') is-invalid @enderror" name="operatrice"  placeholder="N°matricule" value="{{old('operatrice')}}">
                  @error('operatrice')
                  <div class="alert alert-danger mt-1">{{ $message }}</div>
                  @enderror
              </div>
          </div>
        </div>
         <div class="row">
          <div class="col-md-12">
              <div class="form-group">
                  <label>OF</label>
                  <input type="text" class="form-control @error('of') is-invalid  @enderror" name="of" placeholder="of"  value="{{old('of')}}">
                  @error('of')
                  <div class="alert alert-danger mt-1">{{ $message }}</div>
                  @enderror
              </div>
          </div>
        </div>
         <div class="row">
          <div class="col-md-12">
              <div class="form-group">
                  <label>N program</label>
                  <input type="text" class="form-control  @error('N_programme') is-invalid  @enderror"  name="N_programme" placeholder="N programe"  value="{{old('N_programme')}}">
                  @error('N_programme')
                  <div class="alert alert-danger mt-1">{{ $message }}</div>
                  @enderror
              </div>
          </div>
        </div>
         <div class="row">
          <div class="col-md-12">
              <div class="form-group">
                  <label>quantite</label>
                  <input type="number" class="form-control  @error('quantite') is-invalid  @enderror" name="quantite" placeholder="quantite"  value="{{old('quantite')}}">
                  @error('quantite')
                  <div class="alert alert-danger mt-1">{{ $message }}</div>
                  @enderror
              </div>
          </div>
        </div>
         <div class="row">
          <div class="col-md-12">
              <div class="form-group">
                <label>type defaut</label>
                <select    placeholder="choisir..."  class="  @error('id_defaut') is-invalid  @enderror" name="id_defaut"  style="width:100%" >
                  <option value="" >choisir</option>
                  @foreach ($defauts as $item)
                      
                    <option value="{{$item->id}}" {{old('id_defaut') ? ((old('id_defaut') == $item->id) ? 'selected' : "") : ""}}>{{$item->nom}}</option>
                  @endforeach
          
                </select>
                @error('id_defaut')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
               @enderror
              </div>
          </div>
        </div>
           
          
          <button type="submit" class="btn btn-info btn-fill pull-right">valider</button>
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
  
demo.showNotification('bottom','right',2, "Reclamation  est cree", "nc-icon nc-check-2")
@endif
    </script>

@endsection
 

