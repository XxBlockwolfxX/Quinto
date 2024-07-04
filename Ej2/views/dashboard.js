

$().ready(()=>{
    cargarTabla();
})

var cargarTabla = ()=>{
    var datos = {metodo:"leer"}
    $.ajax({
        url: '../php/leer.php',
        type: 'POST',
        data: datos,
        success: function (data) {
            $("#datos").html(data);
        },
        error: function (e) {
            console.log(e);
        }
    });
}