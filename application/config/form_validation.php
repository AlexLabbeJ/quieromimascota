<?php

$config = array(
    'registrar' => array(
        array(
            'field' => 'nombre',
            'label' => 'nombres',
            'rules' => 'required',
            'errors' => array(
                'required' => '¿Como te llamas?',
            )
        ),
        array(
            'field' => 'apellidos',
            'label' => 'apellidos',
            'rules' => 'required',
            'errors' => array(
                'required' => '¿Como te llamas?',
            )
        ),
        array(
            'field' => 'email',
            'label' => 'Correo Electronico',
            'rules' => 'required|valid_email|is_unique[usuario.email]'
        ),
        array(
            'field' => 'email2',
            'label' => 'Correo de confirmacion',
            'rules' => 'required|matches[email]',
            'errors' => array(
                'matches' => 'No coinciden los emails.',
            )
        ),
        array(
            'field' => 'region',
            'label' => 'Region',
            'rules' => 'required',
            'errors' => array(
                'required' => '¿En que region vives?',
            )
        ),
        array(
            'field' => 'comuna',
            'label' => 'Comuna',
            'rules' => 'required',
            'errors' => array(
                'required' => '¿En que comuna vives?',
            )
        ),
        array(
            'field' => 'password',
            'label' => 'Contraseña',
            'rules' => 'required',
            'errors' => array(
            //                    'required' => 'Debes ingresar una contraseña',
            )
        ),
        array(
            'field' => 'password2',
            'label' => 'Contraseña de confirmacion',
            'rules' => 'required|matches[password]',
            'errors' => array(
                'matches' => 'Las contraseñas no coinciden.',
            )
        )
    ),
    'login' => array(
        array(
            'field' => 'email',
            'label' => 'Correo Electronico',
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'password',
            'label' => 'Contraseña',
            'rules' => 'required',
        )
    ),
    'actualizarUsuario' => array(
        array(
            'field' => 'nombre_user',
            'label' => 'Nombre',
            'rules' => 'required'
        ),
        array(
            'field' => 'apellidos_user',
            'label' => 'Apellidos',
            'rules' => 'required',
        ),
        array(
            'field' => 'numcelu_user',
            'label' => 'Numero de celular',
            'rules' => 'required',
        ),
        array(
            'field' => 'region_user',
            'label' => 'Región',
            'rules' => 'required',
        ),
        array(
            'field' => 'comuna_user',
            'label' => 'Comuna',
            'rules' => 'required',
        )
    ),
    'cambiarContrasena' => array(
        array(
            'field' => 'passactual_user',
            'label' => 'Contraseña actual',
            'rules' => 'required'
        ),
        array(
            'field' => 'passnueva1_user',
            'label' => 'Contraseña nueva',
            'rules' => 'required'
        ),
        array(
            'field' => 'passnueva2_user',
            'label' => 'Repetir contraseña nueva',
            'rules' => 'required|matches[passnueva1_user]',
            'errors' => array(
                'matches' => 'No coinciden las contraseñas.',
            )
        )
    )
);
