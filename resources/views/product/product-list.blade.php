@extends('theme.Default')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('form.list')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{__('form.list')}}</li>
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
          <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Discount Price</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->slug}}</td>
                            <td><img style="width:100px;height:100px" src="{{url($product->productimage)}}"></td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->discount}}</td>
                            <td>{{$product->discounted_price}}</td>
                        </tr>
                    @endforeach
                  </tbody>
                 
                </table>
              </div>
       
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
        
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });
  });

    </script>
@stop