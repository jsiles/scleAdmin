<?php
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
session_start();
set_time_limit(300);
date_default_timezone_set("America/La_Paz");
require_once("sqlserver.cfg");

$langDefault='es';
$tiempoMax=120; //Tiempo de sesion en BD en minutos

define("DATABASE",	$basedatos);
define("DBHOST",	$host);
define("DBUSER",	$user);
define("DBPASSWORD",$pass);
// for sever

	$xpath = "/scleAdmin";
	$urlLanguage=1;
	$urlPositionTitle	=	0;
	$urlPositionSubtitle=	1;
	$urlPositionSubtitle2=	2;
	$urlPositionSubtitle3=	3;

        //echo ($_SERVER['SERVER_PORT']); die;
if($_SERVER['SERVER_PORT']==443){
$domain = "https://" . $_SERVER['HTTP_HOST'].$xpath;
}elseif($_SERVER['SERVER_PORT']==80){
$domain = "http://" . $_SERVER['HTTP_HOST'].$xpath;
}else{
    $domain = "https://" . $_SERVER['HTTP_HOST'].$xpath;
    //echo $domain;die;
}

$rootsystem = $_SERVER['DOCUMENT_ROOT'] . $xpath;

define("PATH_DOMAIN",	$domain);
define("PATH_ROOT"	,$rootsystem);	                // RUTA PRINCIPAL DEL SITIO
define("PATH_PUBLIC", 	"c:\desa\scle"); 		// DONDE SE SUBEN ARCHIVOS PUBLISH

define("PATH_LOG"	, 	PATH_ROOT . "/log");		// ARCHIVO DE ERRORES
define("DEBUG"		,	false);
define("SAVELOG"	,	false);
define("IP_CHECK"	,	false);
define("MULTIPLE_INSTANCES"	,	false);
define("PATH_TEMPLATE",	PATH_ROOT."/tpl/");
define("LOCK_TIME", 5);                                        //tiempo de bloqueo en minutos

define("TIME_ACTIVITY", 120);                                   //tiempo de actividad en minutos
function __autoload($class_name) {
    require_once PATH_ROOT."/classes/class.".$class_name . '.inc.php';
}
$db =new DBmysql;
$db2=new DBmysql;
$db3=new DBmysql;
$db4=new DBmysql;
$pagDb=new DBmysql;
$msg="";


define("SAP", false); 
if(SAP){
$dbSAP = new DBmysql("SAP", DBHOST,DBUSER, DBPASSWORD);	
}	
?>