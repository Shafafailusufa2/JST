 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Data_table extends CI_Model {

 function Datatables_User($dt) {
        $columns = implode(', ', $dt['col-display']) . ', ' . $dt['id-table'];
        $sql = "SELECT {$columns} FROM {$dt['table']}";
        $data = $this->db->query($sql);
        $rowCount = $data->num_rows();
        $data->free_result();
        $columnd = $dt['col-display'];
        $count_c = count($columnd);
        $search = $dt['search']['value'];
        $where = '';
        if ($search != '') {
            for ($i = 0; $i < $count_c; $i++) {
                $where .= $columnd[$i] . ' LIKE "%' . $search . '%"';

                if ($i < $count_c - 1) {
                    $where .= ' OR ';
                }
            }
        }
        for ($i = 0; $i < $count_c; $i++) {
            $searchCol = $dt['columns'][$i]['search']['value'];
            if ($searchCol != '') {
                $where = $columnd[$i] . ' LIKE "%' . $searchCol . '%" ';
                break;
            }
        }
        if ($where != '') {
            $sql .= " WHERE " . $where;
        }
        $sql .= " ORDER BY {$columnd[$dt['order'][0]['column']]} {$dt['order'][0]['dir']}";
        $start = $dt['start'];
        $length = $dt['length'];
        $sql .= " LIMIT {$start}, {$length}";
        $list = $this->db->query($sql);
        $option['draw'] = $dt['draw'];
        $option['recordsTotal'] = $rowCount;
        $option['recordsFiltered'] = $rowCount;
        $option['data'] = array();

        foreach ($list->result_array() as $row => $value) {
            $rows = array();
            $rows[] = 'SU-' . $value[$columnd[0]];
            $rows[] = $value[$columnd[1]];
            $rows[] = $value[$columnd[2]];
            $rows[] = $value[$columnd[3]];
            $rows[] = '<a class="btn btn-info btn-xs" title="Ubah" id="pointer" onclick="editOpen(' . "'" . $value[$columnd[0]] . "'" . ');">
            <i class="glyphicon glyphicon-edit"></i></a> | 
            <a title="Hapus" class="btn btn-danger btn-xs delete' . $value[$columnd[0]]  . '" id="pointer" onclick="deleteUser(' . "'" . $value[$columnd[0]] . "'" . ');">
            <i class="glyphicon glyphicon-trash" ></i></a>
            <a id="delete' . $value[$columnd[0]]  . '" style="display: none;"><i class="glyphicon glyphicon-refresh"></i></a>';

            $option['data'][] = $rows;
        }
        echo json_encode($option);
    }

    function Datatables_bobot($dt) {
        $columns = implode(', ', $dt['col-display']) . ', ' . $dt['id-table'];
        $sql = "SELECT {$columns} FROM {$dt['table']}";
        $data = $this->db->query($sql);
        $rowCount = $data->num_rows();
        $data->free_result();
        $columnd = $dt['col-display'];
        $count_c = count($columnd);
        $search = $dt['search']['value'];
        $where = '';
        if ($search != '') {
            for ($i = 0; $i < $count_c; $i++) {
                $where .= $columnd[$i] . ' LIKE "%' . $search . '%"';

                if ($i < $count_c - 1) {
                    $where .= ' OR ';
                }
            }
        }
        for ($i = 0; $i < $count_c; $i++) {
            $searchCol = $dt['columns'][$i]['search']['value'];
            if ($searchCol != '') {
                $where = $columnd[$i] . ' LIKE "%' . $searchCol . '%" ';
                break;
            }
        }
        if ($where != '') {
            $sql .= " WHERE " . $where;
        }
        $sql .= " ORDER BY {$columnd[$dt['order'][0]['column']]} {$dt['order'][0]['dir']}";
        $start = $dt['start'];
        $length = $dt['length'];
        $sql .= " LIMIT {$start}, {$length}";
        $list = $this->db->query($sql);
        $option['draw'] = $dt['draw'];
        $option['recordsTotal'] = $rowCount;
        $option['recordsFiltered'] = $rowCount;
        $option['data'] = array();

        foreach ($list->result_array() as $row => $value) {
            $rows = array();
            $rows[] = $value[$columnd[0]];
            $rows[] = $value[$columnd[1]];
            $rows[] = $value[$columnd[2]];
            $rows[] = $value[$columnd[3]];
            $rows[] = $value[$columnd[4]];
            $rows[] = $value[$columnd[5]];
            $rows[] = $value[$columnd[6]];
            $rows[] = $value[$columnd[7]];
            $rows[] = $value[$columnd[8]];
            $option['data'][] = $rows;
        }
        echo json_encode($option);
    }

    function Datatables_Pelatihan($dt) {
        $columns = implode(', ', $dt['col-display']) . ', ' . $dt['id-table'];
        $sql = "SELECT {$columns} FROM {$dt['table']}";
        $data = $this->db->query($sql);
        $rowCount = $data->num_rows();
        $data->free_result();
        $columnd = $dt['col-display'];
        $count_c = count($columnd);
        $search = $dt['search']['value'];
        $where = '';
        if ($search != '') {
            for ($i = 0; $i < $count_c; $i++) {
                $where .= $columnd[$i] . ' LIKE "%' . $search . '%"';

                if ($i < $count_c - 1) {
                    $where .= ' OR ';
                }
            }
        }
        for ($i = 0; $i < $count_c; $i++) {
            $searchCol = $dt['columns'][$i]['search']['value'];
            if ($searchCol != '') {
                $where = $columnd[$i] . ' LIKE "%' . $searchCol . '%" ';
                break;
            }
        }
        if ($where != '') {
            $sql .= " WHERE " . $where;
        }
        $sql .= " ORDER BY {$columnd[$dt['order'][0]['column']]} {$dt['order'][0]['dir']}";
        $start = $dt['start'];
        $length = $dt['length'];
        $sql .= " LIMIT {$start}, {$length}";
        $list = $this->db->query($sql);
        $option['draw'] = $dt['draw'];
        $option['recordsTotal'] = $rowCount;
        $option['recordsFiltered'] = $rowCount;
        $option['data'] = array();

        foreach ($list->result_array() as $row => $value) {
            $rows = array();
            $rows[] = 'L-' . $value[$columnd[0]];
            $rows[] = $value[$columnd[1]];
            $rows[] = $value[$columnd[2]];
            $rows[] = $value[$columnd[3]];
            $rows[] = $value[$columnd[4]];
            $rows[] = $value[$columnd[5]];
            $rows[] = $value[$columnd[6]];
            $rows[] = $value[$columnd[7]];
            $option['data'][] = $rows;
        }
        echo json_encode($option);
    }

    function Datatables_Pengujian($dt) {
        $columns = implode(', ', $dt['col-display']) . ', ' . $dt['id-table'];
        $sql = "SELECT {$columns} FROM {$dt['table']}";
        $data = $this->db->query($sql);
        $rowCount = $data->num_rows();
        $data->free_result();
        $columnd = $dt['col-display'];
        $count_c = count($columnd);
        $search = $dt['search']['value'];
        $where = '';
        if ($search != '') {
            for ($i = 0; $i < $count_c; $i++) {
                $where .= $columnd[$i] . ' LIKE "%' . $search . '%"';

                if ($i < $count_c - 1) {
                    $where .= ' OR ';
                }
            }
        }
        for ($i = 0; $i < $count_c; $i++) {
            $searchCol = $dt['columns'][$i]['search']['value'];
            if ($searchCol != '') {
                $where = $columnd[$i] . ' LIKE "%' . $searchCol . '%" ';
                break;
            }
        }
        if ($where != '') {
            $sql .= " WHERE " . $where;
        }
        $sql .= " ORDER BY {$columnd[$dt['order'][0]['column']]} {$dt['order'][0]['dir']}";
        $start = $dt['start'];
        $length = $dt['length'];
        $sql .= " LIMIT {$start}, {$length}";
        $list = $this->db->query($sql);
        $option['draw'] = $dt['draw'];
        $option['recordsTotal'] = $rowCount;
        $option['recordsFiltered'] = $rowCount;
        $option['data'] = array();

        foreach ($list->result_array() as $row => $value) {
            $rows = array();
            $rows[] = 'L-' . $value[$columnd[0]];
            $rows[] = $value[$columnd[1]];
            $rows[] = $value[$columnd[2]];
            $rows[] = $value[$columnd[3]];
            $rows[] = $value[$columnd[4]];
            $rows[] = $value[$columnd[5]];
            $rows[] = $value[$columnd[6]];
            $rows[] = $value[$columnd[7]];
            $option['data'][] = $rows;
        }
        echo json_encode($option);
    }

    function Datatables_Transformasi($dt) {
        $columns = implode(', ', $dt['col-display']) . ', ' . $dt['id-table'];
        $sql = "SELECT {$columns} FROM {$dt['table']}";
        $data = $this->db->query($sql);
        $rowCount = $data->num_rows();
        $data->free_result();
        $columnd = $dt['col-display'];
        $count_c = count($columnd);
        $search = $dt['search']['value'];
        $where = '';
        if ($search != '') {
            for ($i = 0; $i < $count_c; $i++) {
                $where .= $columnd[$i] . ' LIKE "%' . $search . '%"';

                if ($i < $count_c - 1) {
                    $where .= ' OR ';
                }
            }
        }
        for ($i = 0; $i < $count_c; $i++) {
            $searchCol = $dt['columns'][$i]['search']['value'];
            if ($searchCol != '') {
                $where = $columnd[$i] . ' LIKE "%' . $searchCol . '%" ';
                break;
            }
        }
        if ($where != '') {
            $sql .= " WHERE " . $where;
        }
        $sql .= " ORDER BY {$columnd[$dt['order'][0]['column']]} {$dt['order'][0]['dir']}";
        $start = $dt['start'];
        $length = $dt['length'];
        $sql .= " LIMIT {$start}, {$length}";
        $list = $this->db->query($sql);
        $option['draw'] = $dt['draw'];
        $option['recordsTotal'] = $rowCount;
        $option['recordsFiltered'] = $rowCount;
        $option['data'] = array();

        foreach ($list->result_array() as $row => $value) {
            $rows = array();
            $rows[] = 'L-' . $value[$columnd[0]];
            $rows[] = $value[$columnd[1]];
            $rows[] = $value[$columnd[2]];
            $rows[] = $value[$columnd[3]];
            $rows[] = $value[$columnd[4]];
            $rows[] = $value[$columnd[5]];
            $rows[] = $value[$columnd[6]];
            $rows[] = $value[$columnd[7]];
            $option['data'][] = $rows;
        }
        echo json_encode($option);
    }

    function Datatables_Transformasi_1($dt) {
        $columns = implode(', ', $dt['col-display']) . ', ' . $dt['id-table'];
        $sql = "SELECT {$columns} FROM {$dt['table']}";
        $data = $this->db->query($sql);
        $rowCount = $data->num_rows();
        $data->free_result();
        $columnd = $dt['col-display'];
        $count_c = count($columnd);
        $search = $dt['search']['value'];
        $where = '';
        if ($search != '') {
            for ($i = 0; $i < $count_c; $i++) {
                $where .= $columnd[$i] . ' LIKE "%' . $search . '%"';

                if ($i < $count_c - 1) {
                    $where .= ' OR ';
                }
            }
        }
        for ($i = 0; $i < $count_c; $i++) {
            $searchCol = $dt['columns'][$i]['search']['value'];
            if ($searchCol != '') {
                $where = $columnd[$i] . ' LIKE "%' . $searchCol . '%" ';
                break;
            }
        }
        if ($where != '') {
            $sql .= " WHERE " . $where;
        }
        $sql .= " ORDER BY {$columnd[$dt['order'][0]['column']]} {$dt['order'][0]['dir']}";
        $start = $dt['start'];
        $length = $dt['length'];
        $sql .= " LIMIT {$start}, {$length}";
        $list = $this->db->query($sql);
        $option['draw'] = $dt['draw'];
        $option['recordsTotal'] = $rowCount;
        $option['recordsFiltered'] = $rowCount;
        $option['data'] = array();

        foreach ($list->result_array() as $row => $value) {
            $rows = array();
            $rows[] = 'L-' . $value[$columnd[0]];
            $rows[] = $value[$columnd[1]];
            $rows[] = $value[$columnd[2]];
            $rows[] = $value[$columnd[3]];
            $rows[] = $value[$columnd[4]];
            $rows[] = $value[$columnd[5]];
            $rows[] = $value[$columnd[6]];
            $rows[] = $value[$columnd[7]];
            $option['data'][] = $rows;
        }
        echo json_encode($option);
    }

    function Datatables_Koordinat($dt) {
        $columns = implode(', ', $dt['col-display']) . ', ' . $dt['id-table'];
        $sql = "SELECT {$columns} FROM {$dt['table']}";
        $data = $this->db->query($sql);
        $rowCount = $data->num_rows();
        $data->free_result();
        $columnd = $dt['col-display'];
        $count_c = count($columnd);
        $search = $dt['search']['value'];
        $where = '';
        if ($search != '') {
            for ($i = 0; $i < $count_c; $i++) {
                $where .= $columnd[$i] . ' LIKE "%' . $search . '%"';

                if ($i < $count_c - 1) {
                    $where .= ' OR ';
                }
            }
        }
        for ($i = 0; $i < $count_c; $i++) {
            $searchCol = $dt['columns'][$i]['search']['value'];
            if ($searchCol != '') {
                $where = $columnd[$i] . ' LIKE "%' . $searchCol . '%" ';
                break;
            }
        }
        if ($where != '') {
            $sql .= " WHERE " . $where;
        }
        $sql .= " ORDER BY {$columnd[$dt['order'][0]['column']]} {$dt['order'][0]['dir']}";
        $start = $dt['start'];
        $length = $dt['length'];
        $sql .= " LIMIT {$start}, {$length}";
        $list = $this->db->query($sql);
        $option['draw'] = $dt['draw'];
        $option['recordsTotal'] = $rowCount;
        $option['recordsFiltered'] = $rowCount;
        $option['data'] = array();

        foreach ($list->result_array() as $row => $value) {
            $rows = array();
            $rows[] = 'Koor-' . $value[$columnd[0]];
            $rows[] = $value[$columnd[1]];
            $rows[] = $value[$columnd[2]];
            $rows[] = $value[$columnd[3]];
            $option['data'][] = $rows;
        }
        echo json_encode($option);
    }

}