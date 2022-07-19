var tabla;

//Funci�n que se ejecuta al type
function init() {
    mostrarform(false);
    listar();

    $("#formulario").on("submit", function(e) {
            guardaryeditar(e);
        })
        //funci�n para edici�n de imagen



}

//Funci�n limpiar
function limpiar() {
    $("#id_user").val("");
    $("#nombre").val("");
    $("#nickname").val("");
    $("#phone").val("");
    $("#type").val("");


}

//Funci�n mostrar formulario
function mostrarform(flag) {
    limpiar();
    if (flag) {
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled", false);
        $("#btnagregar").hide();
    } else {
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();
    }
}

//Funci�n cancelarform
function cancelarform() {
    limpiar();
    mostrarform(false);
}

//Funci�n Listar
function listar() {
    tabla = $('#tbllistado').dataTable({
        "aProcessing": true, //Activamos el procesamiento del datatables
        "aServerSide": true, //Paginaci�n y filtrado realizados por el servidor
        dom: 'Bfrtip', //Definimos los elementos del control de tabla
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf'
        ],
        "ajax": {
            url: '../ajax/users.php?op=listar',
            type: "get",
            dataType: "json",
            error: function(e) {
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "iDisplayLength": 5, //Paginaci�n
        "order": [
                [0, "desc"]
            ] //Ordenar (columna,orden)
    }).DataTable();
}
//Funci�n para guardar o editar

function guardaryeditar(e) {
    e.preventDefault(); //No se activar� la acci�n predeterminada del evento
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../ajax/users.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function(datos) {
            bootbox.alert(datos);
            mostrarform(false);
            tabla.ajax.reload();
        }

    });
    limpiar();
}

function mostrar(id_user) {
    $.post("../ajax/users.php?op=mostrar", { id_user: id_user }, function(data, status) {
        data = JSON.parse(data);
        mostrarform(true);
        $("#id_user").val(data.id_user);
        $("#nombre").val(data.nombre);
        $("#nickname").val(data.nickname);
        $("#phone").val(data.phone);
        $("#type").val(data.phone);



    })
}




init();