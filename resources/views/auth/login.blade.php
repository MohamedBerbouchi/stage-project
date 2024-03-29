 

<!doctype html>
<html lang="en">
  <head>
  	<title>Login IKS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('assets/login/css/style.css')}}">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
 				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url({{asset('assets/login/images/iks.jpg')}});">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Connectez-vous :</h3>
			      		</div>
							 
			      	</div>
							<form method="POST" action="{{route('loginUtilisateur')}}" class="signin-form">
                @csrf
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Matricule</label>
			      			<input type="text" class="form-control" placeholder="Matricule" name="matricule" value="{{old('matricule')}}" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Mot de passe</label>
		              <input type="password" class="form-control"placeholder="Mot de passe" name="password" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Se Connecter</button>
		            </div>
		             
		          </form>
 		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>
 

	</body>
</html>

