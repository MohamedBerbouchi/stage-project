@extends(session('utilisateur')->role == 'admin' ? 'layouts.master' : 'layouts.user')


@section('title')
    reponse de reclamation
@endsection


@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Reponse de Reclamation</h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('ReclamationReponse') }}" method="post">
                        @csrf
                        <div class="row">
                            {{-- <div class="col-md-12">
               <div class="form-group">
                  <label>liste reclamation</label>
                  <select   id="dddddddddd" class=" @error('id_reclamation') is-invalid @enderror" style="width:100%" name="id_reclamation">
                    <option value="">choisir</option>

                    @foreach ($reclamation_sans_reponse as $item)
                        
                    <option value="{{$item->id}}">{{$item->ref}}</option>
                    @endforeach
                       
                  </select>
                  @error('id_reclamation')
                  <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror  
              </div>  
           
              
             
       
          </div> --}}<div class="col-md-12">
                                <div class="form-group">
                                    <label for="mySelect">liste reclamation</label>
                                    <select id="mySelect"
                                        class="form-control @error('id_reclamation') is-invalid @enderror"
                                        style="width:100%" name="id_reclamation">
                                        <option value="">choisir</option>
                                        @foreach ($reclamation_sans_reponse as $object)
                                            <option value="{{ $object->id }}">{{ $object->ref }}</option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    {{-- <img class="card-img-top" src="https://via.placeholder.com/350x150" alt="Card image cap"> --}}
                                    <h5 class="card-header"><b>message</b></h5>
                                    <div class="card-body">

                                        <p class="card-text" id="cmt">.</p>
                                        <img src="#" id="reclamation_image" alt="" style="max-width:100%">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>reponse</label>
                                    <textarea placeholder="reponse ici" value="{{ old('reponse') }}"
                                        class="form-control  @error('reponse') is-invalid @enderror" rows="10" name="reponse"
                                        value="{{ old('reponse') }}" style="height: 150px"></textarea>
                                    @error('reponse')
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
    <script>
        // type = ['primary', 'info', 'success', 'warning', 'danger'];
        @if (session('success'))

            demo.showNotification('bottom', 'right', 2, "reponse de Reclamation  est cree", "nc-icon nc-check-2")
        @endif
    </script>


    <script>
        // Get the select element and content element
        var select = document.getElementById('mySelect');
        var content = document.getElementById('cmt');

        let reclamation_image = document.getElementById("reclamation_image");

// Set the src attribute

        let objects = {!! json_encode($reclamation_sans_reponse) !!};
        let c = {!! count($reclamation_sans_reponse) !!};
        const list = Object.entries(objects).map(([key, value]) => [key, value]);
        // Add a change event listener to the select element
        select.addEventListener('change', function(e) {
             
            list.forEach(element => {
                if (element[1].id == e.target.value) {
                    
                content.innerHTML = element[1].commentaire.replace(/\n/g, "<br>");
                let img = "/" + element[1].image
                reclamation_image.setAttribute("src",img);

                console.log(img)
                } 
            
            });

            // for (let i = 0; i < c: i++) {
            //     if (objects[i].id == e.target.value) {
            //         console.log("hhh")
            //         content.innerHTML = objects[i].commentaire
            //     }
            // }

        });
    </script>
@endsection
