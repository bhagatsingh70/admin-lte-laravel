$(document).ready(function(){
    $("#addProductForm").on('submit', function(e){
        e.preventDefault();
        var form = $("#addProductForm")[0];
        $(this).find('.submit-btn').attr('disabled', true);
        var formData = new FormData(form);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="token"]').attr('value')
            }
        });
        $('.error').html('');
        $.ajax({
            url: $(this).attr('action'),// your request url
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (data) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Product Added Successfully',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                  })
                  $(".img-preview-src").attr('src','').hide();
                  $("#addProductForm").trigger("reset");
                  $("#addProductForm").find('.submit-btn').attr('disabled', false);
            },
            error: function (error) {
                if(error.status == 422){
                    $.each(error.responseJSON.errors, function(v,k){
                        $("."+v+'-error').html(k);
                    })
                }
                $("#addProductForm").find('.submit-btn').attr('disabled', false);
            }
        });
    })

    $("#addCategoryForm").on('submit', function(e){
        e.preventDefault();
        var form = $("#addCategoryForm")[0];
        $(this).find('.submit-btn').attr('disabled', true);
        var formData = new FormData(form);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="token"]').attr('value')
            }
        });
        $('.error').html('');
        $.ajax({
            url: $(this).attr('action'),// your request url
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (data) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Category Added Successfully',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                  })
                  $(".img-preview-src").attr('src','').hide();
                  $("#addCategoryForm").trigger("reset");
                  $("#addCategoryForm").find('.submit-btn').attr('disabled', false);
            },
            error: function (error) {
                if(error.status == 422){
                    $.each(error.responseJSON.errors, function(v,k){
                        $("."+v+'-error').html(k);
                    })
                }
                $("#addCategoryForm").find('.submit-btn').attr('disabled', false);
            }
        });
    })

    $(".imgchange").on('change', function(evt){
        const [file] =evt.target.files
      if (file) {           
          $(".img-preview-src").attr('src',URL.createObjectURL(file));
          $(".img-preview-src").show()
      }
    })

    var checkMultiImageInput = document.getElementById('imgchangemulti');
    if(checkMultiImageInput){
    document.querySelector(".imgchangemulti").addEventListener("change", (ev) => {
            if (!ev.target.files) return; // Do nothing.
            [...ev.target.files].forEach(preview);
            $(".img-preview-multi").show()
        });
    }

    const preview = (file) => {
        const fr = new FileReader();
        fr.onload = () => {
            const img = document.createElement("img");
            img.src = fr.result; 
            img.alt = file.name;
            img.style = "width: 120px;margin:9px ";
            document.querySelector('#img-preview-multi').append(img);
        };
        fr.readAsDataURL(file);
        };


   
  
  
  $('#summernote, #description, #other_information, #direction_for_usage, #key_benifits ').summernote()


  
})