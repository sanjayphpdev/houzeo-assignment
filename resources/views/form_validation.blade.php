<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Form Validation</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <form action="{{route('save.properties')}}" method="POST">
                <h2>Form Validation</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" class="form-control" placeholder="" id="full_name" name="full_name" value="{{old('full_name')}}">
                        </div>
						@if ($errors->has('full_name'))
							<span class="text-danger">
								<strong>{{ $errors->first('full_name') }}</strong>
							</span>
						@endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" class="form-control" placeholder="" id="phone_number" name="phone_number" value="{{old('phone_number')}}">
                        </div>
						@if ($errors->has('phone_number'))
							<span class="text-danger">
								<strong>{{ $errors->first('phone_number') }}</strong>
							</span>
						@endif
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" placeholder="" value="{{old('email')}}">
                        </div>
						@if ($errors->has('email'))
							<span class="text-danger">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" placeholder="" name="dob" value="{{old('dob')}}">
                        </div>
						@if ($errors->has('dob'))
							<span class="text-danger">
								<strong>{{ $errors->first('dob') }}</strong>
							</span>
						@endif
                    </div>
                </div>
				{{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>
</html>
