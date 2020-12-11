$(document).ready(function () {
 cargarCategorias();
 cargarMascotas();
});

var idEditar;
function cargarCategorias(){
    swal({
      title: 'Cargando...',
      allowOutsideClick: false
    });
    swal.showLoading();
    $.ajax({
      url: "./controllers/mascotas_controllers.php",
      data: {
          action:1
      },
      type: 'POST',
      dataType: 'json',
      success: function (data) {
        swal.close();
        var dato='<option selected>Seleccionar</option>';
        var count=0;
        for (var index = 0; index < data.length; index++) {
          dato +='<option value="'+data[index].id+'">'+data[index].nombre+'</option>'
        }
        $("#SelectCategoria").html(dato);
      },
      error: function (xhr, status) {
          console.log("xhr",xhr);
          console.log("status",status);
        swal({
              type: 'error',
              title: 'Oops!',
              text: 'Disculpe, existió un problemas'
          });
      }
    });
}//termina funcion

function cargarMascotas(){
  $.ajax({
    url: "./controllers/mascotas_controllers.php",
    data: {
        action:2
    },
    type: 'POST',
    dataType: 'json',
    success: function (data) {
      swal.close();
      var dato='';
      var count=0;
      for (var index = 0; index < data.length; index++) {
        count=count+1;
        dato +='<tr>';
        dato +='<th scope="row">'+count+'</th>';
        dato +='<td>'+data[index].identificacion+'</td>';
        dato +='<td>'+data[index].nombre+'</td>';
        dato +='<td>'+data[index].urlFoto+'</td>';
        if (data[index].estado==1) {
          dato +='<td>';
          dato +='<span class="badge badge-complete">Activo</span>';
          dato +=' </td>';  
        }else{
          dato +='<td>';
          dato +=' <span class="badge badge-pending">Inactivo</span>';
          dato +=' </td>';
        }
        dato +='<td class="contentAccion">';
        dato+='<div onclick="sbEditar(' + "'" + data[index].id + "','" + data[index].identificacion + "','" + data[index].nombre + "','" + data[index].urlFoto + "','" + data[index].estado + "'" + ')"><i class="fa fa-edit"></i></div>';
        dato+='<div class="buttonDelete" onclick="sbEliminar(' + "'" + data[index].id + "'" + ')"><i class="fas fa-trash-alt"></i></div>';
        dato+='</td>';
        dato +=' </tr>';
        
      }
      $("#tbBody").html(dato);
    },
    error: function (xhr, status) {
        console.log("xhr",xhr);
        console.log("status",status);
      swal({
            type: 'error',
            title: 'Oops!',
            text: 'Disculpe, existió un problemas'
        });
    }
  });
}//termina funcion


function agregar(){
  var idCategoria = $("#SelectCategoria option:selected").val();
  var identificacion= $("#codigo").val();
  var nombre= $("#nombre").val();
  var urlFoto= $("#foto").val();
  var estado= $("#estado").val();
  swal({
    title: 'Cargando...',
    allowOutsideClick: false
  });
  swal.showLoading();
  $.ajax({
    url: "./controllers/mascotas_controllers.php",
    data: {
      idCategoria:idCategoria,
      identificacion:identificacion,
      nombre:nombre,
      urlFoto:urlFoto,
      estado:estado,
      action:5
    },
    type: 'POST',
    dataType: 'json',
    success: function (data) {
      swal.close();
      swal(
        'Notificación!',
        'Se agrego correctamente',
        'success'
      ).then(function () {
        cargarMascotas();
      })       
    },
    error: function (xhr, status) {
        console.log("xhr",xhr);
        console.log("status",status);
      swal({
            type: 'error',
            title: 'Oops!',
            text: 'Disculpe, existió un problemas'
        });
    }
  });
}



function sbEditar(id,identificacion,nombre,urlFoto,estado){
  idEditar=id;
  $(".contentModal").css("display","block");
  $("#identificacionEditar").val(identificacion);
  $("#nombreEditar").val(nombre);
  var foto='<img src="'+urlFoto+'" border="1" width="200" height="100">'
  $("#fotoEdit").val(foto);
  $("#estadoEditar").val(estado);
}



function update(){
    var nombreEdit= $("#nombreEditar").val();
    var estadoEdit= $("#estadoEditar").val();
  $.ajax({
    url: "./controllers/mascotas_controllers.php",
    data: {
        action:3,
        id:idEditar,
        nombre:nombreEdit,
        estado:estadoEdit
    },
    type: 'POST',
    dataType: 'json',
    success: function (data) {
      swal.close();
      swal(
        'Notificación!',
        'Se agrego correctamente',
        'success'
      ).then(function () {
        cargarMascotas();
        $(".contentModal").css("display","none");
      })       
    },
    error: function (xhr, status) {
        console.log("xhr",xhr);
        console.log("status",status);
      swal({
            type: 'error',
            title: 'Oops!',
            text: 'Disculpe, existió un problemas'
        });
    }
  }); 
}



function sbEliminar(id){
  swal({
    title: 'Cargando...',
    allowOutsideClick: false
  });
  swal.showLoading();
  $.ajax({
    url: "./controllers/mascotas_controllers.php",
    data: {
        id:id,
        action:4
    },
    type: 'POST',
    dataType: 'json',
    success: function (data) {
      swal.close();
      if (data==200) {
        swal(
          'Notificación!',
          'Se elimino correctamente',
          'success'
        ).then(function () {
          cargarMascotas();
        })       
      }else{
        swal({
          type: 'warning',
          title: 'Oops!',
          text: 'No se pudo eliminar!'
      });  
      }
    },
    error: function (xhr, status) {
        console.log("xhr",xhr);
        console.log("status",status);
      swal({
            type: 'error',
            title: 'Oops!',
            text: 'Disculpe, existió un problemas'
        });
    }
  }); 
} 

function buscar(){
  var buscar= $("#buscar").val();
  swal({
    title: 'Cargando...',
    allowOutsideClick: false
  });
  swal.showLoading();
  $.ajax({
    url: "./controllers/mascotas_controllers.php",
    data: {
      id:buscar,
        action:6
    },
    type: 'POST',
    dataType: 'json',
    success: function (data) {
      swal.close();
      var dato='';
      var count=0;
      for (var index = 0; index < data.length; index++) {
        count=count+1;
        dato +='<tr>';
        dato +='<th scope="row">'+count+'</th>';
        dato +='<td>'+data[index].identificacion+'</td>';
        dato +='<td>'+data[index].nombre+'</td>';
        dato +='<td>'+data[index].urlFoto+'</td>';
        if (data[index].estado==1) {
          dato +='<td>';
          dato +='<span class="badge badge-complete">Activo</span>';
          dato +=' </td>';  
        }else{
          dato +='<td>';
          dato +=' <span class="badge badge-pending">Inactivo</span>';
          dato +=' </td>';
        }
        dato +='<td class="contentAccion">';
        dato+='<div onclick="sbEditar(' + "'" + data[index].id + "','" + data[index].identificacion + "','" + data[index].nombre + "','" + data[index].urlFoto + "','" + data[index].estado + "'" + ')"><i class="fa fa-edit"></i></div>';
        dato+='<div class="buttonDelete" onclick="sbEliminar(' + "'" + data[index].id + "'" + ')"><i class="fas fa-trash-alt"></i></div>';
        dato+='</td>';
        dato +=' </tr>';
        
      }
      $("#tbBody").html(dato);
    },
    error: function (xhr, status) {
        console.log("xhr",xhr);
        console.log("status",status);
      swal({
            type: 'error',
            title: 'Oops!',
            text: 'Disculpe, existió un problemas'
        });
    }
  }); 
}