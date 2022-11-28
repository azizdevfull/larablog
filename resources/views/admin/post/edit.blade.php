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
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
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
          Update Category
          
          <form action="{{ route('admin.post.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card-body">
              <div class="form-group w-25">
                <label>Title</label>
                <input type="text" class="form-control" value="{{ $post->title }}" name="title" placeholder="Category Title">
                @error('title')
                    <div class="text-danger">
                       {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group">
                <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                @error('content')
                <div class="text-danger">
                   {{ $message }}
                </div>
            @enderror
              </div>
              <div class="form-group w-50">
                <label for="exampleInputFile">Add Main Image</label>
                <div class="w-50 mb-2">
                  <img src="{{ url('storage/' . $post->main_image) }}" alt="main_image" class="w-50">
                </div>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="main_image">
                    <label class="custom-file-label" >Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
                @error('main_image')
                <div class="text-danger">
                   {{ $message }}
                </div>
            @enderror
              </div>

              <div class="form-group w-50">
                <label>Add Image</label>
                <div class="w-50 mb-2">
                  <img src="{{ url('storage/' .$post->preview_image) }}" alt="preview_image" class="w-50">
                </div>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="preview_image">
                    <label class="custom-file-label">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
                @error('preview_image')
                <div class="text-danger">
                   {{ $message }}
                </div>
            @enderror
              </div>
              <div class="form-group">
                <label>Select Category</label>
                <select name="category_id" class="form-control">
                  @foreach ($categories as $category)
                      
                  <option value="{{ $category->id }}"
                    {{ $category->id == $post->category_id ? 'selected' : '' }}
                    >{{ $category->title }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Tag</label>
                <select name="tag_ids[]" class="select2" multiple="multiple" data-placeholder="Select a Tag" style="width: 100%;">
                  @foreach ($tags as $tag)
                  <option {{ is_array($post->tags->pluck('id')->toArray() )  && in_array($tag->id, $post->tags->pluck('id')->toArray() ) ? ' selected' : '' }} value="{{ $tag->id }}">{{$tag->title}}</option>
                  @endforeach
                
                </select>
              </div>
              <div class="form-group">
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>                
              </div>
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