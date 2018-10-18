<?php
namespace App\Helpers\Envato;

define('XSD_CFDI',app_path()."\\Files\\cfdi\\xsd\\".'v33\\cfdv33.xsd');
define('XSD_TFD',app_path()."\\Files\\cfdi\\xsd\\".'v33\\TimbreFiscalDigitalv11.xsd');
define('XSLT_CFDI',app_path()."\\Files\\cfdi\\xslt\\".'v33\\cadenaoriginal_3_3.xslt');
use Carbon\Carbon;
class Cfdi
{
  static $_instance;
  public function __construct(){}

  public static function getInstance(){
     if(!(self::$_instance instanceof self)) self::$_instance=new self();
     return self::$_instance;
  }

 public function getXML(){return $this->XML;}
 public function getXMLName(){return $this->XMLName;}
 public function getEsquemaID(){return (isset($this->esquemaID)?$this->esquemaID:NULL);}

 public function getVersion(){return (isset($this->version)?$this->version:NULL);}
 public function getSerie(){return (isset($this->serie)?$this->serie:NULL);}
 public function getFolio(){return (isset($this->folio)?$this->folio:NULL);}
 public function getFecha(){return (isset($this->fecha)?$this->fecha:NULL);}
 public function getNoAprobacion(){return (isset($this->noAprobacion)?$this->noAprobacion:NULL);}
 public function getAnoAprobacion(){return (isset($this->anoAprobacion)?$this->anoAprobacion:NULL);}
 public function getTipoDeComprobante(){return (isset($this->tipoDeComprobante)?$this->tipoDeComprobante:NULL);}
 public function getLugarExpedicion(){return (isset($this->lugarExpedicion)?$this->lugarExpedicion:NULL);}
 public function getCondicionesDePago(){return (isset($this->condicionesDePago)?$this->condicionesDePago:NULL);}
 public function getNoCertificado(){return (isset($this->noCertificado)?$this->noCertificado:NULL);}
 public function getCertificado(){return (isset($this->certificado)?$this->certificado:NULL);}
 public function getSello(){return (isset($this->sello)?$this->sello:NULL);}
 public function getSubTotal(){return (isset($this->subTotal)?$this->subTotal:NULL);}
 public function getDescuento(){return (isset($this->descuento)?$this->descuento:NULL);}
 public function getMotivoDescuento(){return (isset($this->motivoDescuento)?$this->motivoDescuento:NULL);}
 public function getTotal(){return (isset($this->total)?$this->total:NULL);}
 public function getTipoCambio(){return (isset($this->tipoCambio)?$this->tipoCambio:NULL);}
 public function getMoneda(){return (isset($this->moneda)?$this->moneda:NULL);}
 public function getMetodoDePago(){return (isset($this->metodoDePago)?$this->metodoDePago:NULL);}
 public function getEmisorRfc(){return (isset($this->emisorRfc)?$this->emisorRfc:NULL);}
 public function getEmisorNombre(){return (isset($this->emisorNombre)?$this->emisorNombre:NULL);}
 public function getEmisorDomicilioFiscalCalle(){return (isset($this->emisorDomicilioFiscalCalle)?$this->emisorDomicilioFiscalCalle:NULL);}
 public function getEmisorDomicilioFiscalNoExterior(){return (isset($this->emisorDomicilioFiscalNoExterior)?$this->emisorDomicilioFiscalNoExterior:NULL);}
 public function getEmisorDomicilioFiscalNoInterior(){return (isset($this->emisorDomicilioFiscalNoInterior)?$this->emisorDomicilioFiscalNoInterior:NULL);}
 public function getEmisorDomicilioFiscalColonia(){return (isset($this->emisorDomicilioFiscalColonia)?$this->emisorDomicilioFiscalColonia:NULL);}
 public function getEmisorDomicilioFiscalLocalidad(){return (isset($this->emisorDomicilioFiscalLocalidad)?$this->emisorDomicilioFiscalLocalidad:NULL);}
 public function getEmisorDomicilioFiscalMunicipio(){return (isset($this->emisorDomicilioFiscalMunicipio)?$this->emisorDomicilioFiscalMunicipio:NULL);}
 public function getEmisorDomicilioFiscalEstado(){return (isset($this->emisorDomicilioFiscalEstado)?$this->emisorDomicilioFiscalEstado:NULL);}
 public function getEmisorDomicilioFiscalPais(){return (isset($this->emisorDomicilioFiscalPais)?$this->emisorDomicilioFiscalPais:NULL);}
 public function getEmisorDomicilioFiscalCodigoPostal(){return (isset($this->emisorDomicilioFiscalCodigoPostal)?$this->emisorDomicilioFiscalCodigoPostal:NULL);}
 public function getEmisorDomicilioFiscalReferencia(){return (isset($this->emisorDomicilioFiscalReferencia)?$this->emisorDomicilioFiscalReferencia:NULL);}
 public function getEmisorRegimen(){return (isset($this->emisorRegimen)?$this->emisorRegimen:NULL);}
 public function getReceptorRfc(){return (isset($this->receptorRfc)?$this->receptorRfc:NULL);}
 public function getReceptorNombre(){return (isset($this->receptorNombre)?$this->receptorNombre:NULL);}
 public function getReceptorDomicilioFiscalCalle(){return (isset($this->receptorDomicilioFiscalCalle)?$this->receptorDomicilioFiscalCalle:NULL);}
 public function getReceptorDomicilioFiscalNoExterior(){return (isset($this->receptorDomicilioFiscalNoExterior)?$this->receptorDomicilioFiscalNoExterior:NULL);}
 public function getReceptorDomicilioFiscalNoInterior(){return (isset($this->receptorDomicilioFiscalNoInterior)?$this->receptorDomicilioFiscalNoInterior:NULL);}
 public function getReceptorDomicilioFiscalColonia(){return (isset($this->receptorDomicilioFiscalColonia)?$this->receptorDomicilioFiscalColonia:NULL);}
 public function getReceptorDomicilioFiscalLocalidad(){return (isset($this->receptorDomicilioFiscalLocalidad)?$this->receptorDomicilioFiscalLocalidad:NULL);}
 public function getReceptorDomicilioFiscalMunicipio(){return (isset($this->receptorDomicilioFiscalMunicipio)?$this->receptorDomicilioFiscalMunicipio:NULL);}
 public function getReceptorDomicilioFiscalEstado(){return (isset($this->receptorDomicilioFiscalEstado)?$this->receptorDomicilioFiscalEstado:NULL);}
 public function getReceptorDomicilioFiscalPais(){return (isset($this->receptorDomicilioFiscalPais)?$this->receptorDomicilioFiscalPais:NULL);}
 public function getReceptorDomicilioFiscalCodigoPostal(){return (isset($this->receptorDomicilioFiscalCodigoPostal)?$this->receptorDomicilioFiscalCodigoPostal:NULL);}
 public function getReceptorDomicilioFiscalReferencia(){return (isset($this->receptorDomicilioFiscalReferencia)?$this->receptorDomicilioFiscalReferencia:NULL);}
 public function getConceptos(){return (isset($this->conceptos)?$this->conceptos:NULL);}
 public function getImpuestos(){return (isset($this->impuestos)?$this->impuestos:NULL);}
 public function getTotalImpuestosTrasladados(){return (isset($this->totalImpuestosTrasladados)?$this->totalImpuestosTrasladados:NULL);}
 public function getTotalImpuestosRetenidos(){return (isset($this->totalImpuestosRetenidos)?$this->totalImpuestosRetenidos:NULL);}
 public function getTimbreFiscalDigitalVersion(){return (isset($this->timbreFiscalDigitalVersion)?$this->timbreFiscalDigitalVersion:NULL);}
 public function getTimbreFiscalDigitalNoCertificadoSAT(){return (isset($this->timbreFiscalDigitalNoCertificadoSAT)?$this->timbreFiscalDigitalNoCertificadoSAT:NULL);}
 public function getTimbreFiscalDigitalFechaTimbrado(){return (isset($this->timbreFiscalDigitalFechaTimbrado)?$this->timbreFiscalDigitalFechaTimbrado:NULL);}
 public function getTimbreFiscalDigitalUUID(){return (isset($this->timbreFiscalDigitalUUID)?$this->timbreFiscalDigitalUUID:NULL);}
 public function getTimbreFiscalDigitalSelloSAT(){return (isset($this->timbreFiscalDigitalSelloSAT)?$this->timbreFiscalDigitalSelloSAT:NULL);}
 public function getTimbreFiscalDigitalSelloCFD(){return (isset($this->timbreFiscalDigitalSelloCFD)?$this->timbreFiscalDigitalSelloCFD:NULL);}
 public function getErrorMessage(){return (isset($this->errorMessage)?$this->errorMessage:false);}
 public function getRetencionIVA(){return (isset($this->retencionIVA)?$this->retencionIVA:false);}
 public function getRetencionISR(){return (isset($this->retencionISR)?$this->retencionISR:false);}
 public function getTrasladoIVA(){return (isset($this->trasladoIVA)?$this->trasladoIVA:false);}
 public function getTrasladoIEPS(){return (isset($this->trasladoIEPS)?$this->trasladoIEPS:false);}
 public function getComplementos(){return (isset($this->complementos)?$this->complementos:false);}

  public function validateXMLSchema(){
    libxml_use_internal_errors(true);
    $xml=new \DOMDocument('1.0','UTF-8');
    $xml->load($this->XMLName);
    if($this->esquemaID==3){
     $timbrado=$xml->getElementsByTagName('TimbreFiscalDigital')->item(0);
     if(isset($timbrado)){
  	for($i=0;$i<=$timbrado->attributes->length-1;$i++){
  	 $timbrado->attributes->item($i)->value=trim($timbrado->attributes->item($i)->value);
    }
      $xmlTimbreFiscal=new \DOMDocument('1.0','UTF-8');
      $timbrado=$xmlTimbreFiscal->importNode($timbrado,true);
      $xmlTimbreFiscal->appendChild($timbrado);


      if(!$xmlTimbreFiscal->schemaValidate(XSD_TFD)){
          $errors = libxml_get_errors();
          foreach ($errors as $error) {
          $this->errorMessage = $error->message;
          }

          libxml_clear_errors();
         return false;
       }
       libxml_use_internal_errors(false);

     }else{

       $this->errorMessage='Comprobante CFDI no certificado';
       return false;
     }
  }
    $doc=$xml->documentElement;
    $complemento=$doc->getElementsByTagName('Complemento')->item(0);
    if($complemento){$doc->removeChild($complemento);}
    $addenda=$doc->getElementsByTagName('Addenda')->item(0);
    if($addenda){$doc->removeChild($addenda);}

      if(!$xml->schemaValidate($this->esquemaID==2?XSD_CFD:XSD_CFDI)){
         $this->errorMessage=libxml_display_errors();
         return false;
       }else{
         return true;
       }
  }

  public function validateSelloCFD(){
	 return true;
	 if (!ACTIVE_VALIDA_SELLOCFD) return true;
  $xml=new DOMDocument('1.0','UTF-8');
  $xml->load($this->XMLName);
  $xslt=new DOMDocument('1.0','UTF-8');
  $xslt->load($this->esquemaID==2?XSLT_CFD:XSLT_CFDI,LIBXML_NOCDATA);
  $proc=new XSLTProcessor;
  $proc->importStyleSheet($xslt);
  $this->cadenaOriginal=$proc->transformToXML($xml);
  $cert_begin="-----BEGIN CERTIFICATE-----\n";
  $cert_end="-----END CERTIFICATE-----\n";
  if(stripos(base64_decode($this->getCertificado()),'CERTIFICATE-----')){
   $cert=base64_decode($this->getCertificado());}
  else{
   $cert=$cert_begin.(chunk_split($this->getCertificado(),64,"\n")).$cert_end;}
  if (!($pubkey=openssl_pkey_get_public($cert))){
   $this->errorMessage='No fue posible leer llave pública del certificado del comprobante.';
   return false;}
  $sello=base64_decode($this->getSello());
  //echo $sello;
  //echo base64_encode($pubkey);
  //echo $this->cadenaOriginal;
  //echo $pubkey;
  //echo $this->cadenaOriginal;
  //$this->cadenaOriginal = utf8_decode($this->cadenaOriginal);
  // $this->cadenaOriginal = str_replace("&","&amp;",$this->cadenaOriginal);
  // echo $this->cadenaOriginal;

  if(!openssl_verify($this->cadenaOriginal,$sello,$pubkey)){
   $this->errorMessage='El sello digital del comprobante es inválido.';
   return false;}

  return true;

}

  public function getXMLData(){

      $xml=new \DOMDocument('1.0','UTF-8');
      $xml->load($this->XMLName);
      $doc=$xml->documentElement;
      $addenda=$doc->getElementsByTagName('Addenda')->item(0);
      if($addenda){$doc->removeChild($addenda);}
      $comprobante=$xml->getElementsByTagName('Comprobante')->item(0);
      $this->version=utf8_decode($comprobante->getAttribute('Version'));
      $this->serie=utf8_decode($comprobante->getAttribute('Serie'));
      $this->folio=utf8_decode($comprobante->getAttribute('Folio'));
      $this->fecha=Carbon::parse($comprobante->getAttribute('Fecha'))->format('Y-m-d');
      //$this->esquemaID = ((int)$this->version) > 2 ? 3 : 2;
      //$this->fecha=format_date(str_replace('Z','',$comprobante->getAttribute('fecha')),DATE_TIME_CFD,DATE_TIME);

      $this->noAprobacion=utf8_decode($comprobante->getAttribute('NoAprobacion'));
      $this->anoAprobacion=utf8_decode($comprobante->getAttribute('AnoAprobacion'));
      $this->tipoDeComprobante=utf8_decode($comprobante->getAttribute('TipoDeComprobante'));
      $this->lugarExpedicion=utf8_decode($comprobante->getAttribute('LugarExpedicion'));
      $this->condicionesDePago=utf8_decode($comprobante->getAttribute('CondicionesDePago'));
      $this->noCertificado=utf8_decode($comprobante->getAttribute('NoCertificado'));
      $this->certificado=utf8_decode(str_replace(' ','',$comprobante->getAttribute('Certificado')));
      $this->sello=utf8_decode($comprobante->getAttribute('Sello'));
      $this->subTotal=utf8_decode($comprobante->getAttribute('SubTotal'));
      $this->descuento=utf8_decode($comprobante->getAttribute('Descuento'));
      $this->motivoDescuento=utf8_decode($comprobante->getAttribute('MotivoDescuento'));
      $this->total=utf8_decode($comprobante->getAttribute('Total'));
      $this->tipoCambio=utf8_decode($comprobante->getAttribute('TipoCambio'));
      $this->moneda=utf8_decode($comprobante->getAttribute('Moneda'));
      $this->metodoDePago=utf8_decode($comprobante->getAttribute('MetodoPago'));
      $emisor=$xml->getElementsByTagName('Emisor')->item(0);
      $this->emisorRfc=utf8_decode($emisor->getAttribute('Rfc'));
      $this->emisorNombre=utf8_decode($emisor->getAttribute('Nombre'));

  	  $receptor=$xml->getElementsByTagName('Receptor')->item(0);
  	  $this->receptorRfc=utf8_decode($receptor->getAttribute('Rfc'));
  	  $this->receptorNombre=utf8_decode($receptor->getAttribute('Nombre'));
      $impLocal = $xml->getElementsByTagName('Complemento')->item(0)->getElementsByTagName('ImpuestosLocales')->item(0)==null? 0 : count($xml->getElementsByTagName('Complemento')->item(0)->getElementsByTagName('ImpuestosLocales')->item(0));

        if( $impLocal >0){
        	$this->complementos = $xml->getElementsByTagName('Complemento')->item(0)->getElementsByTagName('ImpuestosLocales')->item(0)->getAttribute('TotaldeTraslados');
        }else{
        	$this->complementos = 0.00;
        }

      $conceptos=$xml->getElementsByTagName('Concepto');
      $this->conceptos=array();
      foreach($conceptos as $concepto){
       $this->concepto=array(
        'cantidad'=>utf8_decode($concepto->getAttribute('Cantidad'))
       ,'unidad'=>utf8_decode($concepto->getAttribute('ClaveUnidad'))
       ,'descripcion'=>utf8_decode($concepto->getAttribute('Descripcion'))
       ,'valorUnitario'=>utf8_decode($concepto->getAttribute('ValorUnitario'))
       ,'Importe'=>utf8_decode($concepto->getAttribute('importe')));
       $this->conceptos[]=$this->concepto;
     }
      $impuestos=$xml->getElementsByTagName('Impuestos')->item(0);

      $this->impuestos=array();
      $this->totalImpuestosTrasladados = 0.0;
      //ZTX-START FIX ZERUEL 2017/06/19 PROBLEMA IMPUESTOS DOBLES X COMPLEMENTOS O BASURITA
      $impPivots=$xml->getElementsByTagName('Impuestos');

    	$this->trasladoIVA=0.0;
    	$this->trasladoIEPS=0.0;
    foreach($impPivots as $impPivot){
       if( !($impPivot->hasAttribute('TotalImpuestosTrasladados')))
        continue;

      $traslados=$impPivot-> getElementsByTagName('Traslado');


        foreach($traslados as $traslado){
          $this->impuesto=array(
            'impuesto'=>utf8_decode($traslado->getAttribute('Impuesto'))
          ,'tipo'=>'T'
          ,'tasa'=>utf8_decode($traslado->getAttribute('Tasa'))
          ,'importe'=>utf8_decode($traslado->getAttribute('Importe')));
          $this->totalImpuestosTrasladados += utf8_decode($traslado->getAttribute('Impuesto'));
          $this->impuestos[]=$this->impuesto;
          if (strtoupper(utf8_decode($traslado->getAttribute('Impuesto')))=='IVA') {
              $this->trasladoIVA+=utf8_decode($traslado->getAttribute('importe'));
          }
          if (strtoupper(utf8_decode($traslado->getAttribute('Impuesto')))=='IEPS') {
              $this->trasladoIEPS+=utf8_decode($traslado->getAttribute('Importe'));
          }
        }
    }
      if($this->esquemaID==3){
       $timbre=$xml->getElementsByTagName('TimbreFiscalDigital')->item(0);
       if(isset($timbre)){
        $this->timbreFiscalDigitalVersion=$timbre->getAttributeNode('Version')->nodeValue;
        $this->timbreFiscalDigitalNoCertificadoSAT=$timbre->getAttributeNode('NoCertificadoSAT')->nodeValue;

        $this->timbreFiscalDigitalFechaTimbrado=Carbon::parse($timbre->getAttributeNode('FechaTimbrado')->nodeValue)->format('Y-m-d');
        $this->timbreFiscalDigitalUUID=$timbre->getAttributeNode('UUID')->nodeValue;
        $this->timbreFiscalDigitalSelloSAT=$timbre->getAttributeNode('SelloSAT')->nodeValue;
        $this->timbreFiscalDigitalSelloCFD=$timbre->getAttributeNode('SelloCFD')->nodeValue;
    			if (trim($this->folio)=='') {
    				$this->folio=substr($this->timbreFiscalDigitalUUID,-8,8);
    			}
    		}
    	}
  }
// aqui se termina de obtener los datos de la factura.

  public function traducir($cadena){
      $arr_ingles =   [
                      "/Element '(\w+)': '(\w+)' is not a valid value of the atomic type '(.*)'./i",
                      "/Element '(\w+)', attribute '(\w+)': [facet '(\w+)'] The value '(\w+)' has a length of '(\w+)'; this differs from the allowed length of '(.*)'./i"
                   ];

      $arr_español = [
                      'El elemento \'${1}\': \'${2}\' no es un valor válido del tipo atómico \'${3}\'.',
                      'Elemento \'${1}\', atributo \'${2}\': [facet \'${3}\'] El valor \'${4}\' tiene una longitud de \'${5}\'; esto difiere de la longitud permitida de \'${6}\'.'

                 ];

      return preg_replace($arr_ingles, $arr_español,  $cadena);
  }



}




 ?>
