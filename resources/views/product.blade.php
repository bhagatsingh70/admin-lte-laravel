@extends('theme.Default')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('form.add_product')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{__('form.add_product')}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    

        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title"> </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <form id="addProductForm" method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
         
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Name</label>
                  <input class="form-control" type="text" name="pname"   > 
                  <span style="color:red" class="pname-error error"></span>
                </div>
               
              </div>
              <div class="col-md-6">
                 <!-- /.form-group -->
                 <div class="form-group">
                  <label>Image</label>
                  <input class="form-control imgchange" type="file" name="image"  accept="image/*"   > 
                  <span class="img-preview">  <img src="" style="  display:none;  width: 36%;
    height: 149px;" class="img-preview-src"></span>
    <span style="color:red" class="image-error error"></span>
                  
                </div>
                <!-- /.form-group -->
              </div>
           
            </div>
            <!-- /.row -->
           
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary submit-btn">Submit</button>
          </div>
          </form>
       
        </div>
       
        <!-- /.card -->
 
    
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@stop

@section('script')
    <script src="{{url('js/product.js')}}"></script>
    <script>
        $(".imgchange").on('change', function(evt){
            const [file] =evt.target.files
        if (file) {
           
            $(".img-preview-src").attr('src',URL.createObjectURL(file));
            $(".img-preview-src").show()
        }
        })
       
    </script>
@stop