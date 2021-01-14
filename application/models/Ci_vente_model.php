<?php

class Ci_vente_model extends CI_Model{

    /**
     * Ci_vente_model constructor.
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * la fonction qui permet de connecter un user
     * @param $nom_ut
     * @param $mot_pass
     * @return bool|array
     */
    function connexion($nom_ut, $mot_pass){

        $this->db->where('nom_ut', $nom_ut);
        $this->db->where('mot_pass', md5($mot_pass));
        $query = $this->db->get('utilisateurs');

        return ($query->num_rows() > 0) ? $query->row() : FALSE;
    }

    function getList($table, $where = []){
        return $this->db->get_where($table, $where)->result();
    }

    function getUnique($table, $where = []){
        return $this->db->get_where($table, $where)->row();
    }

    function setInsert($table, $data){
        return $this->db->insert($table, $data);
    }

    function setUpdate($table, $data, $where){
        return $this->db->update($table, $data, $where);
    }

    function getCount($table, $where = []){
        return $this->db->where($where)->count_all_results($table);
    }

    function setDelete($table, $where){
        return $this->db->delete($table, $where);
    }

    function getReq($req)
    {
        return $this->db->query($req);
    }


    /*** Bal-oy getJoin ***
     *
     ************** getJoin2 une fonction parcourant une base de donnée par clé étrangère dans une db ***************
     *
     * @author Bal-oy M
     * @example getJoin(['utilisateurs', 'clients'], ['id_utilisateur'], ['clients.email' => 'baldomwamba@gmail.com'], 'utilisateurs.user_name as NOM', 'row')
     * @version 1.01
     *
     *
     * @param array $table : les tables par ordre de jointure
     * @param array $join : les champs de jointure dans les tables, length = length of tables moins un
     * @param array $where : une ou plusieurs conditions sur WHERE, default = []
     * @param string $select : les champs sélectionnés sur SELECT, default = *
     * @param string $mode : fetching mode, choisir entre result et row, default = default
     * @return string|mixed : valeur de retour de la function soit une chaine des caractères, un tableau ou encore false
     */

    function getJoin (array $table, array $join, array $where = [], string $select = '*',string $mode = 'result')
    {

        $join_var = [];
        $size_table = sizeof($table);
        $size_join = sizeof($join);

        if ($size_join != ($size_table-1))
            return "Vos tables ne sont pas compatibles avec vos joins !";

        for ($i = 0; $i < $size_table; $i++ )
        {

            if ($i != ($size_table - 1)){

                $join_var[] = $table[$i+1] . ',' . $table[$i] . ',' . $join[$i] . ',' . $table[$i+1] . ',' . $join[$i];
            }
        }

        $this->db->select($select);
        $this->db->where($where);
        $this->db->from($table[0]);

        foreach ($join_var as $joint_var_item)
        {

            $explode_by_bmk = explode(',', $joint_var_item);
            $this->db->join($explode_by_bmk[0], $explode_by_bmk[1] . '.' . $explode_by_bmk[2] . ' = ' . $explode_by_bmk[3] . '.' . $explode_by_bmk[4], 'left');
        }

        return $query = $this->db->get()->$mode();

    }

}