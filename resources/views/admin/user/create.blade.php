@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Users</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
          Create User
          
          <form action="{{ route('admin.user.store') }}" method="POST" style="width: 30%;">
            @csrf
            <div class="card-body">

              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="User Name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-danger">
                       {{ $message }}
                    </div>
                @enderror
              </div>

              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control"  name="email" placeholder="User Email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-danger">
                       {{ $message }}
                    </div>
                @enderror
              </div>

              <div class="form-group">
                <label>Select Role</label>
                <select name="role" class="form-control">
                  @foreach ($roles as $id => $role)
                      
                  <option value="{{ $id }}"
                    {{ $id == old('role_id') ? 'selected' : '' }}
                    >{{ $role }}</option>
                  @endforeach
                </select>
                @error('role')
                <div class="text-danger">
                   {{ $message }}
                </div>
            @enderror
              </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Create</button>
            </div>
          </form>

        </div>
      </div>
      <!-- /.row -->

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection