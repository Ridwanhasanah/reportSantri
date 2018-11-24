$('#formData').on('submit',function(e){

    // Loading
    var $loading = $('#loadingDiv').hide();
    $(document)
  .ajaxStart(function () {
    $loading.show();
  })
  .ajaxStop(function () {
    $loading.hide();
  });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    })

    e.preventDefault();

    $.ajax({
        type: 'POST',
        url : 'kkaregis',
        data : new FormData(this),
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        success: function(data){

            if(data.errors){
                $.each(data.errors, function(key, value){
                    $('.alert-danger').show();
                    $('.alert-danger').append('<p>'+value+'</p>');
                  });
            }else{
                $('.modal-reg').show();
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }
            
            // alert('berhasil')
        },
        error: function(data){
            console.log('Error: ', data)
        }
    })
})