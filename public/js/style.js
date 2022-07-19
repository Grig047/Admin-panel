$(document).ready(function () {
    $('.admin_del_btn').click(function(e){
        e.preventDefault()
        if (confirm('Подтвердить удаление')) {
            $(e.target).closest('form').submit()
        }
    });
    $("input[type='checkbox']").click(function(){
        $.ajax({
            method: 'POST',
            url: '/admin_page/brand/change_active',
            data: {
                "_token": $('#token').val(),
                'id': $(this).attr('class'),
            },
        });
    });

    // $("#inp-img-vid").change(function() {
    //     imgPreview(this);
    // });
    // function imgPreview(input) {
    //     var file = input.files[0];
    //     var mixedfile = file['type'].split("/");
    //     var filetype = mixedfile[0]; // (image, video)
    //     if(filetype == "image"){
    //         var reader = new FileReader();
    //         reader.onload = function(e){
    //             $(".display-img-vid-con").empty()
    //             $(".display-img-vid-con").append('<img src="'+e.target.result+'" style="width: 300px; height: 300px">')
    //             // $("#preview-img").css({'width' : '300px', 'height' : '300px'})
    //             // $("#preview-img").show().attr("src", e.target.result);
    //         }
    //         reader.readAsDataURL(input.files[0]);
    //     }else if(filetype == "video"){
    //         $(".display-img-vid-con").empty()
    //         $(".display-img-vid-con").append('<video controls style="width: 500px; height: 300px"><source src="'+URL.createObjectURL(input.files[0])+'"></video>');
    //     }else{
    //         alert("Invalid file type");
    //     }
    // }
})
