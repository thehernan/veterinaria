/////////////// citas /////////////////
function eliminarcitas(id)
{
    var q= $("#q").val();
    if (confirm("Realmente deseas eliminar el usuario")){
        $.ajax({
            type: "GET",
            url: "./ajax/eliminarcitas.php",
            data: "id="+id,"q":q,
            beforeSend: function(objeto){
            $("#resultados_usu").html("Mensaje: Cargando...");
            },
            success: function(datos){
            $("#resultados_usu").html(datos);
            $("#resul").html(data).fadeIn('slow');
            $('#resul').html('lista_citas.php');
            }
        });
    }
}
//////////////// confirmar  cita /////////////////
function confirmarcita(id,c)
		{
        if (confirm("Desea confirmar la cita?")){
            $.ajax({
                type: "GET",
                url: "./ajax/confirmarcita.php",
                data: {id:id,c:c},
                 beforeSend: function(objeto){
                        $("#resultados_usu").html("Mensaje: Cargando...");
                  },
                success: function(datos){
                        $("#resultados_usu").html(datos);
//                        $("#resul").html(data).fadeIn('slow');
//                        $('#resul').html('lista_citas.php');
                        $('#dataTables-example').dataTable()._fnAjaxUpdate();
                        }
			});
		}
}
///////////////////////////////

$( "#guardacliente" ).submit(function( event ) {
  $('#btngrabar').attr("disabled", true);

 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_cliente.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajaxnu").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajaxnu").html(datos);
			$('#btngrabar').attr("disabled", false);

			$('#guardacliente').trigger("reset");
		  }
	});
  event.preventDefault();
});

/////////////// guardar administrador /////////////////
$( "#guardaradmin" ).submit(function( event ) {
  $('#btngrabar').attr("disabled", true);

 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_admin.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajaxnu").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajaxnu").html(datos);
			$('#btngrabar').attr("disabled", false);

			$('#guardaradmin').trigger("reset");
		  }
	});
  event.preventDefault();
});
//////////////////////////////////////

$( "#guardardoctor" ).submit(function( event ) {
  $('#btngrabar').attr("disabled", true);

 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/insertdoctor.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajaxnu").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajaxnu").html(datos);
			$('#btngrabar').attr("disabled", false);

			$('#guardardoctor').trigger("reset");
		  }
	});
  event.preventDefault();
})



////////////// guardar producto ///////////



$( "#guarproducto" ).submit(function( event ) {
  $('#btngrabar').attr("disabled", true);

 var parametros = $(this).serialize();
 console.log(parametros);
	 $.ajax({
			type: "POST",
			url: "ajax/insertproducto.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajaxnu").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajaxnu").html(datos);
			$('#btngrabar').attr("disabled", false);
	$('#guarproducto').trigger("reset");
		  }
	});
  event.preventDefault();
});
/////////////



// guardar unidad medida /////////////
$( "#guarunidamedida" ).submit(function( event ) {
  $('#btngrabar').attr("disabled", true);

 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/insertunidadmedida.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajaxnu").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajaxnu").html(datos);
			$('#btngrabar').attr("disabled", false);

			$('#guarunidamedida').trigger("reset");
		  }
	});
  event.preventDefault();
});
////////////////////////

function modalproducto(cod){

//  var id = $(this).attr('cod'); //aqui cogera el id
  console.log(cod);
$.ajax({
                url: './ajax/buscaridunidadmedida.php',// tu url donde vas a consltar el id
                type: 'POST',
                dataType: 'json',
                data: {id: cod }

}).done(function(data){// data es el json q recoge
 //console.log(data);
    $("#txtid").val(data.id_producto);
    $("#txtco").val(data.codigo);
    $("#txtdes").val(data.descripcion);
    $("#precioc").val(data.preciocompra);
    $("#preciov").val(data.precio);
    // $("#idunidmedventa").val(data.unidmedventa);
    //$("#idunidmedcompra").val(data.unidmedcompra);
    $("#factor").val(data.factor);
    $("#stockmin").val(data.stockmin);
    $("#stockmax").val(data.stockmax);
    $("#idunidmed").val(data.id_unidad_medida);
    var lot = data.lote;
    var unib=data.unidmedventa;
    var unibc=data.unidmedcompra
   var um=$("#umeven").val(unib);
   var uc=$("#umecom").val(unibc);

    console.log(lot);

    //console.log(unib);
    //console.log(unibc);
    if(lot==1){
        $("#lote").click();
    }else if(lot==0){

        $("#lote :checkbox").attr('checked', false);
    }
   //console.log(lot);

});
};

////////////////// AGREGAR EXISTENCIAS - LOTE ////////////////
function agregarstock(cod){

//  var id = $(this).attr('cod'); //aqui cogera el id
  console.log(cod);
$.ajax({
                url: './ajax/buscaridunidadmedida.php',// tu url donde vas a consltar el id
                type: 'POST',
                dataType: 'json',
                data: {id: cod }

}).done(function(data){// data es el json q recoge
 //console.log(data);
// alert(data.lote);
//alert(id);

    $("#txtlote").val(data.lote);
    $("#txtidproducto").val(data.id_producto);
    $('#lblcantidad').html('Cantidad X '+data.unidmedcompra);

    if(data.lote==0){
        $("#txtfecha").hide();
        $("#lblfechaf").hide();
        $("#txtfechaexp").hide();
         $("#lblfechaexp").hide();

        $("#txtnlote").hide();
        $("#lbllote").hide();
        $("#txtrs").hide();
        $("#lblrs").hide();
        $("#txtrs").removeAttr("required");
        $("#txtnlote").removeAttr("required");
         $("#txtfecha").removeAttr("required");
         $("#txtfechaexp").removeAttr("required");
//        $("#txtcant").hide();

    }else {

        $("#txtfecha").show();
        $("#lblfechaf").show();
        $("#txtfechaexp").show();
         $("#lblfechaexp").show();

        $("#txtnlote").show();
        $("#lbllote").show();
        $("#txtrs").show();
        $("#lblrs").show();
    }
});
};
///////////////////////////////////////////
////////////////// insertar existencias /////////
$("#modexistencias").submit(function(event) {
//  $('#btngrabar').attr("disabled", true);

 var parametros = $(this).serialize();
 console.log(parametros);
	 $.ajax({
			type: "POST",
			url: "ajax/insertexistencias.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajaxnu").html(datos);
//			$('#btngrabar').attr("disabled", false);
                        $('#dataTables-example').dataTable()._fnAjaxUpdate();
			$( ".bd-agregarstock").modal('hide');

		  }
	});
  event.preventDefault();
});


//GUARDAR MODICACIÓN DEL PRODUCTO
$( "#modicaunidadmedida" ).submit(function( event ) {
//  $('#btngrabar').attr("disabled", true);

 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/modificaprouc.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajaxnu").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajaxnu").html(datos);
//			$('#btngrabar').attr("disabled", false);

			 $('#dataTables-example').dataTable()._fnAjaxUpdate();
			$(".bd-example-modal-lg").modal('hide');
		  }
	});
  event.preventDefault();
});

//GUARDAR DATOS ALUMNOS MODIFICADOS
$( "#modicaalumno" ).submit(function( event ) {
  $('#btngrabar').attr("disabled", true);

 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/modialumno.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajaxnu").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajaxnu").html(datos);
			$('#btngrabar').attr("disabled", false);

			$('#modicaalumno').trigger("reset");
		  }
	});
  event.preventDefault();
})




$( "#modidoctor" ).submit(function( event ) {
//  $('#btngrabar').attr("disabled", true);

 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/modidoctor.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax").html(datos);
//			$('#btngrabar').attr("disabled", false);
                        $('#dataTables-example').dataTable()._fnAjaxUpdate();
                        $('.bd-example-modal-lg').modal('hide');
		  }
	});
  event.preventDefault();
});

//ENVIAR ID A LA CAJA APODERADO

$('.asignar').on('click', function(){

     var id = ($("#txtcodigo").val());

     $("#codigo").val(id);
    alertify.success("Agregado con éxito");
    $("#myModal").modal('hide');


})

/*$('#productoVenta').on('click', function(){
     var id = ($("#productoVenta").val());
    console.log(id);
  $.ajax({
   url: './ajax/buscaridprecios.php',
   type: 'POST',
   dataType: 'json',
   data: {id: id}
}).done(function(data){
    $("#txtpre").val(data.precio);
    $("#txtsto").val(data.stock);

})
})*/




//ENVIAR ID A LA CAJA CLIENTE

$('.asignarcliente').on('click', function(){
 var id = $(this).attr('cod'); //aqui cogera el id
// var dni = $(this).attr('dni'); //aqui cogera el id
// var ruc = $(this).attr('ruc'); //aqui cogera el id
  console.log(id);
//  console.log(dni);
//  console.log(ruc);
//  if(ruc==""){
//      $("#boleta").click();
//       $("#fac").children().remove();
//  }else
//  if(dni==""){
//   $("#fac").click();
//    $("#boleta").children().remove();
//  }
$.ajax({
                url: './ajax/buscaridclientes.php',// tu url donde vas a consltar el id
				type: 'POST',
				dataType: 'json',
				data: {id: id}
}).done(function(data){// data es el json q recoge
 //console.log(data);
    $("#txtid").val(data.id_cliente);
    $("#txtclien").val(data.apellidos+ ' ' +data.nombre);
    $("#txtdireccion").val(data.direccion);
    $("#txtrucdni").val(data.dni);
    $("#txtemail").val(data.email);
    
    alertify.success("Cliente agregado con éxito");
    $(".bd-example-modal-lg").modal('hide');
})
})

$('.asignardoctor').on('click', function(){
 var id = $(this).attr('cod'); //aqui cogera el id
  console.log(id);
$.ajax({
                url: './ajax/buscariddoctor.php',// tu url donde vas a consltar el id
				type: 'POST',
				dataType: 'json',
				data: {id: id}
}).done(function(data){// data es el json q recoge
 //console.log(data);
    $("#txtiddoc").val(data.iddoctor);
    $("#txtdoctor").val(data.apellidos+ ' ' +data.nombre);
    alertify.success("Doctor agregado con éxito");
    $(".bd-example-modal-lg3").modal('hide');
})
})



/// cargar datos al modal para modificar usuarios

function modiusu(cod){
//$('.modiusu').on('click', function(){
// var id = $(this).attr('cod'); //aqui cogera el id
//  console.log(id);
$.ajax({
                url: './ajax/buscaridusuarios.php',// tu url donde vas a consltar el id
				type: 'POST',
				dataType: 'json',
				data: {id: cod }

}).done(function(data){// data es el json q recoge
 //console.log(data);
    $("#txtape").val(data.apellido);
    $("#txtnom").val(data.nombre);
    $("#txtpro").val(data.email);
    $("#txtdomi").val(data.direccion);
    $("#txtdni").val(data.dni);
    $("#txttele").val(data.telefono);
    $("#txtcose").val(data.sexo);
    $("#txtid").val(data.idpersona);
    $("#txtfn").val(data.fechanacimiento);
    $("#txtec").val(data.idEstado);

})
};
////IMPRIME COMPROBANTE

function print_fac_vdt(idcliente,ine,igv,total,idventa,tcom){
VentanaCentrada('./pdf/documentos/ver_boletadeventa.php?idcliente='+idcliente+"&ine="+ine+"&igv="+igv+"&total="+total+"&idventa="+idventa+"&tcom="+tcom);
		}

function print_fac_vdt2(idcliente,ine,igv,total,idventa,tcom,ruc,rz,dir){
VentanaCentrada('./pdf/documentos/factura_pdf.php?idcliente='+idcliente+"&ine="+ine+"&igv="+igv+"&total="+total+"&idventa="+idventa+"&tcom="+tcom+"&ruc="+ruc+"&rz="+rz+"&dir="+dir);
		}

//////////////////////perfil


/////////////////////////////////////// perfil


$( "#perfil" ).submit(function( event ) {
  $('.guardar_datos').attr("disabled", true);
    console.log('ok');

 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_perfil.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax").html(datos);
			$('.guardar_datos').attr("disabled", false);

		  }
	});
  event.preventDefault();
})




		function upload_image(){

				var inputFileImage = document.getElementById("imagefile");
				var file = inputFileImage.files[0];
				if( (typeof file === "object") && (file !== null) )
				{
					$("#load_img").text('Cargando...');
					var data = new FormData();
					data.append('imagefile',file);


					$.ajax({
						url: "ajax/imagen_ajax.php",        // Url to which the request is send
						type: "POST",             // Type of request to be send, called as method
						data: data, 			  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
						contentType: false,       // The content type used when sending data to the server.
						cache: false,             // To unable request pages to be cached
						processData:false,        // To send DOMDocument or non processed data file it is set to false
						success: function(data)   // A function to be called if request succeeds
						{
							$("#load_img").html(data);

						}
					});
				}


			}


    $('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");


        $('.btnAgregaVenta').click(function(){

                      var can;
            can=parseFloat(prompt("Ingresar Cantidad: ",'1'));

            if(can<=0){
                alertify.error("Cantidad no Validad!");
            return;
            }
            if(isNaN(can)){
                alertify.error("Solo Numeros!");
            return;
            }
             if ($("#txtid").val()=="" ) {
            alertify.error("Primero Seleccione el cliente para llenar el Carrito de Compras.!");
            $(".bd-example-modal-lg2").modal('hide');
            return;

                }
                 var id = $(this).attr('cod');
                 //var pre = $(this).attr('pre');
                var pre = $("#precio").val();
                //console.log(id + '--' + pre);
                 var stck = $(this).attr('st');
                 console.log(id);
                 console.log("precio "+pre);
                 console.log(can);
                 console.log(stck);

                 if(can>stck){
                    alertify.error("Candidad no permitidad Debe ser igual o menor al STOCK.!");
                    $(".bd-example-modal-lg2").modal('hide');
                    return;

                 }


                $.ajax({
                        type:"POST",
                        data:{id: id , pre: pre , can: can},
                        url:"classes/agregaProductoTemp.php",
                        success:function(r){
                                $('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
                                alertify.success("Agregado al Carrito!");
                                $(".bd-example-modal-lg2").modal('hide');
                        }
                });





//                    var can;
//                    can=parseFloat(prompt("Ingresar Cantidad: ",'1'));
//
//                    if(can<=0){
//                        alertify.error("Cantidad no Validad!");
//                    return;
//                    }
//                    if(isNaN(can)){
//                        alertify.error("Solo Numeros!");
//                    return;
//                    }
//                     if ($("#txtid").val()=="" ) {
//                    alertify.error("Primero Seleccione el cliente para llenar el Carrito de Compras.!");
//                    $(".bd-example-modal-lg2").modal('hide');
//                    return;
//
//                        }
//			 var id = $(this).attr('cod');
//			 var pre = $(this).attr('pre');
//                         var stck = $(this).attr('st');
//                         var factor = $(this).attr('factor');
//                         console.log(id);
//                         console.log(pre);
//                         console.log(can);
//                         console.log(stck);
//
//                         if(can>stck*factor){
//                            alertify.error("Candidad no permitidad Debe ser igual o menor al STOCK.!");
//                            $(".bd-example-modal-lg2").modal('hide');
//                            return;
//
//                         }
//
//
//			$.ajax({
//				type:"POST",
//				data:{id: id , pre: pre , can: can},
//				url:"classes/agregaProductoTemp.php",
//				success:function(r){
//					$('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
//                                        alertify.success("Agregado al Carrito!");
//                                        $(".bd-example-modal-lg2").modal('hide');
//				}
//			});
		});

                ////////////////////////////////////////////////////////////////////
                $('#btnVaciarVentas').click(function(){
		$.ajax({

			url:"ventas/vaciarTemp.php",
			success:function(r){
				$('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
        alertify.warning("Carrito Vacio");
			}
		});
	});

        function quitarP(index){
		$.ajax({
			type:"POST",
			data:"ind=" + index,
			url:"ventas/quitarproducto.php",
			success:function(r){
				$('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
				alertify.success("Se quito el producto");
			}
		});
	}

   //     $('#boleta').on('click', function(){
     //}    $("#factura").children().remove();
       //     })

    //    $('#fac').on('click', function(){


     // $("#factura").children().remove();
      //$("#factura").append("<input type='text' id='txtruc'  name='txtruc' class='form-control' required placeholder='Ruc'><br>");
      //$("#factura").append("<input type='text' id='txtrz'  name='txtrz' class='form-control' required placeholder='Razón Social'><br>");
      //$("#factura").append("<input type='text' id='txtdir'  name='txtdir' class='form-control' required placeholder='Dirección'>");

      //$("#pagartodo").append("<hr> <input type='button' name='btnabonar' id='btnabonar' value='Abonar' class='btn btn-primary'>");
      //  $("#txtabo").val(data.costopension);
     //$("#txtpen").val(data.costopension);

//})

$( "#guardarmascota" ).submit(function( event ) {
    $('#btngrabar').attr("disabled", true);

 var parametros = new FormData($(this)[0]);

	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_mascota.php",
			data: parametros,
			cache: false,
    contentType: false,
    processData: false,
    type: 'POST',
			 beforeSend: function(objeto){
				$("#resultados_ajax").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax").html(datos);
			$('#btngrabar').attr("disabled", false);

		  }
	});
  event.preventDefault();

   alertify.success("Registrado con exito");
  return false;
});




$('.asignarcli').on('click', function(){
 var id = $(this).attr('cod');
  console.log(id);

$.ajax({
                url: './ajax/buscaridclientes.php',
				type: 'POST',
				dataType: 'json',
				data: {id: id}
}).done(function(data){
    $("#txtid").val(data.id_cliente);
    $("#txtclie").val(data.apellidos+ ' ' +data.nombre);
    $(".bd-example-modal-lg").modal('hide');
    alertify.success("Cliente agregado con éxito");

});
})

$('.mismasco').on('click', function(){
 var id = $(this).attr('cod');
  console.log(id);

$.ajax({
                url: './ajax/buscarmismascotas.php',
				type: 'POST',
				dataType: 'json',
				data: {id: id}
}).done(function(data){
    $("#txtid").val(data.id_mascota);
    $("#txtclie").val(data.nombre);
    $("#txtclie").val(data.especie);
    $("#txtclie").val(data.raza);
    $("#txtclie").val(data.sexo);
    $("#txtclie").val(data.pelaje);
    $("#txtclie").val(data.f_nac);
    $("#txtclie").val(data.fallecido);
    $("#txtclie").val(data.foto);
    $("#txtclie").val(data.codigodvi);

});
})
///////////////////////// modal editar cliente //////////
function modalcliente(cod){
//$('.modicliente').on('click', function(){
// var id = $(this).attr('cod');
  console.log(cod);

$.ajax({
        url: './ajax/buscaridclientes.php',
        type: 'POST',
        dataType: 'json',
        data: {id: cod}
}).done(function(data){
    $("#txtid").val(data.id_cliente);
    $("#txtnom").val(data.nombre);
    $("#txtape").val(data.apellidos);
    $("#txtdomi").val(data.direccion);
    $("#txtt1").val(data.telf1);
    $("#txtt2").val(data.telf2);
    $("#txtruc").val(data.ruc);
    $("#txtdni").val(data.dni);
    $("#txtema").val(data.email);
    $("#txtpw").val(data.paginaweb);

});
};

$( "#modcliente" ).submit(function( event ) {
//  $('#btngrabar').attr("disabled", true);

 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/modidicliente.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajaxnu").html(datos);
//			$('#btngrabar').attr("disabled", false);
                        $('#dataTables-example').dataTable()._fnAjaxUpdate();
                        $(".bd-example-modal-lg").modal('hide');

		  }
	});
  event.preventDefault();
});

/////////////////// modificar mascota modal//////
function momascota(cod){
//$('.momascota').on('click', function(){
// var id = $(this).attr('cod');
  console.log(cod);

$.ajax({
                url: './ajax/buscarmismascotas.php',
				type: 'POST',
				dataType: 'json',
				data: {id: cod}
}).done(function(data){
    $("#txtid").val(data.id_mascota);
    $("#txtnom").val(data.nombre);
    $("#txtes").val(data.especie);
    $("#txtra").val(data.raza);
    $("#txtse").val(data.sexo);
    $("#txtpe").val(data.pelaje);
    $("#txtfn").val(data.f_nac);
    $("#txtfa").val(data.fallecido);
    $("#txtex").val(data.extraviado);
    $("#txtseñas").val(data.señas);
    $("#txtco").val(data.codigodvi);

});
};

//$('.btnmodidoctor').on('click', function(){
function btnmodiddoctor(cod){
// var id = $(this).attr('cod');
  console.log(cod);

    $.ajax({
        url: './ajax/buscariddoctor.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {id: cod}
}).done(function(data){
    $("#txtid").val(data.iddoctor);
    $("#txtnom").val(data.nombre);
    $("#txtape").val(data.apellidos);
    $("#txtdomi").val(data.direccion);
    $("#txtdni").val(data.dni);
    $("#txtce").val(data.celular);
    $("#txtpro").val(data.profesion);
    $("#txtema").val(data.email);


});
};



$( "#guardahistorial" ).submit(function( event ) {


    var parametros = new FormData($(this)[0]);
    var total = $('#texttotal').val();
    
    if(total == '' || total <= 0 || isNaN(total)){
        alertify.error("Total a pagar invalido");
        return false;
        
    }
//    var cont = $('#conttable').val();
//    alert('contar table: '+$('#conttable').val());
//    if (cont == 0){
//
//        alertify.error("Ingrese productos e intente nuevamente");
//        return false;
//    }

	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_historial.php",
			data: parametros,
                        cache: false,
                        contentType: false,
                        processData: false,

//			 beforeSend: function(objeto){
//				$("#resultados_ajaxnu").html("Mensaje: Cargando...");
//			  },
			success: function(datos){
//			$("#resultados_ajaxnu").html(datos);
//                        enviardetallehistoria(datos);

                            VentanaCentrada('tickethistoria.php?array='+datos,'Ticket Ficha','','320','500','true');

                            $("#tabla").load(location.href+" #tabla>*","");
                            $('#guardahistorial').trigger("reset");
                             alertify.success("Registrado exitosamente");


		  }
	});
  event.preventDefault();
});






$( "#guardacita" ).submit(function( event ) {
  $('#btngrabar').attr("disabled", true);

 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_cita.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajaxnu").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajaxnu").html(datos);
			$('#btngrabar').attr("disabled", false);

			$('#guardacita').trigger("reset");
		  }
	});
  event.preventDefault();
})

$('.asignarmasc').on('click', function(){
 var id = $(this).attr('cod');
 console.log(id);

$.ajax({
                url: './ajax/buscaridmascotas.php',
				type: 'POST',
				dataType: 'json',
				data: {id: id}
}).done(function(data){
    $("#txtid").val(data.id_mascota);
    $("#txtmasc").val(data.nombre+ ' - ' +data.especie+' - '+data.raza);
    $('.bd-example-modal-lg').modal('hide');
    alertify.success("Cliente agregado con éxito");

});
})

$( "#modimascota" ).submit(function( event ) {
//    $('#btngrabar').attr("disabled", true);

 var parametros = new FormData($(this)[0]);

	 $.ajax({
			type: "POST",
			url: "ajax/modimascota.php",
			data: parametros,
			cache: false,
    contentType: false,
    processData: false,
    type: 'POST',
			 beforeSend: function(objeto){
				$("#resultados_ajax").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax").html(datos);
//			$('#btngrabar').attr("disabled", false);
                        $("#panelmascota").load(location.href+" #panelmascota>*","");
                        $(".bd-example-modal-lg").modal('hide');


		  }
	});
  event.preventDefault();
  return false;
});

    $('#reserva').on('click', function(){
 // var check = $(this).attr('checked');
   //console.log(check);
      $("#reservacitas").children().remove();
      $("#reservacitas").append("<div class='form-group'><label>Fecha Final</label><input type='datetime-local' id='txtff'  name='txtff' class='form-control' required ></div>");


})
 $('#noreserva').on('click', function(){
         $("#reservacitas").children().remove();


 });

 ///////////////////////// area /////////////////
 $("#guardaarea").submit(function (event){
     var parametros = $(this).serialize();
     $.ajax({
         type: 'POST',
         url: "ajax/insertarea.php",
         data: parametros,
         beforeSend: function (data) {
             $("#resultados_ajaxnu").html("Cargando ...");

        },
        success: function (data) {
            $("#resultados_ajaxnu").html(data);

            $('#guardaarea').trigger("reset");
        }



     });
     event.preventDefault();


 });
 /////////// area /////////////
 ////////////////////////////////////////////////////////////////////
 ///////// modal area //////////
 function modaleditararea(cod){
// $('.modiarea').on('click', function(){
// var id = $(this).attr('cod');
  console.log(cod);

$.ajax({
       url: './ajax/buscaridarea.php',
        type: 'POST',
        dataType: 'json',
        data: {id: cod}
    }).done(function(data){
        $("#txtid").val(data.id_area);
        $("#txtdescrip").val(data.descripcion);
        $("#txtobservacion").val(data.observacion);


    });
};
///////////// editar area /////////////////
$( "#modarea" ).submit(function( event ) {
//  $('#btngrabar').attr("disabled", true);

 var parametros = $(this).serialize();
 console.log(parametros);
	 $.ajax({
			type: "POST",
			url: "ajax/modidiarea.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajaxnu").html(datos);
//			$('#btngrabar').attr("disabled", false);
                        $('#dataTables-example').dataTable()._fnAjaxUpdate();
                      $(".bd-example-modal-lg").modal('hide');


		  }
	});
  event.preventDefault();
});
///////////////////// consulta de utilidades ////////////////////
$("#formconsultautilidad").submit(function (event){

    var parametro= $(this).serialize();
    console.log(parametro);
    $.ajax({

        type: 'POST',
        url: "ajax/tabla_consultaringresos.php",
        data: parametro,
        beforeSend: function (data) {
            $("#tabla").html("Cargando ...");
        },
        success: function (data) {
            $("#tabla").html(data);
        }

    });

    event.preventDefault();

});

///////////////////// consulta de productividad ////////////////////
$("#formconsultaproductividad").submit(function (event){

    var parametro= $(this).serialize();
    console.log(parametro);
    $.ajax({

        type: 'POST',
        url: "ajax/tabla_consultarproductidad.php",
        data: parametro,
        beforeSend: function (data) {
            $("#tabla").html("Cargando ...");
        },
        success: function (data) {
            $("#tabla").html(data);
        }

    });

    event.preventDefault();

});
//////////////// modal cambio de clave doctor//////////////////
$('#cambioclave').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget) // Button that triggered the modal


      var recipient0 =  button.data('id')

//      var recipient11 = button.data('clave')


       // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

      var modal = $(this)
      modal.find('.modal-body #id').val(recipient0)


});

////////////////// cambio de clave doctor////////////////////
$("#formcambioclave").submit(function (event){
    var nclave = $("#nclave").val();
    var rclave = $("#repnclave").val();

//    console.log("antigua"+nclave);
//    console.log("nn"+rclave);
    if(nclave != rclave){
        alertify.error("Las claves no coinciden");
        return false;

    }

    var parametros = $(this).serialize();
//    console.log(parametros);
    $.ajax({
        type: 'POST',
        url: "ajax/cambio_clave.php",
        data: parametros,
        success: function (data) {
            $("#resultados_ajax").html(data);
            $("#cambioclave").modal('hide');
        }


    });

    event.preventDefault();


});

//////////////// modal cambio de clave cliente//////////////////
$('#cambioclaveclient').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget) // Button that triggered the modal


      var recipient0 =  button.data('id')

//      var recipient11 = button.data('clave')


       // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

      var modal = $(this)
      modal.find('.modal-body #id').val(recipient0)


});

////////////////// cambio de clave cliente////////////////////
$("#formcambioclaveclient").submit(function (event){
    var nclave = $("#nclave").val();
    var rclave = $("#repnclave").val();

//    console.log("antigua"+nclave);
//    console.log("nn"+rclave);
    if(nclave != rclave){
        alertify.error("Las claves no coinciden");
        return false;

    }

    var parametros = $(this).serialize();
//    console.log(parametros);
    $.ajax({
        type: 'POST',
        url: "ajax/cambio_clave_client.php",
        data: parametros,
        success: function (data) {
            $("#resultados_ajaxnu").html(data);
            $("#cambioclaveclient").modal('hide');
        }


    });

    event.preventDefault();


});


///////////////admin /////////

//////////////// modal cambio de clave admin//////////////////
$('#cambioclaveadmin').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget) // Button that triggered the modal


      var recipient0 =  button.data('id')

//      var recipient11 = button.data('clave')


       // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

      var modal = $(this)
      modal.find('.modal-body #id').val(recipient0)


});

////////////////// cambio de clave admin////////////////////
$("#formcambioclaveadmin").submit(function (event){
    var nclave = $("#nclave").val();
    var rclave = $("#repnclave").val();

//    console.log("antigua"+nclave);
//    console.log("nn"+rclave);
    if(nclave != rclave){
        alertify.error("Las claves no coinciden");
        return false;

    }

    var parametros = $(this).serialize();
//    console.log(parametros);
    $.ajax({
        type: 'POST',
        url: "ajax/cambio_clave_admin.php",
        data: parametros,
        success: function (data) {
            $("#resultados_ajaxnu").html(data);
            $("#cambioclaveadmin").modal('hide');
        }


    });

    event.preventDefault();


});

///////////////////////// modal editar admin //////////
function modaladmin(cod){
//$('.modicliente').on('click', function(){
// var id = $(this).attr('cod');
  console.log(cod);

$.ajax({
        url: './ajax/buscaridadmin.php',
        type: 'POST',
        dataType: 'json',
        data: {id: cod}
}).done(function(data){
    $("#txtid").val(data.id_admin);
    $("#txtnom").val(data.nombre);
    $("#txtape").val(data.apellidos);
    $("#txtdomi").val(data.direccion);
    $("#txtt1").val(data.telf1);
    $("#txtt2").val(data.telf2);
    $("#txtruc").val(data.ruc);
    $("#txtdni").val(data.dni);
    $("#txtema").val(data.email);
    $("#txtpw").val(data.paginaweb);

});
};
/////////////// modificar admin ///////////////////
$( "#modadmin" ).submit(function( event ) {
//  $('#btngrabar').attr("disabled", true);

 var parametros = $(this).serialize();
// console.log(parametros);
	 $.ajax({
			type: "POST",
			url: "ajax/modidiadmin.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajaxnu").html(datos);
//			$('#btngrabar').attr("disabled", false);
                        $('#dataTables-example').dataTable()._fnAjaxUpdate();
                        $(".bd-example-modal-lg").modal('hide');

		  }
	});
  event.preventDefault();
});

////////////// notificaciones ////////////////////////
function notificacion(){
    var msj="";
   console.log("ajax");
    $.ajax({
        type: 'POST',
        url: "ajax/verificacitaspendientes.php",
        dataType: 'json',
        success: function (data) {

            console.log(data);
//            item = data[0]["i"];
//            fecha = data[0]["fecha"];
//            cliente = data[0]["cliente"];
//            celular = data[0]["celular"];

            if(data.length>0){

                 for (var i=0;data.length>i;i++){

                  msj = msj + (data[i]["i"]+": "+data[i]["fecha"]+" "+data[i]["cliente"]+" "+data[i]["celular"]+"\n");
                }
                console.log (msj);

                Push.create("Citas por confirmar",{
                body: msj,
                icon: "img/calendar.png",
                timeout: 5000,
                vibrate: [100,100,100],
                onClick: function () {
                        window.location="http://localhost/sistemaveterinaria/sistemaveterinaria/lista_citas.php";
                        this.close();
                }
                });

            }


        }

    });

};

/////////////// agregar producto al documento ////////////////
function agregarprod(id,codigo,descripcion,op)
{

        var precio_venta=document.getElementById('precio').value;
        var cantidad=document.getElementById('cantidad').value;
//        var idmov = document.getElementById('cbmovimientoprod_'+id).value;
        //Inicia validacion
        console.log(precio_venta);
        console.log('canti'+cantidad);
        console.log('id prod'+id);
        console.log('op '+op);

        console.log('duplicado '+detalleduplicado(id,op));
        if (isNaN(cantidad))
        {
        alertify.error('Esto no es un numero');
        document.getElementById('cantidad_'+id).focus();
        return false;
        }
        if (isNaN(precio_venta))
        {
        alertify.error('Esto no es un numero');
        document.getElementById('precio_'+id).focus();
        return false;
        }
        if(detalleduplicado(id,op)>0){
         alertify.error('El producto '+codigo+' '+descripcion+' ya se encuentra cargado');
         return false;
        }
        //Fin validacion

        $.ajax({
                type: "POST",
                url: "ajax/detalle_documento.php",

//                            data: {a: $("#varia").val(),ar: $('#arrayy').val()},
                data: "id="+id+"&precio_venta="+precio_venta+"&cantidad="+cantidad+"&codigo="+codigo+"&descripcion="+descripcion+"&op="+op,
        //		 beforeSend: function(objeto){
        //			$("#resultados").html("Mensaje: Cargando...");
        //		  },
                success: function(datos){
                $("#tabla").html(datos);
                $(".bd-example-modal-lg2").modal('hide');
                alertify.success("Item agregado exitosamente");

                },
                error: function (datos){
                    alert(datos);
                }
            });
}
/////////////// agregar servicio baño ////////////////
function agregarprodbanio(id,codigo,descripcion)
{

        var precio_venta=document.getElementById('precio').value;
        var cantidad=document.getElementById('cantidad').value;
//        var idmov = document.getElementById('cbmovimientoprod_'+id).value;
        //Inicia validacion
        
        console.log(precio_venta);
        console.log('canti'+cantidad);
     
        if (isNaN(cantidad))
        {
        alertify.error('Esto no es un numero');
        document.getElementById('cantidad_'+id).focus();
        return false;
        }
        if (isNaN(precio_venta))
        {
        alertify.error('Esto no es un numero');
        document.getElementById('precio_'+id).focus();
        return false;
        }
        var total = precio_venta*cantidad;
        $('#textcodigo').val(codigo);
        $('#textdescrip').val(descripcion);
        $('#texttotal').val(total);
        $(".bd-example-modal-lg2").modal('hide');
        
        
    

}
//////////////////// valida duplicado ////////
function detalleduplicado(id,op){
   var valida='';
    $.ajax({
        type: 'POST',
        url: "ajax/valida_detalle_duplicado.php", ////////////// verifica si en el detalle del documento el producto ya existe
        async: false,
        data: {id:id,op:op},
        success: function (data) {
            console.log('dataduplicado'+data);
//            printduplicado(data);
            valida=data;

        }
    });

    return valida;
};


//////////////////////////////////////////////
 function eliminarproddet (id,op){
     if(confirm('¿Seguro que desea eliminar?')){

            }  else {
                return false;

            }
//	alert (op);
        $.ajax({
        type: "GET",
        url: "ajax/detalle_documento.php",
        data: "id="+id+"&op="+op,
                 beforeSend: function(objeto){
                        $("#tabla").html("Mensaje: Cargando...");
                  },
        success: function(datos){
                $("#tabla").html(datos);
                alertify.success("Item eliminado exitosamente");

                }
            });
}


////////////////// cargar ficha clinica venta ///////////////////////
function cargarhistventa(cliente,direccion,dni,email,idclient,doctor,iddoc,idhistoria,idmasc){



    console.log(idhistoria);

    $.ajax({
        type: 'POST',
        url: "ajax/facturarhistoria.php",
        data: {idhistoria:idhistoria,idmascota:idmasc},

        success: function (data) {
            
            console.log(data);
            $("#txtid").val(idclient);
            $("#txtclien").val(cliente);
            $("#txtiddoc").val(iddoc);
            $("#txtdoctor").val(doctor);
            $("#txtdireccion").val(direccion);
            $("#txtemail").val(email);
            $("#txtrucdni").val(dni);
            

            $(".bd-example-modal-lg4").modal('hide');

//           $("#resultados_ajaxnu").html(data);

            $("#tabla").load(location.href+" #tabla>*","");
           
            
            $("#idhistorial").val(idhistoria);
//            $("#tabla").load(location.href+" #tabla>*","");

            alertify.success("Ficha N°"+idmasc+" cargado");

        }
    });


}

////////////////// cargar banio venta ///////////////////////
function cargarbanioventa(cliente,direccion,dni,email,idclient,doctor,iddoc,idbanio,idmasc){



    console.log(idbanio);

    $.ajax({
        type: 'POST',
        url: "ajax/facturarbanio.php",
        data: {idbanio:idbanio,idmascota:idmasc},

        success: function (data) {
            
            console.log(data);
            $("#txtid").val(idclient);
            $("#txtclien").val(cliente);
            $("#txtiddoc").val(iddoc);
            $("#txtdoctor").val(doctor);
            $("#txtdireccion").val(direccion);
            $("#txtemail").val(email);
            $("#txtrucdni").val(dni);
            

            $(".bd-example-modal-lg4").modal('hide');

//           $("#resultados_ajaxnu").html(data);

            $("#tabla").load(location.href+" #tabla>*","");
           
            
            $("#idbanio").val(idbanio);
//            $("#tabla").load(location.href+" #tabla>*","");

            alertify.success("Ficha N°"+idmasc+" cargado");

        }
    });


}

////////////////////// guadar banio ///////////////////////
$( "#guardabanio" ).submit(function(event) {


  var parametros = $(this).serialize();


	 $.ajax({
                type: "POST",
                url: "ajax/nuevo_banio.php",
                data: parametros,

                success: function(datos){
//			$("#resultados_ajaxnu").html(datos);

                        console.log('datos '+datos);
                        
                        if(datos!=0){
                            
                            $('#guardabanio').trigger("reset");
                            VentanaCentrada('ticketbanio.php?id='+datos,'Ticket Baño','','320','500','true');

                             alertify.success("Registrado exitosamente");
                            
                        }else {
                             alertify.error("Error al registrar baño");
                            
                        }
//                        enviardetallehistoria(datos);

                    


		  }
	});
  event.preventDefault();


});
///////////////// calcular total ficha ///////////////////
function Calculartotalficha(){
    var consulta = parseFloat($('#textconsulta').val());
    var tratamiento = parseFloat($('#texttratamientocosto').val());
    var analisis = parseFloat($('#textanalisis').val());
    var vacuna = parseFloat($('#textvacuna').val());
    var servicios = parseFloat($('#textservicios').val());
    
    var total = 0;
    
    total = consulta+tratamiento+analisis+vacuna+servicios;
    
    $('#texttotal').val(total.toFixed(2));
    
    
    
}

/////////////////////////////


////////////////////// guadar venta ///////////////////////
$( "#guardarventas" ).submit(function(event) {


  var cliente = $('#txtid').val();
  var op = $('#op').val();
  
    console.log(op);
  var parametros = $(this).serialize();
    var cont = $('#conttable').val();
//    alert('contar table: '+$('#conttable').val());
//    alert(cliente+'  idcleitne');
    if(cliente == ''){
        alertify.error("Ingrese cliente e intente nuevamente");
        return false;
        
    }
    
    if (cont == 0){

        alertify.error("Ingrese productos e intente nuevamente");
        return false;
    }

	 $.ajax({
                type: "POST",
                url: "ajax/nuevo_venta.php",
                data: parametros,

//			 beforeSend: function(objeto){
//				$("#resultados_ajaxnu").html("Mensaje: Cargando...");
//			  },
                success: function(datos){
//			$("#resultados_ajaxnu").html(datos);
                        console.log('iddocumento '+datos);
//                        enviardetallehistoria(datos);

                    

                    $("#tabla").load(location.href+" #tabla>*","");
//                     $("#ficha").load(location.href+" #ficha>*","");
                    $('#guardarventas').trigger("reset");
                    VentanaCentrada('ticketventa.php?iddoc='+datos,'Ticket','','320','500','true');
                    
                     alertify.success("Registrado exitosamente");


		  }
	});
//  event.preventDefault();


})

//////////////////////////////////////////////
notificacion();
setInterval(function(){
notificacion();
},300000);


