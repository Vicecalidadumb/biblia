<?php

function get_data_attitudinal($items, $pruebas) {
    //echo print_y($pruebas);
    $array_return = array();
    foreach ($pruebas as $prueba) {
        if (!isset($array_return[$prueba->userid])) {
            $array_return[$prueba->userid]['fecha'] = $prueba->timemodified;
            $array_return[$prueba->userid]['departamento'] = $prueba->department;
            $array_return[$prueba->userid]['nombre'] = $prueba->firstname . ' ' . $prueba->lastname;
            $array_return[$prueba->userid]['documento'] = $prueba->username;
            $array_return[$prueba->userid]['preguntas'] = array();
        }
        foreach ($items as $item) {
            if ($prueba->item == $item->id) {
                $array_return[$prueba->userid]['preguntas'][$item->name] = $prueba->value;
            }
        }
        //REORGANIZAR PREGUNTAS
        $array_preguntas = array();
        foreach ($items as $item) {
            //$array_preguntas[] = $array_return[$prueba->userid]['preguntas'][($item->position)-1];
        }
    }

    return $array_return;
}

function get_config_($config) {
    switch ($config) {
        case 1:
            $array_config = array(
                'MOTIVACION' => array(1 => 'Indicador_Deseable', 9 => 'Indicador_Aceptable', 17 => 'Indicador_Rechazo'),
                'AUTODEFINICION_PROFESIONAL' => array(2 => 'Indicador_Deseable', 10 => 'Indicador_Aceptable', 18 => 'Indicador_Rechazo'),
                'TOLERANCIA_A_LA_FRUSTRACION' => array(11 => 'Indicador_Deseable', 19 => 'Indicador_Aceptable', 3 => 'Indicador_Rechazo'),
                'ALINEACION_CON_PRINCIPIOS_INSTITUCIONALES' => array(4 => 'Indicador_Deseable', 12 => 'Indicador_Aceptable', 20 => 'Indicador_Rechazo'),
                'ADAPTACION_A_LA_INSTITUCION' => array(13 => 'Indicador_Deseable', 5 => 'Indicador_Aceptable', 21 => 'Indicador_Rechazo'),
                'FORMACION_INTEGRAL' => array(14 => 'Indicador_Deseable', 22 => 'Indicador_Aceptable', 6 => 'Indicador_Rechazo'),
                'RELACION_CON_LOS_ESTUDIANTES' => array(7 => 'Indicador_Deseable', 15 => 'Indicador_Aceptable', 23 => 'Indicador_Rechazo'),
                'ESTILO_DE_TRABAJO_CON_PARES' => array(16 => 'Indicador_Deseable', 8 => 'Indicador_Aceptable', 24 => 'Indicador_Rechazo'),
            );
            break;
        default:return 'ERROR';
    }
    return $array_config;
}

function get_value($id, $config) {
    switch ($config) {
        case 1:
            switch ($id) {
                case 1:return 'FR';
                    break;
                case 2:return 'LR';
                    break;
                case 3:return 'FD';
                    break;
                case 4:return 'LD';
                    break;
                default:return 'ERROR';
            }
            break;
        default:return 'ERROR';
    }
}

function get_resultado($valores, $config) {
    $return = '';
    switch ($config) {
        case 1:
            if ($valores[0] >= $valores[1] && $valores[0] > $valores[2]) {
                $return = "Indicador Deseable";
            } elseif ($valores[1] > $valores[0] && $valores[1] > $valores[2]) {
                $return = "Indicador Aceptable";
            } elseif ($valores[0] = $valores[1] && $valores[0] = $valores[2]) {
                $return = "Contradicción";
            } elseif ($valores[0] = $valores[2]) {
                $return = "Contradicción";
            } else {
                $return = "Indicador de Rechazo";
            }
            break;
        default:return 'ERROR';
    }
    return $return;
}
