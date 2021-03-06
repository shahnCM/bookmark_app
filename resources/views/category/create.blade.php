@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
  

            <div class="col-md-8">
                <div class="category-create p-2">
                    <div class="card border-0 shadow">
                        <div class="card-header bg-white text-center text-secondary">Create New Category</div>

                        <div class="card-body">

                          <form method="POST" action="{{ route('category.store') }}">
                          @csrf
                            <div class="form-group">
                              <label for="category_name_create" class="text-secondary">Category Name</label>
                              <input type="text" name="name" class="form-control" id="category_name_create" required>
                            </div>
                          
                            <div class="color-group text-center mb-3">
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="color" id="inlineRadio1" value="bg-danger" required>
                                <label class="form-check-label" for="inlineRadio1">Red</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="color" id="inlineRadio2" value="bg-secondary" required>
                                <label class="form-check-label" for="inlineRadio2">Grey</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="color" id="inlineRadio3" value="bg-success" required>
                                <label class="form-check-label" for="inlineRadio3">Green</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="color" id="inlineRadio3" value="bg-warning" required>
                                <label class="form-check-label" for="inlineRadio3">Yellow</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="color" id="inlineRadio3" value="bg-primary" required>
                                <label class="form-check-label" for="inlineRadio3">Blue</label>
                              </div>
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
