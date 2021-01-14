<?php

function is_required($field, $label){

    return
        [
            'field' => $field,
            'label' => $label,
            'rules' => 'required',
            'errors' => [
                'required' => 'Le champ %s est requis',
            ]
        ];
}

function is_length ($field, $label){

    return
        [
            'field' => $field,
            'label' => $label,
            'rules' => 'required|min_length[3]|max_length[30]',
            'errors' =>
                [
                    'required' => 'Le champ %s est requis',
                    'min_length' => 'Le %s doit contenir au moins six caractères',
                    'max_length' => 'Le %s doit contenir au plus douze caractères'
                ]
        ];
}

function is_num ($field, $label)
{
    return

        array(
            'field' => $field,
            'label' => $label,
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'Le champ %s est requis',
                'numeric' => 'Ce %s doit être numérique'
            ]
        );
}

function nom_ut(){
    return
        array(
            'field' => 'nom_ut',
            'label' => "Nom d'utilisateur",
            'rules' => 'required|min_length[3]|max_length[30]|is_unique[utilisateurs.nom_ut]',
            'errors' =>
                [
                    'required' => 'Le champ %s est requis',
                    'min_length' => 'Le %s doit contenir au moins trois caractères',
                    'max_length' => 'Le %s doit contenir au plus trente caractères',
                    'is_unique' => "Ce nom d'utilisateur est déjà utilisé"
                ]
        );
}

function mot_pass(){

    return
        array(
            'field' => 'mot_pass',
            'label' => "Mot de passe",
            'rules' => 'required|min_length[6]|max_length[12]',
            'errors' =>
                [
                    'required' => 'Le champ %s est requis',
                    'min_length' => 'Le %s doit contenir au moins six caractères',
                    'max_length' => 'Le %s doit contenir au plus douze caractères'
                ]
        );
}

function conf_mot_pass (){

    return
        array(
            'field' => 'conf_mot_pass',
            'label' => "Conf. Mot de passe",
            'rules' => 'required|min_length[6]|max_length[12]|matches[mot_pass]',
            'errors' =>
                [
                    'required' => 'Le champ %s est requis',
                    'min_length' => 'Le %s doit contenir au moins six caractères',
                    'max_length' => 'Le %s doit contenir au plus douze caractères',
                    'matches' => 'Le champ %s doit correspondre avec le champ Mot de passe'
                ]
        );
}



$config = array(

    'auth/connexion' =>

        array(

            is_length('nom_ut', "Nom de l'Utilisateur"),

            mot_pass(),
        ),

    'auth/enreg' =>

        array(
            is_length('nom_client', 'Nom du client'),

            array(
                'field' => 'nom_ut',
                'label' => "Nom d'utilisateur",
                'rules' => 'required|min_length[3]|max_length[30]|is_unique[utilisateurs.nom_ut]',
                'errors' =>
                    [
                        'required' => 'Le champ %s est requis',
                        'min_length' => 'Le %s doit contenir au moins six caractères',
                        'max_length' => 'Le %s doit contenir au plus douze caractères',
                        'is_unique' => "Ce nom d'utilisateur est déja utilisé",
                    ]
            ),
            array(
                'field' => 'telephone_client',
                'label' => "Numéro de Téléphone",
                'rules' => 'is_unique[clients.telephone_client]|numeric|exact_length[10]',
                'errors' =>
                    [
                        'is_unique' => 'Ce numéro de téléphone est déjè utilisé',
                        'numeric' => 'Le champ %s doit numérique',
                        'exact_length' => 'Le champ %s doit contenir exactement 10 caractères'
                    ]
            ),
            array(
                'field' => 'adresse_client',
                'label' => "Adresse du client",
                'rules' => 'min_length[10]|max_length[50]',
                'errors' =>
                    [
                        'min_length' => 'Le %s doit contenir au moins Dix caractères',
                        'max_length' => 'Le %s doit contenir au plus Cinquante caractères'
                    ]
            ),

            mot_pass(),

            conf_mot_pass ()

        ),

    'admin/ajout_ut' =>
        array(

            nom_ut(),

            is_required('role_ut', 'Privilège Utilisateur'),

            mot_pass(),

            conf_mot_pass()
        ),

    'client/panier' =>
        array(
            is_required('code_mat', 'Matériaux'),

            array(
                'field' => 'qte_cmd',
                'label' => "Quantité à commander",
                'rules' => 'numeric|required',
                'errors' =>
                    [
                        'numeric' => 'Le champ %s doit numérique',
                        'required' => 'Le champ %s réquis'
                    ]
            )
        ),

    'service_client/ajout_materiaux' =>

        array(

            array(
                'field' => 'name',
                'label' => 'Nom du materiel',
                'rules' => 'required|min_length[3]|max_length[30]|is_unique[materiaux.name]',
                'errors' => [
                    'required' => 'Le champ %s est requis',
                    'min_length' => 'Le champ %s doit contenir au minimum trois caractères',
                    'max_length' => 'Le champ %s doit contenir au maximum trente caractères',
                    'is_unique' => 'Ce %s Est déjà utilisé'
                ]
            ),

            is_num('qte_stock', "Quantité en stock du materiel"),

            is_num('prix_unitaire', "Prix unitaire du materiel"),

        )

);
