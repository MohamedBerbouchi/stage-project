 @extends(session('utilisateur')->role == 'admin' ? 'layouts.master' : 'layouts.user')

 @section('title')
     listes de defauts
 @endsection
 
 

 @section('content')
     <div class="row d-flex justify-content-center">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-header d-md-flex justify-content-between">
                     <h4 class="card-title">List default confection</h4>

                     <a class="btn btn-info btn-fill text-light" href="{{ route('defaut.create') }}">ajouter defauts
                         confection</a>
                 </div>

                <div class="mx-3">
                    <input type="text" name=""  id="search" placeholder="Tapez pour rechercher..." class="input-elevated">                 

                </div>
                 <div class="card-body">
                     <div class="table-responsive table-full-width">
                         <table class="table table-hover" id="table">
                             {{-- protected $fillable = ["operatrice", "of", "N_programme", "id_defaut", "id_utilisateur","quantite"]; --}}

                             <thead>
                                 <th>ID</th>
                                 <th>matricule</th>
                                 <th>of</th>
                                 <th>defaut</th>
                                 <th>quantite</th>
                             </thead>
                             <tbody>

                                 @foreach ($defauts as $item)
                                     <tr>
                                         <td>{{ $item->id }}</td>
                                         <td>{{ $item->operatrice }}</td>
                                         <td>{{ $item->of }}</td>
                                         <td>{{ $item->type_defaut->nom }}</td>
                                         <td>{{ $item->quantite }}</td>
                                         <td>
                                             <div class="row">
                                                 <div class="col">
                                                     <a class="btn btn-warning"
                                                         href="{{ route('defaut.edit', ['id' => $item->id]) }}">Edit</a>
                                                 </div>
                                                 <form action="{{ route('defaut.delete', ['id' => $item->id]) }}"
                                                     method="POST">
                                                     @csrf

                                                     {{-- ------------------------ --}}
                                        
                                        @if (session("utilisateur")->role ==  "admin")
                                            
                                                    {{-- ------------------------ --}}
                                        <a class="btn btn-danger btn-fill  " data-toggle="modal" data-target="#d" href="#pablo">
                                            supp
                                        </a>
                                    @endif
                                    <!-- Mini Modal -->
                                    <div class="modal fade modal-mini modal-primary" id="d" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header justify-content-center">
                                                    <div class="modal-profile">
                                                        <i class="nc-icon nc-bulb-63"></i>
                                                    </div>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <p>voulez-vous supprimer ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn  btn-success" style="cursor: pointer">oui</button>
                                                    <button type="button" class="btn  btn-danger" style="cursor: pointer" data-dismiss="modal">no</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  End Modal -->
                                    {{-- ------------------------ --}}
                                                 {{-- ------------------------ --}}
                                                 {{-- <button type="submit" class="btn btn-danger btn-fill text-light" onclick="return confirm('Etest vous sur ?')">supprimer</button> --}}
                                                 </form>
                                             </div>
                                         </td>
                                     </tr>
                                 @endforeach
                             </tbody>
                           
                         </table>

                     </div>
                 </div>
             </div>
         </div>
     </div>
 @endsection


 @section('script')
     <script>
      
         // type = ['primary', 'info', 'success', 'warning', 'danger'];
         @if (session('success'))
             demo.showNotification('bottom', 'right', 2, "defaut   est supprimer", "nc-icon nc-check-2")
         @endif
     </script>

 @endsection
