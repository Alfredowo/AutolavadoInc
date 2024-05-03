$(".editar").click(function(){
    let _ide = $(this).attr("_ide");
    alert("yeiiiiiii"+_ide);
    $.post("accionesdatos",{ide:_ide},function(mensaje){
        $("#X").html(mensaje);    
    });
});