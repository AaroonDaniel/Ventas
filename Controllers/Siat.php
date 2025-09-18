<?php
class Siat
{
    public function verificarComunicacion()
    {
        $wsdl = "https://pilotosiatservicios.impuestos.gob.bo/v2/FacturacionCodigos?wsdl";
        $opciones = array(
            'http' => array(
                'header' => "apikey: TokenApi eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJnYXJ5LnJhbWlyZXouY29kaWdvQGdtYWlsLmNvbSIsImNvZGlnb1Npc3RlbWEiOiI1MEY1RDM5Q0U1RUMwNUYzMjQ5NzA0REFFNThDMzciLCJuaXQiOiJINHNJQUFBQUFBQUFBRE0yTmpJM01iYzBNRFFHQUxSMzhZRUtBQUFBIiwiaWQiOjUwNTcwMTcsImV4cCI6MTc2MTkyNjQ5OSwiaWF0IjoxNzU4MjI1NjY5LCJuaXREZWxlZ2FkbyI6MTAwMzU3OTAyOCwic3Vic2lzdGVtYSI6IlNGRSJ9.uvLHm7Qia56He7hGx-ALWvVEd7zrCcEFM7nPNp7OiZGdDVIvI8u484DEmx7nbGOIp2sEm4y-EVUf12w9IgSN0Q",
                'timeout' => 5
            )
        );

        $contexto = stream_context_create($opciones);
        try {
            $cliente = new SoapClient($wsdl, [
                'stream_context' => $contexto,
                'cache_wsdl' => WSDL_CACHE_NONE,
                'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE
            ]);

            $resultadoSoap = $cliente->verificarComunicacion();

            return [
                "RespuestaComunicacion" => [
                    "transaccion" => true,
                    "mensajesList" => [
                        "descripcion" => "Comunicación Exitosa"
                    ]
                ]
            ];
        } catch (SoapFault $fault) {
            return [
                "RespuestaComunicacion" => [
                    "transaccion" => false,
                    "mensajesList" => [
                        "descripcion" => "Error: " . $fault->getMessage()
                    ]
                ]
            ];
        }
    }
    public function cuis()
    {
        $wsdl = "https://pilotosiatservicios.impuestos.gob.bo/v2/FacturacionCodigos?wsdl";

        $codigoAmbiente = 2;
        $codigoModalidad = 2;
        $codigoPuntoVenta = 0;
        $codigoSistema = "3521D02656B1D78FD90E";
        $codigoSucursal = 0;
        $nit = "3327479013";


        $parametros = array(
            'SolicitudCuis' => array(
                'codigoAmbiente' => $codigoAmbiente,
                'codigoModalidad' => $codigoModalidad,
                'codigoPuntoVenta' => $codigoPuntoVenta,
                'codigoSistema' => $codigoSistema,
                'codigoSucursal' => $codigoSucursal,
                'nit' => $nit

            )
        );

        $opciones = array(
            'http' => array(
                'header' => "apikey TokenApi eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJnYXJ5LnJhbWlyZXouY29kaWdvQGdtYWlsLmNvbSIsImNvZGlnb1Npc3RlbWEiOiI1MEY1RDM5Q0U1RUMwNUYzMjQ5NzA0REFFNThDMzciLCJuaXQiOiJINHNJQUFBQUFBQUFBRE0yTmpJM01iYzBNRFFHQUxSMzhZRUtBQUFBIiwiaWQiOjUwNTcwMTcsImV4cCI6MTc2MTkyNjQ5OSwiaWF0IjoxNzU4MjI1NjY5LCJuaXREZWxlZ2FkbyI6MTAwMzU3OTAyOCwic3Vic2lzdGVtYSI6IlNGRSJ9.uvLHm7Qia56He7hGx-ALWvVEd7zrCcEFM7nPNp7OiZGdDVIvI8u484DEmx7nbGOIp2sEm4y-EVUf12w9IgSN0Q",
                'timeout' => 5
            )
        );

        $contexto = stream_context_create($opciones);

        try {
            $cliente = new SoapClient($wsdl, [
                'stream_context' => $contexto,
                'cache_wsdl' => WSDL_CACHE_NONE,
                'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE
            ]);
            $resultado = $cliente->cuis($parametros);
        } catch (SoapFault $fault) {
            $resultado = false;
        }
        return $resultado;
    }

    public function cufd()
    {
        $wsdl = "https://pilotosiatservicios.impuestos.gob.bo/v2/FacturacionCodigos?wsdl";


        $codigoAmbiente = 2;
        $codigoModalidad = 2;
        $codigoPuntoVenta = 0;
        $codigoSistema = "3521D022757BD60C830E";
        $codigoSucursal = 0;
        $cuis = $_SESSION['scuis'];
        $nit = "3327479013";

        $parametros = array(
            'SolicitudCufd' => array(
                'codigoAmbiente' => $codigoAmbiente,
                'codigoModalidad' => $codigoModalidad,
                'codigoPuntoVenta' => $codigoPuntoVenta,
                'codigoSistema' => $codigoSistema,
                'codigoSucursal' => $codigoSucursal,
                'cuis' => $cuis,
                'nit' => $nit
            )
        );

        $opciones = array(
            'http' => array(
                'header' => ' apikey: TokenApi eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJnYXJ5LnJhbWlyZXouY29kaWdvQGdtYWlsLmNvbSIsImNvZGlnb1Npc3RlbWEiOiI1MEY1RDM5Q0U1RUMwNUYzMjQ5NzA0REFFNThDMzciLCJuaXQiOiJINHNJQUFBQUFBQUFBRE0yTmpJM01iYzBNRFFHQUxSMzhZRUtBQUFBIiwiaWQiOjUwNTcwMTcsImV4cCI6MTc2MTkyNjQ5OSwiaWF0IjoxNzU4MjI1NjY5LCJuaXREZWxlZ2FkbyI6MTAwMzU3OTAyOCwic3Vic2lzdGVtYSI6IlNGRSJ9.uvLHm7Qia56He7hGx-ALWvVEd7zrCcEFM7nPNp7OiZGdDVIvI8u484DEmx7nbGOIp2sEm4y-EVUf12w9IgSN0Q',
                'timeout' => 5
            )
        );

        $contexto = stream_context_create($opciones);

        try {
            $cliente = new SoapClient($wsdl, [
                'stream_context' => $contexto,
                'cache_wsdl' => WSDL_CACHE_NONE,
                'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE
            ]);
            $resultado = $cliente->cufd($parametros);
        } catch (SoapFault $fault) {
            $resultado = $fault->faultstring;
        }
        return $resultado;
    }

    public function sincronizarActividades()
    {
        $wsdl = "https://pilotosiatservicios.impuestos.gob.bo/v2/FacturacionSincronizacion?wsdl";

        $codigoAmbiente = 2;
        $codigoPuntoVenta = 0;
        $codigoSistema = "3521D02656B1D78FD90E";
        $codigoSucursal = 0;
        $cuis = $_SESSION['scuis'];
        $nit = "3327479013";

        $parametros  = array(
            'SolicitudSincronizacion' => array(
                'codigoAmbiente' => $codigoAmbiente,
                'codigoPuntoVenta' => $codigoPuntoVenta,
                'codigoSistema' => $codigoSistema,
                'codigoSucursal' => $codigoSucursal,
                'cuis' => $cuis,
                'nit' => $nit
            )
        );
        $opciones = array(
            'http' => array(
                'header' => ' apikey: TokenApi eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJnYXJ5LnJhbWlyZXouY29kaWdvQGdtYWlsLmNvbSIsImNvZGlnb1Npc3RlbWEiOiI1MEY1RDM5Q0U1RUMwNUYzMjQ5NzA0REFFNThDMzciLCJuaXQiOiJINHNJQUFBQUFBQUFBRE0yTmpJM01iYzBNRFFHQUxSMzhZRUtBQUFBIiwiaWQiOjUwNTcwMTcsImV4cCI6MTc2MTkyNjQ5OSwiaWF0IjoxNzU4MjI1NjY5LCJuaXREZWxlZ2FkbyI6MTAwMzU3OTAyOCwic3Vic2lzdGVtYSI6IlNGRSJ9.uvLHm7Qia56He7hGx-ALWvVEd7zrCcEFM7nPNp7OiZGdDVIvI8u484DEmx7nbGOIp2sEm4y-EVUf12w9IgSN0Q',
                'timeout' => 5
            )
        );

        $contexto = stream_context_create($opciones);

        try {
            $cliente = new SoapClient($wsdl, [
                'stream_context' => $contexto,
                'cache_wsdl' => WSDL_CACHE_NONE,
                'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE
            ]);
            $resultado = $cliente->sincronizarActividades($parametros);
        } catch (SoapFault $fault) {
            $resultado = $fault->faultstring;
        }
        return $resultado;
    }

    public function sincronizarListaProductosServicios()
    {
        $wsdl = "https://pilotosiatservicios.impuestos.gob.bo/v2/FacturacionSincronizacion?wsdl";
        $codigoAmbiente = 2;
        $codigoPuntoVenta = 0;
        $codigoSistema = "3521D02656B1D78FD90E";
        $codigoSucursal = 0;
        $cuis = $_SESSION['scuis'];
        $nit = "3327479013";

        $parametros  = array(
            'SolicitudSincronizacion' => array(
                'codigoAmbiente' => $codigoAmbiente,
                'codigoPuntoVenta' => $codigoPuntoVenta,
                'codigoSistema' => $codigoSistema,
                'codigoSucursal' => $codigoSucursal,
                'cuis' => $cuis,
                'nit' => $nit
            )
        );
        $opciones = array(
            'http' => array(
                'header' => ' apikey: TokenApi eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJnYXJ5LnJhbWlyZXouY29kaWdvQGdtYWlsLmNvbSIsImNvZGlnb1Npc3RlbWEiOiI1MEY1RDM5Q0U1RUMwNUYzMjQ5NzA0REFFNThDMzciLCJuaXQiOiJINHNJQUFBQUFBQUFBRE0yTmpJM01iYzBNRFFHQUxSMzhZRUtBQUFBIiwiaWQiOjUwNTcwMTcsImV4cCI6MTc2MTkyNjQ5OSwiaWF0IjoxNzU4MjI1NjY5LCJuaXREZWxlZ2FkbyI6MTAwMzU3OTAyOCwic3Vic2lzdGVtYSI6IlNGRSJ9.uvLHm7Qia56He7hGx-ALWvVEd7zrCcEFM7nPNp7OiZGdDVIvI8u484DEmx7nbGOIp2sEm4y-EVUf12w9IgSN0Q',
                'timeout' => 5
            )
        );

        $contexto = stream_context_create($opciones);

        try {
            $cliente = new SoapClient($wsdl, [
                'stream_context' => $contexto,
                'cache_wsdl' => WSDL_CACHE_NONE,
                'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE
            ]);
            $resultado = $cliente->sincronizarListaProductosServicios($parametros);
        } catch (SoapFault $fault) {
            $resultado = $fault->faultstring;
        }
        return $resultado;
    }

    public function sincronizarParametricaUnidadMedida()
    {
        $wsdl = "https://pilotosiatservicios.impuestos.gob.bo/v2/FacturacionSincronizacion?wsdl";
        $codigoAmbiente = 2;
        $codigoPuntoVenta = 0;
        $codigoSistema = "3521D02656B1D78FD90E";
        $codigoSucursal = 0;
        $cuis = $_SESSION['scuis'];
        $nit = "3327479013";

        $parametros  = array(
            'SolicitudSincronizacion' => array(
                'codigoAmbiente' => $codigoAmbiente,
                'codigoPuntoVenta' => $codigoPuntoVenta,
                'codigoSistema' => $codigoSistema,
                'codigoSucursal' => $codigoSucursal,
                'cuis' => $cuis,
                'nit' => $nit
            )
        );
        $opciones = array(
            'http' => array(
                'header' => ' apikey: TokenApi eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJnYXJ5LnJhbWlyZXouY29kaWdvQGdtYWlsLmNvbSIsImNvZGlnb1Npc3RlbWEiOiI1MEY1RDM5Q0U1RUMwNUYzMjQ5NzA0REFFNThDMzciLCJuaXQiOiJINHNJQUFBQUFBQUFBRE0yTmpJM01iYzBNRFFHQUxSMzhZRUtBQUFBIiwiaWQiOjUwNTcwMTcsImV4cCI6MTc2MTkyNjQ5OSwiaWF0IjoxNzU4MjI1NjY5LCJuaXREZWxlZ2FkbyI6MTAwMzU3OTAyOCwic3Vic2lzdGVtYSI6IlNGRSJ9.uvLHm7Qia56He7hGx-ALWvVEd7zrCcEFM7nPNp7OiZGdDVIvI8u484DEmx7nbGOIp2sEm4y-EVUf12w9IgSN0Q',
                'timeout' => 5
            )
        );

        $contexto = stream_context_create($opciones);

        try {
            $cliente = new SoapClient($wsdl, [
                'stream_context' => $contexto,
                'cache_wsdl' => WSDL_CACHE_NONE,
                'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE
            ]);
            $resultado = $cliente->sincronizarParametricaUnidadMedida($parametros);
        } catch (SoapFault $fault) {
            $resultado = $fault->faultstring;
        }
        return $resultado;
    }
}
