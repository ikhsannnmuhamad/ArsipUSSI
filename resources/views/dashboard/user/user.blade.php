@extends('dashboard.layout.main')

@section('abc')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Manage Users</h1>
</div>

@if(session()->has('success'))
  <div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
@endif

    <div class="table-responsive col-lg-10">
      <a href="/user/create" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> </a>
        <table class="table table-striped table-sm">
          <thead class="thead-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">User ID</th>
              <th scope="col">Name</th>
              <th scope="col">Level</th>
              <th scope="col">Email</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $p)
            <tr>
              <td>{{ $loop -> iteration }}</td>
              <td>{{ $p -> user_id }}</td>
              <td>{{ $p -> name }}</td>
              <td>
                @if ($p -> level == '1')
                    <label class="badge btn-success">{{ $p -> post -> level }}</label>
                @elseif ($p -> level == '2')
                    <label class="badge btn-primary">{{ $p -> post -> level }}</label>
                @endif
              </td>
              <td>{{ $p -> email }}</td>
              <td>
                <a href="{{ url('/user/'.$p -> id.'/edit') }}" class="badge btn-warning btn-sm">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="{{ url('/user/'.$p -> id.'/delete') }}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="badge btn-danger btn-sm">
                    <i class="fa fa-trash-alt"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
    <div class="mb-3">
        {{ $posts->links('pagination::bootstrap-5') }}
    </div>
@endsection
