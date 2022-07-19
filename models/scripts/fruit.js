var tabla;

function init(){
    mostrarFormulario(false);
    listar();

    $("#form").on("submit", function(e) {
            guardaryeditar(e);
        })

}

function limpiar(){
    $("#id_fruits").val("");
    $("#fruit_name").val("");
    $("#price").val("");
    $("#in_stock").val("");
    $("#fruit_image").val("");
}

function mostrarFormulario(flag){
    limpiar();
    if(flag)
    {
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled",false);
        $("#btnAgregar").hide();
    }
    else
    {
        $("#listadoregistros").show("");
        $("#formularioregistros").hide();
        $("#btnAgregar").show();
    } 
}

function cancelarform(){
    limpiar();
    mostrarFormulario(false);
}

function listar(){
    tabla = $("#tblistado").dataTable(
        {
            "aProcessing": true,
            "aServerside": true,
            dom: '@frtip',
            buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdf'
            ],

        "ajax":
            {
                url: '../ajax/fruit.php?op=listar',
                type: "get",
                dataType: "json",
                error: function(e){
                    console.log(e.responseText);
                }
            }
        }).DataTable();
}

function guardaryeditar(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#form")[0]);

    $.ajax({
        url: "../ajax/fruit.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function(datos) {
            bootbox.alert(datos);
            mostrarFormulario(false);
            tabla.ajax.reload();
        }

    });
    limpiar();
}

function mostrar(id_fruit) {
    $.post("../models/Fruits.php", { id_fruit: id_fruit }, function(data, status) {
        data = JSON.parse(data);
        mostrarFormulario(true);
        $("#id_fruit").val(data.id_fruit);
        $("#fruit_name").val(data.fruit_name);
        $("#price").val(data.price);
        $("#in_stock").val(data.in_stock);
        $("#fruit_image").val(data.fruit_image);



    })}

init();