<?php

class AmortizationController {
    public function generateAmortization(int $monto, int $numCuotas = 10, float $tasaInteres = 0.10) {
        $tablaAmortizacion = [];

        $cuota = floor($monto / $numCuotas);
        $restante = $monto % $numCuotas;

        for ($i = 1; $i <= $numCuotas; $i++) {
            $abonoCapital = $cuota + ($restante > 0 ? 1 : 0);
            $abonoIntereses = $monto * $tasaInteres;
            $fechaPago = date('d-m-Y', strtotime("+{$i} month"));
            $objetos = [
                'fecha'=>$fechaPago,
                'fechaPago'=>null,
                'cuota'=>str_pad($i, 2, '0', STR_PAD_LEFT),
                'abonoCapital'=>$abonoCapital,
                'abonoIntereses'=>$abonoIntereses,
                'total'=>$abonoCapital+$abonoIntereses,
                'semaforo'=>null,
                'pagado'=>false
            ];
            $tablaAmortizacion[] = $objetos;
            $monto -= $abonoCapital;
        }

        switch ($numCuotas) {
            case 7:
            case 9:
                foreach ($tablaAmortizacion as &$cuota) {
                    $cuota['abonoIntereses'] = ceil($cuota['abonoIntereses'] / 1000) * 1000;
                    $cuota['abonoCapital'] = ceil($cuota['abonoCapital'] / 1000) * 1000;
                    $cuota['total'] = $cuota['abonoCapital'] + $cuota['abonoIntereses'];
                }
                // Ajustar la última cuota para que la suma sea igual al monto original
                // $diferencia = array_sum(array_column($tablaAmortizacion, 'abonoCapital')) -(-$monto * -1000) ;
                $tablaAmortizacion[$numCuotas - 1]['abonoCapital'] += -(-$monto * -1000);

                // Verificar si el capital total es mayor al monto prestado
                // if ($monto < array_sum(array_column($tablaAmortizacion, 'abonoCapital'))) {
                // Sumar la diferencia a la última cuota
                // $tablaAmortizacion[$numCuotas - 1]['abonoCapital'] += $monto - array_sum(array_column($tablaAmortizacion, 'abonoCapital'));
                // }
                unset($cuota);  // Desvincular la variable de la última iteración del bucle
                break;
        }

        return $tablaAmortizacion;
    }
}
