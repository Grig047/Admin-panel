    $(document).ready(function() {
        $('#message').hide(8000)
    });

    function handleImageUpload()
    {

        var image = document.getElementById("img").files[0];

        var reader = new FileReader();

        reader.onload = function(e) {
            document.getElementById("display-image").src = e.target.result;
            $('#display-image').css({'width' : '15%', 'height' : '15%',})
        }

        reader.readAsDataURL(image);

    }
