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
                  <label>Catgory</label>
                  <select name="category_id" class="form-control" >
                      <option value="">Select Catgory</option>
                      @foreach($catgories as $cats)
                        <option  {{$cats->child->count() > 0 ? 'disabled style=color:red' : ''}} value="{{$cats->id}}">{{!empty($cats->parentCategory) ? $cats->parentCategory->name.' -> ' : ''}}{{$cats->name}}</option>
                      @endforeach
                  </select>
                  <span style="color:red" class="category_id-error error"></span>
                </div>
               
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Name</label>
                  <input class="form-control" type="text" name="pname"   > 
                  <span style="color:red" class="pname-error error"></span>
                </div>               
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Brand</label> 
                  <select name="brand_id" class="form-control" >
                      <option value="">Select Brand</option>
                      @foreach($brands as $brand)
                        <option  value="{{$brand->id}}"> {{$brand->name}}</option>
                      @endforeach
                  </select>
                  <span style="color:red" class="brand-error error"></span>
                </div>               
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Tags (comma separated)</label>
                  <input class="form-control" type="text" name="tags"   > 
                  <span style="color:red" class="tags-error error"></span>
                </div>               
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Price</label>
                  <input class="form-control" type="text" name="price"   > 
                  <span style="color:red" class="price-error error"></span>
                </div>               
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Discounted Price</label>
                  <input class="form-control" type="text" name="discounted_price"   > 
                  <span style="color:red" class="discounted_price-error error"></span>
                </div>               
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Discount</label>
                  <input class="form-control" type="text" name="discount"   > 
                  <span style="color:red" class="discounted-error error"></span>
                </div>               
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Price Description</label>
                  <textarea id="summernote" name="price_description">
                   
                  </textarea>
                  <span style="color:red" class="price_description-error error"></span>
                </div>               
              </div>

              
              <div class="col-md-6">
                 <!-- /.form-group -->
                 <div class="form-group">
                  <label>Cover Image</label>
                  <input class="form-control imgchange" type="file" name="image"  accept="image/*"   > 
                  <span class="img-preview">  
                    <img src="" style="  display:none;  width: 36%;height: 149px;" class="img-preview-src">
                  </span>
                  <span style="color:red" class="image-error error"></span>                  
                </div>
                <!-- /.form-group -->
              </div>

              <div class="col-md-6">
                 <!-- /.form-group -->
                 <div class="form-group">
                  <label>More Image</label>
                  <input class="form-control imgchangemulti" id="imgchangemulti" type="file" multiple name="multiple_image[]"  accept="image/*"   > 
                  <span class="img-preview-multi" id="img-preview-multi" style="  display:none;">  
               
                  </span>
                  <span style="color:red" class="multiple_image-error error"></span>                  
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label>Description</label>
                  <textarea id="description" name="description">
                    
                  </textarea>
                  <span style="color:red" class="description-error error"></span>
                </div>               
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label>Key Benifits</label>
                  <textarea id="key_benifits" name="key_benifits">
                    
                  </textarea>
                  <span style="color:red" class="key_benifits-error error"></span>
                </div>               
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label>Direction for Usage</label>
                  <textarea id="direction_for_usage" name="direction_for_usage">
                    
                  </textarea>
                  <span style="color:red" class="direction_for_usage-error error"></span>
                </div>               
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label>Other Information</label>
                  <textarea id="other_information" name="other_information">
                    
                  </textarea>
                  <span style="color:red" class="other_information-error error"></span>
                </div>               
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
    </script>
@stop