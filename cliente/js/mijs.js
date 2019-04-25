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
})



$( "#guardarventas" ).submit(function( event ) {
  $('#btngrabar').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/insertnuevaventa.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajaxnu").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajaxnu").html(datos);
			$('#btngrabar').attr("disabled", false);
	$('#guardarventas').trigger("reset");
		  }
	});
  event.preventDefault();
})
$( "#guarproducto" ).submit(function( event ) {
  $('#btngrabar').attr("disabled", true);
  
 var parametros = $(this).serialize();
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
})



//GUARDAR ALUMNO
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
})

$('.modiunida').on('click', function(){
  var id = $(this).attr('cod'); //aqui cogera el id 
  console.log(id);
$.ajax({
                url: './ajax/buscaridunidadmedida.php',// tu url donde vas a consltar el id
                type: 'POST',
                dataType: 'json',
                data: {id: id }
    
}).done(function(data){// data es el json q recoge 
 //console.log(data);
    $("#txtco").val(data.codigo);
    $("#txtdes").val(data.descripcion);
    $("#txtpre").val(data.precio);
    $("#txtsto").val(data.stock);
    $("#txtac").val(data.activo);
    $("#txtob").val(data.observacion);
    //$("#txtunime").val(data.id_unidad_medida);
    $("#txtid").val(data.id_producto);
       
});
});

////////////////// AGREGAR EXISTENCIAS - LOTE ////////////////
$('.btnagregarstock').on('click', function(){
  var id = $(this).attr('cod'); //aqui cogera el id 
  console.log(id);
$.ajax({
                url: './ajax/buscaridunidadmedida.php',// tu url donde vas a consltar el id
                type: 'POST',
                dataType: 'json',
                data: {id: id }
    
}).done(function(data){// data es el json q recoge 
 //console.log(data);
// alert(data.lote);
//alert(id);
    
    $("#txtlote").val(data.lote);
    $("#txtidproducto").val(data.id_producto);
    $('#lblcantidad').html('Cantidad X '+data.unidmedcompra);
    
    if(data.lote==0){
        $("#txtfechfa").hide();
        $("#lblfechaf").hide();
        $("#txtfechaexp").hide();
         $("#lblfechaexp").hide();
        
        $("#txtnlote").hide();
        $("#lbllote").hide();
        $("#txtrs").hide();
        $("#lblrs").hide();
        $("#txtrs").removeAttr("required");
        $("#txtnlote").removeAttr("required");
         $("#txtfechfa").removeAttr("required");
         $("#txtfechaexp").removeAttr("required");
//        $("#txtcant").hide();
  
    }else {
     
        $("#txtfechfa").show();
        $("#lblfechaf").show();
        $("#txtfechaexp").show();
         $("#lblfechaexp").show();
        
        $("#txtnlote").show();
        $("#lbllote").show();
        $("#txtrs").show();
        $("#lblrs").show();               
    }
});
});
///////////////////////////////////////////
////////////////// insertar existencias /////////
$( "#modexistencias" ).submit(function( event ) {
  $('#btngrabar').attr("disabled", true);
  alert ('awui');
 var parametros = $(this).serialize();
 alert (parametros);
	 $.ajax({
			type: "POST",
			url: "ajax/insertexistencias.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados").html(datos);
			$('#btngrabar').attr("disabled", false);
			
			
		  }
	});
  event.preventDefault();
});


//GUARDAR MODICACIÓN DEL PRODUCTO
$( "#modicaunidadmedida" ).submit(function( event ) {
  $('#btngrabar').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/modiproducto.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajaxnu").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajaxnu").html(datos);
			$('#btngrabar').attr("disabled", false);
			
			
		  }
	});
  event.preventDefault();
});

//GUARDAR DATOS ALUMNOS MODIFICADOS
$( "#modiusuario" ).submit(function( event ) {
  $('#btngrabar').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/modiusuario.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajaxnu").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajaxnu").html(datos);
			$('#btngrabar').attr("disabled", false);
			
            
		  }
	});
  event.preventDefault();
    alertify.success("Actualizado con éxito"); 
})


    
//ENVIAR ID A LA CAJA APODERADO

$('.asignar').on('click', function(){
    
     var id = ($("#txtcodigo").val());

     $("#codigo").val(id);
  alertify.success("Agregado con éxito"); 
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
  console.log(id);
$.ajax({
                url: './ajax/buscaridclientes.php',// tu url donde vas a consltar el id
				type: 'POST',
				dataType: 'json',
				data: {id: id}
}).done(function(data){// data es el json q recoge 
 //console.log(data);
    $("#txtid").val(data.id_cliente);
    $("#txtclien").val(data.apellidos+ ' ' +data.nombre);
    alertify.success("Cliente agragado con éxito");    
})
})



/// cargar datos al modal para modificar usuarios

$('.modiusu').on('click', function(){
 var id = $(this).attr('cod'); //aqui cogera el id 
//  console.log(id);
$.ajax({
                url: './ajax/buscaridusuarios.php',// tu url donde vas a consltar el id
				type: 'POST',
				dataType: 'json',
				data: {id: id }
    
}).done(function(data){// data es el json q recoge 
 //console.log(data);
    $("#txtape").val(data.apellidos);
    $("#txtnom").val(data.nombre);
    $("#txtpa").val(data.paginaweb);
    $("#txtdomi").val(data.direccion);
    $("#txtdni").val(data.dni);
    $("#txttele1").val(data.telf1);
    $("#txttele2").val(data.telf2);
  
    $("#txtid").val(data.id_cliente);

    $("#txtruc").val(data.ruc);
    $("#txtni").val(data.idnivel);
    $("#usuario").val(data.email);
    $("#clave").val(atob(data.clave));
       
})
})
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
                    return;
                        }
			 var id = $(this).attr('cod');
			 var pre = $(this).attr('pre');
                         var stck = $(this).attr('st');
                         console.log(id);
                         console.log(pre);
                         console.log(can);
                         console.log(stck);
                         
                         if(can>stck){
                            alertify.error("Candidad no permitidad Debe ser igual o menor al STOCK.!");
                            return; 
                         }
                      
		
			$.ajax({
				type:"POST",
				data:{id: id , pre: pre , can: can},
				url:"classes/agregaProductoTemp.php",
				success:function(r){
					$('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
                                        alertify.success("Agregado al Carrito!");
				}
			});
		});
                
                
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
        
        $('#pagatodopension').on('click', function(){   
         $("#factura").children().remove();
            })
        
        $('#abonopension').on('click', function(){
    
 
      $("#factura").children().remove();
      $("#factura").append("<input type='text' id='txtruc'  name='txtruc' class='form-control' required placeholder='Ruc'><br>");
      $("#factura").append("<input type='text' id='txtrz'  name='txtrz' class='form-control' required placeholder='Razón Social'><br>");
      $("#factura").append("<input type='text' id='txtdir'  name='txtdir' class='form-control' required placeholder='Dirección'>");
    
      //$("#pagartodo").append("<hr> <input type='button' name='btnabonar' id='btnabonar' value='Abonar' class='btn btn-primary'>");
      //  $("#txtabo").val(data.costopension);
     //$("#txtpen").val(data.costopension);
    
})

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
			$('#guardarmascota').trigger("reset");
		  }
	});
  event.preventDefault();
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
        alertify.success("Cliente agragado con éxito"); 
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

$('.modicliente').on('click', function(){
 var id = $(this).attr('cod'); 
  console.log(id);
 
$.ajax({
                url: './ajax/buscaridclientes.php',
				type: 'POST',
				dataType: 'json',
				data: {id: id}
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
})

$( "#modcliente" ).submit(function( event ) {
  $('#btngrabar').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/modidicliente.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajaxnu").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajaxnu").html(datos);
			$('#btngrabar').attr("disabled", false);
                      
		  }
	});
  event.preventDefault();
})

$('.momascota').on('click', function(){
 var id = $(this).attr('cod'); 
  console.log(id);
 
$.ajax({
                url: './ajax/buscarmismascotas.php',
				type: 'POST',
				dataType: 'json',
				data: {id: id}
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
    //$("#txtfoto").val(data.foto);
    $("#txtco").val(data.codigodvi);
         
});
})

$( "#guardahistorial" ).submit(function( event ) {
  $('#btngrabar').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_historial.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajaxnu").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajaxnu").html(datos);
			$('#btngrabar').attr("disabled", false);
			
			$('#guardahistorial').trigger("reset");
		  }
	});
  event.preventDefault();
})


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
$( "#guardacitacale" ).submit(function( event ) {
  $('#btngrabar').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_cita_calendario.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajaxnu").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajaxnu").html(datos);
			$('#btngrabar').attr("disabled", false);
			
			$('#guardacitacale').trigger("reset");
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
    $(".bd-example-modal-lg").modal('hide');
    alertify.success("Mascota agregado con éxito");
    
});
})

$( "#modimascota" ).submit(function( event ) {
    $('#btngrabar').attr("disabled", true);

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
			$('#btngrabar').attr("disabled", false);
			
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
            
 
 })