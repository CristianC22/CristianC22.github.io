$(document).ready(function(){

    $(".formulario-contacto").bind("submit",function() {
        
        $.ajax({
            type:$(this).attr("method"),
            type:$(this).attr("action"),
            data:$(this).serialize(),
            success:function(){
                $("#alerta").removeClass("hide").addClass("alert-success");
            },
            error:function(){
                $("#alerta").removeClass("hide").addClass("alert-error");

            }
        });

        return false;
    });

});