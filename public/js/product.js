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
})