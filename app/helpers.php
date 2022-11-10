<?php

use Illuminate\Support\Facades\DB;


/**
 *  Inserts data in a table following a schema
 *
 *  $model = "model_name";
 *
 *
 *  $schema = array(
 *   "name_param1", ...
 *  ); //name of the parameters that are going to be inserted (do not forget non nullable params)
 *
 *  $data = array(
 *  [value1, value2, ...],
 *  [...],
 *  ...
 *  ); // values
 */
function seed($model, $data, $schema) {
    if (!is_array($data)) {
        trigger_error("Data must be an array", E_USER_ERROR);
    }
    if (!is_string($model)) {
        trigger_error("Table must be a string", E_USER_ERROR);
    }

    foreach ($data as $row) {

        if (sizeof($row) != sizeof($schema)) {
            trigger_error("Invalid data format (at least one rows as not enough or too many arguments)", E_USER_ERROR);
        }

        $entity = new $model();

        for ($i = 0; $i < sizeof($row); $i++) {
            $entity->{$schema[$i]} = $row[$i];
        }

        $entity->save();
    }
}
