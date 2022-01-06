<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('Home');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('tb_user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('tb_user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        //if ($userAccess->num_rows() < 1 or $role_id == 3)
        if ($role_id > 5) {
            redirect('Home/blocked');
        }
    }

    function check_access($role_id, $menu_id)
    {
        $ci = get_instance();

        $ci->db->where('role_id', $role_id);
        $ci->db->where('menu_id', $menu_id);
        $result = $ci->db->get('tb_user_access_menu');

        if ($result->num_rows() > 0) {
            return "checked = 'checked'";
        }
    }

    function check_default_sign($sign_id, $user_id, $type_sign)
    {
        $ci = get_instance();

        $ci->db->where('id_sign', $sign_id);
        $ci->db->where('user_id', $user_id);
        $ci->db->where('type_sign', $type_sign);
        $ci->db->where('default_sign', 1);
        $result = $ci->db->get('tb_signature');

        if ($result->num_rows() > 0) {
            return "checked = 'checked'";
        }
    }
}
