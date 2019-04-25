<?php 
/**
 * Description of TempDAO
 *
 * @author HERNAN
 */

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/config/DataSource.php");

//require_once ($_SERVER['DOCUMENT_ROOT']."/aquavita/interface/interfacephp.php");

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/temp.php");

class TempDAO 
{
    public function actulizar($objeto) {
        
    }

public function borrar($id,$op){
        $data_source = new DataSource();
        $filas=0;
        $filas=$data_source->ejecutarActualizacion("delete  from temp where id_user=".$id." and op="."'".$op."'"
               );
        return $filas;
        
    }
    
    public function borrarsegunid($id){
        $data_source = new DataSource();
        $filas=0;
        $filas=$data_source->ejecutarActualizacion("DELETE FROM temp WHERE id_temp=$id
               ");
        return $filas;
        
    }

    public function buscar($cadena, $tipo) {
        
    }

    public function duplicado($id, $op,$iden) {
        $data_source = new DataSource();
        $filas=0;
        $data_tabla=$data_source->ejecutarconsulta("select * from temp where id_producto=? and op=? and identifica=?;",
                array($id,$op,$iden));
        foreach ($data_tabla as $clave => $valor){
            $filas++;
        }
        return $filas;
        
    }

    public function insertar($objeto) {
        
        $data_source = new DataSource();
        $filas=0;
        $temp = new Temp();
        $temp = $objeto;
        $filas=$data_source->ejecutarActualizacion("insert into temp(cantidad,precio,id_producto,id_user,codigo,descripcion,op,identifica,fecha_fabricacion,"
                . "fecha_expiracion,nlote,rs,lote) values(?,?,?,?,?,?,?,?,?,?,?,?,?);",
                array($temp->getCantidad(),$temp->getPrecio(),
                    $temp->getIdproducto(),$temp->getIduser(),$temp->getCodigo(),$temp->getDescripcion(),
                    $temp->getOp(),$temp->getIdenti(),$temp->getFechaf(),$temp->getFechaex(),$temp->getNlote(),$temp->getRs(),$temp->getLote()));
        return $filas;
   
    }

    public function select() {
        
    }

    public function selectid($id,$op,$identifica) {
        $data_source = new DataSource();
        
        $data_tabla = $data_source->ejecutarconsulta("SELECT id_temp,t.cantidad,t.precio,t.id_producto,id_user,t.codigo,t.descripcion,op,
identifica,abreviatura,cods.codigo as codsunat,fecha_fabricacion,fecha_expiracion,t.nlote,t.rs,t.lote from temp as t INNER JOIN producto as p on t.id_producto=p.id_producto
INNER JOIN unidadmedida as unid on p.id_unidad_medida=unid.id_unidad_medida INNER JOIN
codigo_prod_sunat as cods on cods.id_codigosunat=p.id_codigosunat where id_user=? and op=? and identifica=?;",
                array($id,$op,$identifica));
       
        
        $temps= array();
        $temp=null;
        foreach ($data_tabla as $clave => $valor){
           $temp= new Temp();
           $temp->setId($data_tabla[$clave]["id_temp"]);
           $temp->setCantidad($data_tabla[$clave]["cantidad"]);
           $temp->setPrecio($data_tabla[$clave]["precio"]);
           $temp->setIdproducto($data_tabla[$clave]["id_producto"]);
           $temp->setIduser($data_tabla[$clave]["id_user"]);
           $temp->setCodigo($data_tabla[$clave]["codigo"]);
           $temp->setDescripcion($data_tabla[$clave]["descripcion"]);
//           $temp->setIdmov($data_tabla[$clave]["id_mov"]);
           $temp->setCodigosunat($data_tabla[$clave]["codsunat"]);
           $temp->setUnidmedsunat($data_tabla[$clave]["abreviatura"]);
           
           $temp->setFechaf($data_tabla[$clave]["fecha_fabricacion"]);
           $temp->setFechaex($data_tabla[$clave]["fecha_expiracion"]);
           $temp->setNlote($data_tabla[$clave]["nlote"]);
           $temp->setRs($data_tabla[$clave]["rs"]);
           $temp->setLote($data_tabla[$clave]["lote"]);
           
           
           array_push($temps, $temp);
            
        }
        return $temps;
        
    }

    public function borrarid($id,$identifica,$op) {
        $data_source = new DataSource();
        $filas=0;
        $filas=$data_source->ejecutarActualizacion("delete from temp where id_user=? and identifica=? and op=?;",
                array($id,$identifica,$op));
        return $filas;
    }

//put your code here
}

