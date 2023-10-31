

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Karakter</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: rgb(220,216,255);
background: linear-gradient(310deg, rgba(220,216,255,1) 26%, rgba(73,194,204,1) 85%);">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 style="font-family:times new roman; text-align:center"><b>Selamat Datang</b></h1>
                <div>
                    <h3 class="text-center my-4">Data User</h3>
    
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounde 1000px" width="2000px">
                    <div class="card-body">
                        <a href="{{ route('create') }}" class="btn btn-md btn-success mb-3">Tambahkan User</a>
                        <table class="table table-bordered" width="1200px">
                            <thead>
                            <tr>
                                <th scope="col">Id </th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password/th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($tables as $table)
                                <tr>
                                
                                    <td>{{ $table->id }}</td>
                                    
                                
                                    <td>{!! $table->name!!}</td> 
                                    <td>{!! $table->email !!}</td>
                                    <td>{!! $table->password!!}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('index.destroy', $table->id) }}" method="POST">
                                            <a href="{{ route('edit', $table->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data Post belum Tersedia.
                                </div>
                            @endforelse
                            </tbody>
                            </table>  
                        {{ $tables  ->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>
    

</body>
</html>

</body>
</html>