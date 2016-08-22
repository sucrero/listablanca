<?php
    require '../clases/Lista.class.php';

    $object = new Lista();

    // Design initial table header
    $data = '<table class="table table-bordered table-striped">
                            <tr>
                                <th>No.</th>
                                <th>Descripci&oacute;n</th>
                                <th>URL</th>
                                <th>Tipo</th>
                                <th>Status</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>';


    $lista = $object->read();

    if (count($lista) > 0) {
        $number = 1;
        foreach ($listas as $lista) {
            $data .= '<tr>
                    <td>' . $number . '</td>
                    <td>' . $lista['descripcion'] . '</td>
                    <td>' . $lista['url'] . '</td>
                    <td>' . $lista['tipo'] . '</td>
                    <td>' . $lista['is_active'] . '</td>
                    <td>
                        <button onclick="GetUserDetails(' . $lista['id'] . ')" class="btn btn-warning">Update</button>
                    </td>
                    <td>
                        <button onclick="DeleteUser(' . $lista['id'] . ')" class="btn btn-danger">Delete</button>
                    </td>
                </tr>';
            $number++;
        }
    } else {
        // records not found
        $data .= '<tr><td colspan="6">Records not found!</td></tr>';
    }

    $data .= '</table>';

    echo $data;
