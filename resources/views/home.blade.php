 @extends(session('utilisateur')->role == 'admin' ? 'layouts.master' : 'layouts.user')

 @section('title')
     Statistiques
 @endsection

 @section('content')
     <div class="row d-flex justify-content-center">
         <div class="col-lg-8">
             <div class="row justify-content-md-between ">
                 <div class="card-single col-md-2 mb-3">
                     <div>
                         <h2>{{ $statistics['nb_defauts'] }}</h2>
                         <small>defauts</small>
                     </div>
                     <div>
                         <span class="fa fa-shopping-cart"></span>
                     </div>
                 </div>

                 <div class="card-single col-md-2  mb-3">
                     <div>
                         <h2>{{ $statistics['nb_reclamations'] }}</h2>
                         <small>reclamation</small>
                     </div>
                     <div>
                         <span class="fa fa-newspaper-o"></span>
                     </div>
                 </div>
                 <div class="card-single col-md-2  mb-3">
                     <div>
                         <h2>{{ $statistics['nb_reclamations_reponde'] . '/' . $statistics['nb_reclamations'] }}</h2>
                         <small>repondre</small>
                     </div>
                     <div>
                         <span class="fa fa-outdent"></span>
                     </div>
                 </div>
                 <div class="card-single col-md-2  mb-3">
                     <div>
                         <h2>{{$statistics["reclamation_p"] }}%</h2>
                         <small>reclamation repondé </small>
                     </div>
                     <div>
                         <span class="fa fa-group"></span>
                     </div>
                 </div>
             </div>



         </div>
     </div>
     <div class="container">
         <div class="row">
             <div class="col-md-8">
                 <div class="card ">
                     <div class="card-header ">
                         <h4 class="card-title">Defauts </h4>
                         <p class="card-category">...</p>
                     </div>
                     <div class="card-body ">
                         <canvas id="myChart"></canvas>
                     </div>
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="card ">
                     <div class="card-header ">
                         <h4 class="card-title">Recalmation </h4>
                         <p class="card-category">...</p>
                     </div>
                     <div class="card-body ">
                         <canvas id="pie-chart" width="800" height="450"></canvas>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-md-8">
            <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title">list operatrices </h4>
                    <p class="card-category">{{date("Y")}} ,{{date("M")}}</p>
                </div>
                <div class="card-body ">
                   
                      
                   
                   <table class="table">
                    <thead>
                        <th></th>
                        <th>Matricule</th>
                        <th> defauts</th>
                    </thead>
                    <tbody>
                        @foreach ($list_operatrice as $item)
                        <tr>
                            <td>
                                <div  style="font-size: 2em">
                                     
                            
                                        <span> <i class="nc-icon nc-circle-09"></i></span>
                                  
                                </div>
                            </td>
                            <td>{{$item->operatrice}}</td>
                            <td class="td-actions text-right">
                                <span>{{$item->count}}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                   </table>
                </div>
            </div>
        </div>


     </div>
 @endsection

 @section('script')
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

     <script>
            setTimeout(function(){
                window.location.reload();
        }, 1000*60*10);

         const ctx = document.getElementById('myChart');
         var array = {!! json_encode($months) !!};


         const m = JSON.parse('{{ json_encode($months) }}');
         new Chart(ctx, {
             type: 'bar',
             data: {
                 labels: ['janv', 'fevr', 'mars', 'avr', 'mai', 'juin', "juil", "aout", "sept", "oct", "nov", "dec"],
                 datasets: [{
                     label: '# Nobre de defauts',
                     data: array,
                     borderWidth: 1
                 }]
             },
             options: {
                 scales: {
                     y: {
                         beginAtZero: true
                     }
                 }
             }
         });

         new Chart(document.getElementById("pie-chart"), {
             type: 'pie',
             data: {
                 labels: [" reponde", "pas reponde"],
                 datasets: [{
                     label: "nombre :",
                     backgroundColor: ["#3e95cd", "#8e5ea2"],
                     data: [{{ $statistics['nb_reclamations_reponde'] }},
                         {{ $statistics['nb_reclamations_pas_reponde'] }}
                     ]
                 }]
             },
             options: {
                 title: {
                     display: true,
                     text: ' '
                 }
             }
         });
     </script>
 @endsection
 
