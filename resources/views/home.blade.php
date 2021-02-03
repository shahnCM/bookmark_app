@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-between">

            <div class="col-md-3">
                <div class="category pt-2 pl-2 pr-2 pb-4">
                    <div class="card shadow-lg" style="min-height:250px; border: 2px dashed orange">
                        <!-- <div class="card-header">{{ __('Dashboard') }}</div> -->

                        <div class="card-body">
                            <div class="pt-5 text-center">
                                <a href="#{{route('category.create')}}" data-toggle="modal" data-target="#AddCategory" class="text-decoration-none">
                                    <i style="color: orange" class="fas fa-plus-circle fa-3x"></i>
                                </a>    
                                <br><br>
                                <h4 class="text-secondary">Create New Category</h4>
                                <small class="text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit.sit amet consectetur adipisicing elit,sit amet consectetur adipisicing elit</small>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>

            @foreach($categories as $category)

            <div class="col-md-3">
                <div class="category pt-2 pl-2 pr-2 pb-4">
                    <div class="card border-0x" style="min-height:250px;">
                        <div class="card-header pt-1 pb-1 {{$category->color}}">
                            <div class="row">
                                <div class="col-lg-8">
                                   <span class="text-white font-weight-bolder">{{$category->name}}</span>         
                                </div>
                                <div class="col-sm-4 text-right">
                                    <a href="{{route('bookmark.create.get', $category)}}" class="pl-1 text-white"><i class="fas fa-plus-circle fa-sm"></i></a> 
                                    <a href="{{route('category.edit', $category)}}" class="pl-1 text-white"><i class="fas fa-pen fa-sm"></i></a>  
                                    <a href="{{route('category.delete.get', $category)}}" onclick="return confirm('Are you sure?')" class="pl-1 text-white"><i class="fas fa-trash fa-sm"></i></a>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                        <ul class="list-group list-group-flush pl-0 pr-0 list-unstyled">
                            @foreach($category->bookmarks as $bookmark)
                            <li class="pl-0 pr-0 pt-1 pb-1 list-group-item">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <a href="{{$bookmark->link}}" target="_blank" class="text-decoration-none text-secondary font-weight-bold">{{$bookmark->name}}</a>
                                    </div>
                                    <div class="col-sm-4 text-right">
                                        <a href="{{route('bookmark.edit', $bookmark)}}" class="pl-1 text-secondary"><i class="fas fa-pen fa-sm"></i></a>  
                                        <a href="#" onclick="deleteConfirm({{$bookmark}})" id="DELETE" data={{$bookmark->id}} class="pl-1 text-secondary fa-sm"><i class="fas fa-trash"></i></a>
                                        <!-- <a href="{{route('bookmark.delete.get', $bookmark)}}" onclick="return confirm('Are you sure?')" class="pl-1 text-secondary fa-sm"><i class="fas fa-trash"></i></a>-->
                                    </div>
                                </div>      
                            </li>
                            @endforeach                        
                        </ul>

                        </div>
                    </div>
                </div>
            </div>

            @endforeach

    </div>
</div>

<!--Add Category Modal -->
<div class="modal fade" id="AddCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add a New Category</h5>

      </div>
      <form method="POST" action="{{ route('category.store') }}"> 
        <div class="modal-body">
            
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

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-sm btn-primary">Ok</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!--Delete Modal -->
<div class="modal fade" id="DeleteConfirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete the bookmark ?</h5>

      </div>
      <div class="modal-body">
        <p>Are You Sure You Want to Delete the Bookmark ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="#" id="DELETE_BUTTON" class="pl-1 text-secondary fa-sm"><button type="button" class="btn btn-secondary">Delete</button></a>
      </div>
    </div>
  </div>
</div>


<script>

function deleteConfirm(bookmark) {
    // $bookmark = $('#DELETE').val();
    $("#DELETE_BUTTON").attr("href", "/bookmark_delete_get/" + bookmark.id);
    console.log(bookmark);
    $('#DeleteConfirm').modal('show')
}

</script>

@endsection
