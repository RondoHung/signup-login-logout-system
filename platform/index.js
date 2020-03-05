$(document).ready(function(){

    $("#upfile1").click(function(){
        $("#file").trigger('click');
    })


    $("#file").on("change", function(e){

        const filename = e.target.value.split("\\").pop();
        $("#label_span").text(filename);

    })
})