<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Data Posts - SantriKoding.com</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body style="background: lightgray">
  @include('layouts.navbar')
  <div class="container mt-3">
    <div class="row mb-3">
      <div class="col-md-12">
        <div>


        </div>
        <div class="card border-0 shadow-sm rounded mt-3">
          <div class="card-body">
            <a href="{{ route('posts.create') }}" class="btn btn-md btn-success mb-3" style="align-items: end;"><i
                class="bi bi-plus-circle-fill mx-3"></i>TAMBAH POST</a>
            <table class="table table-bordered">
              <thead class="table">
                <tr>
                  <th scope="col">GAMBAR</th>
                  <th scope="col">JUDUL</th>
                  <th scope="col">CONTENT</th>
                  <th scope="col">AKSI</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($posts as $post)
                  <tr>
                    <td class="text-center">
                      <img src="{{ asset('storage/posts/' . $post->image) }}" class="rounded" style="width: 150px">
                    </td>
                    <td>{{ $post->title }}</td>
                    <td>{!! $post->content !!}</td>
                    <td class="text-center">
                      <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                        action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-info">SHOW</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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
            {{ $posts->links() }}
            <nav aria-label="Page navigation example" class="">
              <ul class="pagination justify-content-end">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>
    //message with toastr
    @if (session()->has('success'))

      toastr.success('{{ session('success') }}', 'BERHASIL!');
    @elseif (session()->has('error'))

      toastr.error('{{ session('error') }}', 'GAGAL!');
    @endif
  </script>

</body>

</html>
