@extends('dashboard.layout.main')

@section('abc')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit User</h1>
</div>
<a href="/user" class="btn btn-primary mb-3"><i class="fa fa-arrow-left"></i> Back</a>
<div class="card-header"><b>-</b></div>
<div class="card card-primary card-outline">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-body table-responsive p-0 col-lg-10">
                    <div class="col-lg-8">
                        <form method="post" action="{{ url('/user/'.$user -> id) }}" class="mb-5">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $user->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Alamat Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required autofocus value="{{ old('email', $user->email) }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                            <div class="mb-3">
                                <label for="level" class="form-label">Level / Role</label>
                                <select name="level" class="form-control">
                                    <option value="">- Pilih -</option>
                                    @foreach ($post as $p)
                                        @if(old('level', $user -> level) == $p -> level_id)
                                        <option value="{{ $p -> level_id }}" selected>
                                            {{ $p -> level }}
                                        </option>
                                        @else
                                        <option value="{{ $p -> level_id }}">
                                            {{ $p -> level }}
                                        </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autofocus value="{{ old('password') }}">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="input-group mb-3" style="padding-left: 10px;">
                                <b>Show Password</b>
                                <div style="padding-left: 7px; padding-top:  2px;">
                                    <input type="checkbox" id="" name="" onclick="myFunction()">
                                </div>
                            </div>
                          <button type="submit" class="btn btn-outline-primary">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function myFunction(){
        var show = document.getElementById("password");
        if(show.type=='password'){
            show.type='text';
        }else{
            show.type='password'
        }
    }
</script>
@endsection
