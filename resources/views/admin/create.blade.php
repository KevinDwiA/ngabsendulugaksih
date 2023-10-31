
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Masyarakat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: rgb(228,179,198);
background: linear-gradient(310deg, rgba(228,179,198,1) 42%, rgba(179,55,107,1) 58%);">
 
    
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('index.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">Id</label>
                                <input type="text" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ old('id') }}" placeholder="Masukkan Id User">
                            
                                <!-- error message untuk nama -->
                                @error('id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>

                            
                            <div class="form-group">
                                <label class="font-weight-bold">Username</label>
                                <input type="text" class="form-control @error('tempat') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama User">
                            
                                <!-- error message untuk tempat tinggal -->
                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            
                            <div class="form-group">
                                <label class="font-weight-bold">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan Email Anda">
                            
                                <!-- error message untuk emai; -->
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            
                            <div class="form-group">
                                <label class="font-weight-bold">Password</label>
                                <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Masukkan Password">
                            
                                <!-- error message untuk telepon -->
                                @error('password')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>

</body>
</html>
