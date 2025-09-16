<?php
class Siat
{
    public function verificarComunicacion()
    {
        $wsdl = "https://pilotosiatservicios.impuestos.gob.bo/v2/FacturacionCodigos?wsdl";
        $opciones = array(
            'http' => array(
                'header' => "apikey: TokenApi eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJnYXJ5LnJhbWlyZXouY29kaWdvQGdtYWlsLmNvbSIsImNvZGlnb1Npc3RlbWEiOiIzNTIxRDAyMjc1N0JENjBDODMwRSIsIm5pdCI6Ikg0c0lBQUFBQUFBQUFETTJOakkzTWJjME1EUUdBTFIzOFlFS0FBQUEiLCJpZCI6NTA1NzAxNywiZXhwIjoxNzU5MjUxMTIxLCJpYXQiOjE3NTc0NTEwOTEsIm5pdERlbGVnYWRvIjozMzI3NDc5MDEzLCJzdWJzaXN0ZW1hIjoiU0ZFIn0.29P8rjPVO-X0SVkThNpz9A0BJKmsCUGatZd_burI0JIeJn_9uSvxYY5vFfq--uyCjvVGvWRj9BPbUVEM9nfLWg",
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
                'header' => "apikey TokenApi eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJnYXJ5LnJhbWlyZXouY29kaWdvQGdtYWlsLmNvbSIsImNvZGlnb1Npc3RlbWEiOiIzNTIxRDAyMjc1N0JENjBDODMwRSIsIm5pdCI6Ikg0c0lBQUFBQUFBQUFETTJOakkzTWJjME1EUUdBTFIzOFlFS0FBQUEiLCJpZCI6NTA1NzAxNywiZXhwIjoxNzU5MjUxMTIxLCJpYXQiOjE3NTc0NTEwOTEsIm5pdERlbGVnYWRvIjozMzI3NDc5MDEzLCJzdWJzaXN0ZW1hIjoiU0ZFIn0.29P8rjPVO-X0SVkThNpz9A0BJKmsCUGatZd_burI0JIeJn_9uSvxYY5vFfq--uyCjvVGvWRj9BPbUVEM9nfLWg",
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
        $codigoSistema = "3521D02656B1D78FD90E";
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
                'header' => ' apikey: TokenApi eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJnYXJ5LnJhbWlyZXouY29kaWdvQGdtYWlsLmNvbSIsImNvZGlnb1Npc3RlbWEiOiIzNTIxRDAyMjc1N0JENjBDODMwRSIsIm5pdCI6Ikg0c0lBQUFBQUFBQUFETTJOakkzTWJjME1EUUdBTFIzOFlFS0FBQUEiLCJpZCI6NTA1NzAxNywiZXhwIjoxNzU5MjUxMTIxLCJpYXQiOjE3NTc0NTEwOTEsIm5pdERlbGVnYWRvIjozMzI3NDc5MDEzLCJzdWJzaXN0ZW1hIjoiU0ZFIn0.29P8rjPVO-X0SVkThNpz9A0BJKmsCUGatZd_burI0JIeJn_9uSvxYY5vFfq--uyCjvVGvWRj9BPbUVEM9nfLWg',
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
                'header' => ' apikey: TokenApi eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJnYXJ5LnJhbWlyZXouY29kaWdvQGdtYWlsLmNvbSIsImNvZGlnb1Npc3RlbWEiOiIzNTIxRDAyMjc1N0JENjBDODMwRSIsIm5pdCI6Ikg0c0lBQUFBQUFBQUFETTJOakkzTWJjME1EUUdBTFIzOFlFS0FBQUEiLCJpZCI6NTA1NzAxNywiZXhwIjoxNzU5MjUxMTIxLCJpYXQiOjE3NTc0NTEwOTEsIm5pdERlbGVnYWRvIjozMzI3NDc5MDEzLCJzdWJzaXN0ZW1hIjoiU0ZFIn0.29P8rjPVO-X0SVkThNpz9A0BJKmsCUGatZd_burI0JIeJn_9uSvxYY5vFfq--uyCjvVGvWRj9BPbUVEM9nfLWg',
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
                'header' => ' apikey: TokenApi eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJnYXJ5LnJhbWlyZXouY29kaWdvQGdtYWlsLmNvbSIsImNvZGlnb1Npc3RlbWEiOiIzNTIxRDAyMjc1N0JENjBDODMwRSIsIm5pdCI6Ikg0c0lBQUFBQUFBQUFETTJOakkzTWJjME1EUUdBTFIzOFlFS0FBQUEiLCJpZCI6NTA1NzAxNywiZXhwIjoxNzU5MjUxMTIxLCJpYXQiOjE3NTc0NTEwOTEsIm5pdERlbGVnYWRvIjozMzI3NDc5MDEzLCJzdWJzaXN0ZW1hIjoiU0ZFIn0.29P8rjPVO-X0SVkThNpz9A0BJKmsCUGatZd_burI0JIeJn_9uSvxYY5vFfq--uyCjvVGvWRj9BPbUVEM9nfLWg',
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
                'header' => ' apikey: TokenApi eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJnYXJ5LnJhbWlyZXouY29kaWdvQGdtYWlsLmNvbSIsImNvZGlnb1Npc3RlbWEiOiIzNTIxRDAyMjc1N0JENjBDODMwRSIsIm5pdCI6Ikg0c0lBQUFBQUFBQUFETTJOakkzTWJjME1EUUdBTFIzOFlFS0FBQUEiLCJpZCI6NTA1NzAxNywiZXhwIjoxNzU5MjUxMTIxLCJpYXQiOjE3NTc0NTEwOTEsIm5pdERlbGVnYWRvIjozMzI3NDc5MDEzLCJzdWJzaXN0ZW1hIjoiU0ZFIn0.29P8rjPVO-X0SVkThNpz9A0BJKmsCUGatZd_burI0JIeJn_9uSvxYY5vFfq--uyCjvVGvWRj9BPbUVEM9nfLWg',
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
