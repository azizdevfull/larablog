  @extends('admin.layouts.main')
  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 d-flex align-item-center">
            <h1 class="m-0 mr-2">{{$category->title}}</h1>
           <a href="{{ route('admin.category.edit', $category) }}" class="text-success"><i class="bi bi-pen"></i></a>
          
          <form action="{{ route('admin.category.delete', $category) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="border-0 bg-transparent">
              <i class="bi bi-trash text-danger"></i>
            </button>
          </form>

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Categories</a></li>

            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div class="row">
          <div class="col-6">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <tbody>
                    <tr>
                      <td>ID</td>
                      <td>{{ $category->id }}</td>
                    </tr>
                    <tr>
                      <td>Title</td>
                      <td>{{ $category->title }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>


          </div>
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


  </div>
  <script src="https://example.com/fontawesome/v5.15.4/js/all.js" data-auto-a11y="true" ></script>

  @endsection