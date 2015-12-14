$(function(){

    $(".summernote").summernote({
        height: 200,
        minHeight: 100,
        maxHeight: 300
    });

    $(".markdown").markdown();

    $(".datetimepicker").datetimepicker({
        format: 'DD/MM/YYYY',
        pickTime: false
    });

    $(".datetimepicker2").datetimepicker({
        format: 'YYYY',
        pickTime: false

    });

    $(".select2").select2();


    function readURL(input) {

        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
        $('#apercu-image').attr('src', e.target.result);
        }

    reader.readAsDataURL(input.files[0]);
    }
    }

    $("#file1").change(function(){
        readURL(this);
        });


});