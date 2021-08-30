<?php

////////////////////////////////////////////////////////////////////////////////
//
//	GatewayChecksum() - Static class for checksum and version.
//
////////////////////////////////////////////////////////////////////////////////
//
namespace RocketGate\Sdk;

class GatewayChecksum
{
    public static $checksum = "";
    public static $baseChecksum = "eb9206c6ff3fab49bef1b41dd6bab30a";
    public static $versionNo = "P7.16";

//////////////////////////////////////////////////////////////////////
//
//	Set the client version number.
//
//////////////////////////////////////////////////////////////////////
//
    static function SetVersion()
    {
        $dirName = dirname(__FILE__);
        $baseString = md5_file($dirName . "/GatewayService.php") .
            md5_file($dirName . "/GatewayRequest.php") .
            md5_file($dirName . "/GatewayResponse.php") .
            md5_file($dirName . "/GatewayParameterList.php") .
            md5_file($dirName . "/GatewayCodes.php");
        GatewayChecksum::$checksum = md5($baseString);
        print "checksum: " . GatewayChecksum::$checksum . "\n";
        if (GatewayChecksum::$checksum != GatewayChecksum::$baseChecksum) {
            GatewayChecksum::$versionNo = "P7.16m";
        }
    }
}
