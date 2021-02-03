@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
  

            <div class="col-md-8">
                <div class="category-create p-2">
                    <div class="card border-0 shadow">
                        <div class="card-header bg-white text-center text-secondary">Create New Bookmark</div>

                        <div class="card-body">

                          <form method="POST" action="{{ route('bookmark.store.post', $category) }}">
                          @csrf
                            <div class="form-group">
                              <label for="category_name_create" class="text-secondary">Bookmark Name</label>
                              <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                          
                            <div class="form-group">
                              <label for="category_name_create" class="text-secondary">Bookmark Link</label>
                              <input type="text" name="link" class="form-control" id="link" required>
                            </div>

                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                          </form>         

                        </div>

                    </div>
                </div>
            </div>


    </div>
</div>
@endsection
