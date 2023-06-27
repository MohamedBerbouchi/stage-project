 @extends(session('utilisateur')->role == 'admin' ? 'layouts.master' : 'layouts.user')

 @section('title')
     listes de defauts
 @endsection
 @section('css')
     <style>
 /* CSS code for the modal overlay */
#modal-overlay {
  display: none;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.7);
}

/* CSS code for the modal content */
#modal-content {
  display: flex;
  justify-content: center;
  align-items: center;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

/* CSS code for the modal wrapper */
.modal-wrapper {
  position: relative;
  max-width: 100%;
  max-height: 100%;
}

/* CSS code for the modal image */
.modal-image {
  max-width: 100%;
  width: 100%;
  height: auto;
}

/* CSS code for the modal text */
.modal-text {
  margin-top: 20px;
}

/* CSS code for the close button */
.close-button {
  position: absolute;
  top: 20px;
  right: 20px;
  font-size: 30px;
  font-weight: bold;
  color: #fff;
  cursor: pointer;
  z-index: 2;
}

/* Media queries for responsive design */
@media screen and (max-width: 768px) {
  .modal-image {
    max-height: 60vh;
  }
  
  .modal-text {
    margin-top: 10px;
  }
  
  .close-button {
    top: 10px;
    right: 10px;
    font-size: 20px;
  }
}
.modal-text {
  margin-top: 20px;
  text-align: center; /* Center the text */
  position: absolute; /* Position the text absolutely */
  bottom: 20px; /* Position the text 20px from the bottom of the modal */
  width: 100%; /* Set the width to 100% */
}
     </style>
 @endsection


 @section('content')
     <div class="row d-flex justify-content-center">
         <div class="col-md-10">


             {{-- recherche  --}}

             {{-- end recherche  --}}
             <div class="card">
                 <div class="card-header d-flex justify-content-between">
                     <h4 class="card-title">List Reclamations</h4>
                     <a class="btn btn-info btn-fill text-light" href="{{ route('reclamation.create') }}">ajouter
                         decalartion</a>
                 </div>
                 <div class="mx-3">
                     <input type="text" name="" id="search" placeholder="Tapez pour rechercher..."
                         class="input-elevated">

                 </div>
                 <div class="card-body">
                     <div class="table-responsive table-full-width">
                         <table class="table table-hover" id="table">
                             {{-- protected $fillable = ["operatrice", "of", "N_programme", "id_defaut", "id_utilisateur","quantite"]; --}}

                             <thead>
                                 <th>ID</th>
                                 <th>ref</th>
                                 <th>anomalie</th>
                                 <th>est reopndé</th>
                                 <th>email</th>
                             
                                 <th></th>
                             </thead>
                             <tbody>

                                 @foreach ($reclamations as $item)
                                      
                                 <tr>
                                         <td>{{ $item->id }}</td>
                                         <td>{{ $item->ref }}</td>
                                         <td>{{ $item->anomalie->nom }}</td>
                                         <td>{!! $item->reponse
                                             ? '<span class="badge badge-success">Oui</span>'
                                             : '<span class="badge badge-danger">No</span>' !!}</td>
                                         <td>
                                             @foreach (json_decode($item->email) as $em)
                                                 {{ $em }} <br>
                                             @endforeach
                                         </td>
                                         {{-- <td><img src="{{ asset($item->image) }}" alt="" style="width:100px"></td> --}}


                                          

                                         <td style="min-width:170px">
                                             <div class="row">
                                                <div class="col">
                                                    <a class="btn btn-success"
                                                        href="{{ route('reclamation.show', ['id' => $item->id]) }}">affiche</a>
                                                </div>
                                                 <div class="col">
                                                     <a class="btn btn-warning"
                                                         href="{{ route('reclamation.edit', ['id' => $item->id]) }}">Edit</a>
                                                 </div>
                                                 <form class="col" action="{{ route('reclamation.delete', ['id' => $item->id]) }}"
                                                     method="POST">
                                                     @csrf

                                                     {{-- ------------------------ --}}
                                                     <a class="btn btn-danger btn-fill  " data-toggle="modal"
                                                         data-target="#d" href="#pablo">
                                                         supp
                                                     </a>
                                                     <!-- Mini Modal -->
                                                     <div class="modal fade modal-mini modal-primary" id="d"
                                                         tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                         aria-hidden="true">
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
                                                                     <button type="submit" class="btn  btn-success"
                                                                         style="cursor: pointer">oui</button>
                                                                     <button type="button" class="btn  btn-danger"
                                                                         style="cursor: pointer"
                                                                         data-dismiss="modal">no</button>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <!--  End Modal -->
                                                     {{-- ------------------------ --}}
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
// Get the modal overlay, modal content, and close button elements
var modalOverlay = document.getElementById("modal-overlay");
var modalContent = document.getElementById("modal-content");
var closeButton = document.querySelector(".close-button");

// Function to open the modal
function openModal() {
  // Set the display property of the modal overlay and modal content elements to "block"
  modalOverlay.style.display = "block";
  modalContent.style.display = "flex";
}

// Function to close the modal
function closeModal() {
  // Set the display property of the modal overlay and modal content elements to "none"
  modalOverlay.style.display = "none";
  modalContent.style.display = "none";
}

// Event listener to close the modal when the user clicks outside of the modal
modalOverlay.addEventListener("click", closeModal);

// Event listener to close the modal when the user presses the escape key
document.addEventListener("keydown", function(event) {
  if (event.key === "Escape") {
    closeModal();
  }
});

// Event listener to prevent clicks inside the modal from closing

     </script>
 @endsection
