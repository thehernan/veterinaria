<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of consumir
 *
 * @author HERNAN
 */
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/documentocontrolller.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/temp.php");

class consumir {
    //put your code here
    private $cabecera;
    private $detalles;
    private $documentocontrol;
    
    function __construct($cabecera, $detalles) {
        $this->cabecera = $cabecera;
        $this->detalles = $detalles;
        $this->documentocontrol = new documentocontroller();
        
//        var_dump($cabecera->getRazonsocial());
//        var_dump($detalles);
    }
    function getCabecera() {
        return $this->cabecera;
    }

    function getDetalle() {
        return $this->detalles;
    }

    function setCabecera($cabecera) {
        $this->cabecera = $cabecera;
    }

    function setDetalle($detalles) {
        $this->detalles = $detalles;
    }
    
    function consumirapi(){
        
        $valida = true;
        // RUTA para enviar documentos
        $ruta = "https://api.nubefact.com/api/v1/a9716fb6-02eb-43eb-9d1c-333ee2c7a27d";

        //TOKEN para enviar documentos
        $token = "e2f2c6f49ffd4526a667c504d91971b46aaf85d7610146a68b5ee0c90c203506";

        /*
        #########################################################
        #### PASO 2: GENERAR EL ARCHIVO PARA ENVIAR A NUBEFACT ####
        +++++++++++++++++++++++++++++++++++++++++++++++++++++++
        # - MANUAL para archivo JSON en el link: https://goo.gl/WHMmSb
        # - MANUAL para archivo TXT en el link: https://goo.gl/Lz7hAq
        +++++++++++++++++++++++++++++++++++++++++++++++++++++++
         */
        
//        $this->cabecera = new documento();
        
        //////// construir array para el detalle 
          $detalle = new Temp();
          $arraydets = array();
           foreach ($this->detalles as $detalle){
              $arraydet=  array(
                    "unidad_de_medida"          => $detalle->getUnidmedsunat(), //"NIU",
                    "codigo"                    => $detalle->getCodigo(), //"001",
                    "codigo_producto_sunat"     => $detalle->getCodigosunat(), //"001",
                    "descripcion"               => $detalle->getDescripcion(), //"DETALLE DEL PRODUCTO",
                    "cantidad"                  => $detalle->getCantidad(), //"1",
                    "valor_unitario"            => $detalle->getPrecio()/1.18, //"500",
                    "precio_unitario"           => $detalle->getPrecio(),//"590",
                    "descuento"                 => "",
                    "subtotal"                  => ($detalle->getPrecio()*$detalle->getCantidad())/1.18, //"500",
                    "tipo_de_igv"               => "1",
                    "igv"                       => ($detalle->getPrecio()*$detalle->getCantidad())-(($detalle->getPrecio()*$detalle->getCantidad())/1.18), //"90",
                    "total"                     => $detalle->getPrecio()*$detalle->getCantidad(), //"590",
                    "anticipo_regularizacion"   => "false",
                    "anticipo_documento_serie"  => "",
                    "anticipo_documento_numero" => "" 
                );
                array_push($arraydets,$arraydet);
                
            }
//            var_dump($arraydets);
        

        $data = array(
            "operacion"				=> "generar_comprobante",
            "tipo_de_comprobante"               => $this->cabecera->getComprobante(), //"1",
            "serie"                             => $this->cabecera->getSerie(), //"BBB1",
            "numero"				=> $this->cabecera->getNumero(), //"11",
            "sunat_transaction"			=> "1",
            "cliente_tipo_de_documento"		=> $this->cabecera->getTipodoccliente(),// "6",
            "cliente_numero_de_documento"	=> $this->cabecera->getNumerodoccliente(), //"20600695771",
            "cliente_denominacion"              => $this->cabecera->getRazonsocial(),//"NUBEFACT SA",
            "cliente_direccion"                 => $this->cabecera->getDireccion(),//"CALLE LIBERTAD 116 MIRAFLORES - LIMA - PERU",
            "cliente_email"                     => $this->cabecera->getEmail(),
            "cliente_email_1"                   => "",
            "cliente_email_2"                   => "",
            "fecha_de_emision"                  => date('d-m-Y'),
            "fecha_de_vencimiento"              => "",
            "moneda"                            => "1",
            "tipo_de_cambio"                    => "",
            "porcentaje_de_igv"                 => "18.00",
            "descuento_global"                  => "",
            "descuento_global"                  => "",
            "total_descuento"                   => "",
            "total_anticipo"                    => "",
            "total_gravada"                     =>$this->cabecera->getTotal()/1.18,// "600",
            "total_inafecta"                    => "",
            "total_exonerada"                   => "",
            "total_igv"                         => (($this->cabecera->getTotal())-($this->cabecera->getTotal()/1.18)),//"108",
            "total_gratuita"                    => "",
            "total_otros_cargos"                => "",
            "total"                             => $this->cabecera->getTotal(), //"708",
            "percepcion_tipo"                   => "",
            "percepcion_base_imponible"         => "",
            "total_percepcion"                  => "",
            "total_incluido_percepcion"         => "",
            "detraccion"                        => "false",
            "observaciones"                     => "",
            "documento_que_se_modifica_tipo"    => "",
            "documento_que_se_modifica_serie"   => "",
            "documento_que_se_modifica_numero"  => "",
            "tipo_de_nota_de_credito"           => "",
            "tipo_de_nota_de_debito"            => "",
            "enviar_automaticamente_a_la_sunat" => "true",
            "enviar_automaticamente_al_cliente" => "false",
            "codigo_unico"                      => "",
            "condiciones_de_pago"               => "",
            "medio_de_pago"                     => "",
            "placa_vehiculo"                    => "",
            "orden_compra_servicio"             => "",
            "tabla_personalizada_codigo"        => "",
            "formato_de_pdf"                    => "",
            "items" =>  $arraydets
                                
                            
//                            array(
//                                "unidad_de_medida"          => "NIU",
//                                "codigo"                    => "001",
//                                "descripcion"               => "DETALLE DEL PRODUCTO",
//                                "cantidad"                  => "1",
//                                "valor_unitario"            => "500",
//                                "precio_unitario"           => "590",
//                                "descuento"                 => "",
//                                "subtotal"                  => "500",
//                                "tipo_de_igv"               => "1",
//                                "igv"                       => "90",
//                                "total"                     => "590",
//                                "anticipo_regularizacion"   => "false",
//                                "anticipo_documento_serie"  => "",
//                                "anticipo_documento_numero" => ""
//                            ),
//                            array(
//                                "unidad_de_medida"          => "ZZ",
//                                "codigo"                    => "001",
//                                "descripcion"               => "DETALLE DEL SERVICIO",
//                                "cantidad"                  => "5",
//                                "valor_unitario"            => "20",
//                                "precio_unitario"           => "23.60",
//                                "descuento"                 => "",
//                                "subtotal"                  => "100",
//                                "tipo_de_igv"               => "1",
//                                "igv"                       => "18",
//                                "total"                     => "118",
//                                "anticipo_regularizacion"   => "false",
//                                "anticipo_documento_serie"  => "",
//                                "anticipo_documento_numero" => ""
//
//                            )
            );
//        );

//        var_dump($data);
        $data_json = json_encode($data);

        /*
        #########################################################
        #### PASO 3: ENVIAR EL ARCHIVO A NUBEFACT ####
        +++++++++++++++++++++++++++++++++++++++++++++++++++++++
        # SI ESTÁS TRABAJANDO CON ARCHIVO JSON
        # - Debes enviar en el HEADER de tu solicitud la siguiente lo siguiente:
        # Authorization = Token token="8d19d8c7c1f6402687720eab85cd57a54f5a7a3fa163476bbcf381ee2b5e0c69"
        # Content-Type = application/json
        # - Adjuntar en el CUERPO o BODY el archivo JSON o TXT
        # SI ESTÁS TRABAJANDO CON ARCHIVO TXT
        # - Debes enviar en el HEADER de tu solicitud la siguiente lo siguiente:
        # Authorization = Token token="8d19d8c7c1f6402687720eab85cd57a54f5a7a3fa163476bbcf381ee2b5e0c69"
        # Content-Type = text/plain
        # - Adjuntar en el CUERPO o BODY el archivo JSON o TXT
        +++++++++++++++++++++++++++++++++++++++++++++++++++++++
        */

        //Invocamos el servicio de NUBEFACT
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $ruta);
        curl_setopt(
                $ch, CURLOPT_HTTPHEADER, array(
                'Authorization: Token token="'.$token.'"',
                'Content-Type: application/json',
                )
        );
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respuesta  = curl_exec($ch);
        curl_close($ch);

        /*
         #########################################################
        #### PASO 4: LEER RESPUESTA DE NUBEFACT ####
        +++++++++++++++++++++++++++++++++++++++++++++++++++++++
        # Recibirás una respuesta de NUBEFACT inmediatamente lo cual se debe leer, verificando que no haya errores.
        # Debes guardar en la base de datos la respuesta que te devolveremos.
        # Escríbenos a soporte@nubefact.com o llámanos al teléfono: 01 468 3535 (opción 2) o celular (WhatsApp) 955 598762
        # Puedes imprimir el PDF que nosotros generamos como también generar tu propia representación impresa previa coordinación con nosotros.
        # La impresión del documento seguirá haciéndose desde tu sistema. Enviaremos el documento por email a tu cliente si así lo indicas en el archivo JSON o TXT.
        +++++++++++++++++++++++++++++++++++++++++++++++++++++++++
         */

        $leer_respuesta = json_decode($respuesta, true);
        if (isset($leer_respuesta['errors'])) {
                //Mostramos los errores si los hay
            echo $leer_respuesta['errors'];
          
            $valida=false;
            
        } else {
                //Mostramos la respuesta
        ?>

        <?php
        
            $this->cabecera->setSerie($leer_respuesta['serie']);
            $this->cabecera->setNumero($leer_respuesta['numero']);
            $this->cabecera->setEnlace($leer_respuesta['enlace']);
            $this->cabecera->setAceptadasunat($leer_respuesta['aceptada_por_sunat']);
            $this->cabecera->setSunatdescrip($leer_respuesta['sunat_description']);
            $this->cabecera->setSunatnote($leer_respuesta['sunat_note']);
            $this->cabecera->setSunatresponse($leer_respuesta['sunat_responsecode']);
            $this->cabecera->setSunaterror($leer_respuesta['sunat_soap_error']);
            $this->cabecera->setPdf($leer_respuesta['pdf_zip_base64']);
            $this->cabecera->setXml($leer_respuesta['xml_zip_base64']);
            $this->cabecera->setQr($leer_respuesta['cadena_para_codigo_qr']);
            $this->cabecera->setCodigohash($leer_respuesta['codigo_hash']);
            
//            $this->documentocontrol->update($this->cabecera);
            
                    
        }
        
        
        
        return $this->cabecera;
    }



    

    
    
   
}
