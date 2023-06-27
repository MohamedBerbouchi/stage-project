@extends(session('utilisateur')->role == 'admin' ? 'layouts.master' : 'layouts.user')


@section('title')
    afficher reclamation
@endsection


@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-8  mx-auto">
            <div class="card">
                @if ($reclamation->image)
                    <img class="card-img-top" src="{{ asset($reclamation->image) }}" alt="Image">
              
                @endif
                <div class="card-body">
                    <p class="card-text"><small class="text-muted">{{ $reclamation->created_at }} |
                            {{ $reclamation->ref }}</small></p>
                            <p class="card-text" class="text-muted"><strong>Anomalie: </strong> {{ $reclamation->anomalie->nom }} </p>
                    <h3>Commentaire</h3>

                    <p class="card-text"> {!! nl2br(e($reclamation->commentaire)) !!}</p>

                    @if ($reclamation->reponse)
                        <h3>Reponse</h3>

                        <p class="card-text">{!! nl2br(e($reclamation->reponse)) !!}</p>
                    @endif

                    <a   class="btn btn-info btn-fill text-light"  href="{{ route('reclamation.index' ) }}">retour</a>
                </div>
            </div>

        </div>
    </div>
@endsection


@section('script')
@endsection
