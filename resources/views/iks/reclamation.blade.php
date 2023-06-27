@extends(session('utilisateur')->role == 'admin' ? 'layouts.master' : 'layouts.user')


@section('title')
    reclamation
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <style>
          .list-group-item.active {
            background-color: #007bff !important;
            border-color: #007bff !important;
          }
        
          .form-check-input:checked + .form-check-label {
            font-weight: bold;
          }
        
          .tab-content {
            border-left: 1px solid #ddd;
            padding-left: 20px;
          }
        
          /* Add background color and padding to the second column */
          .tab-pane {
            background-color: #f8f9fa;
            padding: 20px;
          }
          input[type=checkbox] {
  transform: scale(1.5);
  margin-right: 10px;
}
        </style>
        
@endsection

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Reclamation Client</h4>
                    <a class="btn btn-info btn-fill text-light" href="{{ route('reclamation.index') }}">Liste de
                        reclamations</a>
                </div>
                <div class="card-body">

                    <form action="{{ route('reclamation.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Emails</label>
                                    {{-- <select   class=" @error('email') is-invalid @enderror" name="email" style="width:100%"> 
      
                    <option value="">--select--</option>
                    @foreach ($emails as $key => $value)
                  <option value="{{$value}}" {{old('email') ? ((old('email') == $value) ? 'selected' : "") : ""}}> {{$value}}</option> 
                  @endforeach
                    
                  </select> --}}
                  <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="list-group">
                                @foreach($emails as $key => $values)
                                    <a href="#{{ $key }}-content" class="list-group-item list-group-item-action" data-toggle="list">{{ $key }}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-8">
                             
                                <div class="tab-content"  >
                                    @foreach($emails as $key => $values)
                                        <div class="tab-pane fade" id="{{ $key }}-content"  style="min-width: 310px; overflow:auto">
                                            @foreach($values as $value)
                                                <div>
                                                    <input   type="checkbox"  name="email[]" value="{{ $value }}" id="{{ $value }}">
                                                    <label class="form-check-label" for="{{ $value }}"  >
                                                        {{ $value }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                                
                            
                        </div>
                    </div>
                </div>
                
                
                                    @error('email')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>References</label>
                                    <input type="text" placeholder="reference"
                                        class="form-control @error('ref') is-invalid @enderror" name="ref"
                                        value="{{ old('ref') }}">
                                    @error('ref')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>image</label>
                                    <input type="file" class="form-control @error('ref') is-invalid @enderror"
                                        name="image" accept="image/*">
                                    @error('image')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>type Anomalie</label>
                                    <select name="id_anomalie" class=" @error('id_anomalie') is-invalid @enderror"
                                        style="width:100%">

                                        <option value="">choisir</option>
                                        @foreach ($anomalies as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('email') ? (old('id_anomalie') == $item->id ? 'selected' : '') : '' }}>
                                                {{ $item->nom }}</option>
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
                                    <textarea placeholder="commentaire ici" class="form-control  @error('commentaire') is-invalid @enderror" rows="10"
                                        name="commentaire" style="height: 150px">{{ old('commentaire') }}</textarea>
                                    @error('commentaire')
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
        function toggleEmails(key) {
            var emails = document.getElementById(key);
            if (emails.style.display === 'none') {
                emails.style.display = 'block';
            } else {
                emails.style.display = 'none';
            }
        }
    </script>
    <script>
        // type = ['primary', 'info', 'success', 'warning', 'danger'];
        @if (session('success'))

            demo.showNotification('bottom', 'right', 2, "Reclamation  est cree", "nc-icon nc-check-2")
        @endif
    </script>
@endsection
