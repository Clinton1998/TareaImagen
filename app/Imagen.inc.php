<?php 

class Imagen{//definimos una clase (molde o maqueta de objeto)-->

	//atributos
	private $size;
	private $width;
	private $alto;
	private $directorio;
	private $num;


	//atribtuos de error
	private $error_width;
	private $error_height;

	//metodos

	public function __construct($imagen_directorio,$anch,$alt,$num){
	$this->error_width=$this->validar_ancho($anch);
	$this->error_height=$this->validar_alto($alt);
	$this->directorio=$imagen_directorio;
	$this->num=$num;
}

	public function validar_variable($variable){
		//este metodo devolvera un dato booleando
		if(isset($variable) && !empty($variable)){
			return true;
		}else{
			return false;
		}
	}
	public function validar_ancho($an){
		if(!$this->validar_variable($an)){
			return "Debe ingresar el ancho";

		}else{
			if(!is_numeric($an)){
				return "Debe ingresar un numero";
			}else{
				if($an<=0){
					return "El ancho no es valido";
				}else{
				$this->ancho=$an;
				return "";	
				}
			
			}
		}
	}
	public function validar_alto($al){
			if(!$this->validar_variable($al)){
			return "Debe ingresar el alto";

		}else{
			if(!is_numeric($al)){
				return "Debe ingresar un numero";
			}else{
				if($al<=0){
					return "El alto no es valido";
				}else{
				$this->alto=$al;
				return "";	
				}
				
			}	
		}
	}
	public function darleDimension(){
			$ancho=$this->ancho;
			$alto=$this->alto;
			$img_origen=imagecreatefromjpeg($this->directorio);
			$ancho_origen=imagesx($img_origen);
			$alto_origen=imagesy($img_origen);
			$ancho_origen=$ancho;
			$alto_origen=$alto;
			/*
			if($ancho_origen>$alto_origen){//si es una imagen horizontal
				$ancho_origen=$ancho_limite;
				$alto_origen=$ancho_limite*imagesy($img_origen)/imagesx($img_origen);
			}else{//para fotos verticales
				$alto_origen=$ancho_limite;
				$ancho_origen=$ancho_limite*imagesx($img_origen)/imagesy($img_origen);

			}
			*/
			$img_destino=imagecreatetruecolor($ancho_origen,$alto_origen);//se crea la imagen
			imagecopyresized($img_destino,$img_origen,0,0,0,0,$ancho_origen,$alto_origen,imagesx($img_origen),imagesy($img_origen));
			$nuevaimagen=imagejpeg($img_destino,"img/Clinton$this->num.jpg");//se guarda la nueva imagen 
	}
	public function mostrar_ancho(){
		return $this->ancho;
	}
	public function mostrar_alto(){
		return $this->alto;
	}
	public function mostrar_error_ancho(){
		if($this->error_width!==""){
			echo self::formatoHTML($this->error_width);
		}
	}

	public function mostrar_error_alto(){
		if($this->error_height!==""){
			echo self::formatoHTML($this->error_height);

		}

	}
	public function formatoHTML($var){
		return "<div class='alert alert-danger formato'>$var</div>";

	}
	public function todoescorrecto(){
		//este metodo devolver un dato booleano
		if($this->error_width=="" && $this->error_height==""){
			return true;
		}else{

			return false;	
		}
}



}
 ?>
