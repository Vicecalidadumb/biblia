<?php

function print_y($array) {
    return '<pre>' . print_r($array, true) . '</pre>';
}

function crear_array_esp($objeto) {
    $array = array();
    foreach ($objeto as $data) {
        for ($a = $data->espacio_capacidad_inicial; $a <= $data->espacio_capacidad; $a++) {
            $array[] = array(
                'espacio_id' => $data->espacio_id,
                'espacio_aula' => $data->espacio_aula,
                'espacio_bloque' => $data->espacio_bloque,
                'espacio_piso' => $data->espacio_piso,
                'espacio_direccion' => $data->espacio_direccion,
                'institucion_nombre' => $data->institucion_nombre,
                'ciudad' => $data->ciudad_nombre,
                'puesto' => $a,
            );
        }
    }
    shuffle($array);
    return $array;
}
