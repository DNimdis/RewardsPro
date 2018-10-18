<?php
//app/Helpers/Envato/User.php
namespace App\Helpers\Envato;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Facade;
class Tools  extends Facade
{
    /**
     * @param int $user_id User-id
     *
     * @return string
     */
 public  $errorMessage;
 public  function getErrorMessage(){return (isset($errorMessage)?$errorMessage:false);}

    public static function get_username($user_id) {
        $user = DB::table('users')->where('id', $user_id)->first();

        return (isset($user->name) ? $user->name : '');
    }


    public static function loadXMLFactura($factura){
      $xml = new \DOMDocument('1.0', 'UTF-8');
			$xml->formatOutput = true;
      //Asegurar el xml
      if (!$xml->loadXML(file_get_contents(storage_path()."/app/tmp_valid_xml/".$factura->getClientOriginalName())))
			{
				dd('XML invalido D');
			}

      $cfd = Cfdi::getInstance();
      $cfd->XMLName = storage_path()."/app/tmp_valid_xml/".$factura->getClientOriginalName();

      $namespace = $xml->documentElement->lookupNamespaceURI('cfdi') ? $xml->documentElement->lookupNamespaceURI('cfdi') : $xml->documentElement->lookupNamespaceURI(NULL);
      switch ($namespace)
				{
				case 'http://www.sat.gob.mx/cfd/2':
				$cfd->esquemaID = 2;
					break;

				case 'http://www.sat.gob.mx/cfd/3':
					$cfd->esquemaID = 3;
					break;

				default:
					dd('XML invalido E ');
					break;
				}

        return $cfd;
    }

    public static function getUserDirFActura(){
        $user_id =\Auth::User()->id;
      return storage_path()."/app/usuarios/$user_id/".date("Y")."/".date("m")."/";
    }



}
