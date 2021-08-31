<?php

class vistasModelo
{
    protected function obtener_vistas_modelo($vistas)
    {
        //permitir las vistas q se van a mostrar
        $listaBlanca = [
            "home", "search", "certificados", "certificadoslista", "myaccount", "mydata",
            "reqbautismo", "reqmatrimonio", "reqconfirmacion", "bautismo", "confirmacion", "matrimonio",
            "bautismoslista", "confirmacioneslista", "matrimonioslista", "misas", "misaslista", "visitas",
            "visitaslista", "asistenciasgen", "asistenciasgenlista", "asistenciascar", "asistenciascarlista",
            "solicitudes", "solicitudeslista", "solicitudmatricula", "solicitudagenda", "solicitudcertificado",
            "recibo", "reciboslista", "aportes", "aporteslista", "retiros", "retiroslista", "caritas",
            "caritaslista", "usuarios", "usuarioslista", "donaciones", "donacioneslista", "enviarrequisitos",
            "misasup", "visitasup", "retirosup", "caritasup", "usuariosup", "registros", "visitantehome",
            "secretariohome", "salir", "buscarmisa", "asistenciasgenup", "aportesup", "asistenciascarup",
            // modifico yo calendaio
            "calendario",
            // horarios
            "horarios", "horariosnew", "horariosedit",
            // certificado bautizo
            "certificadobautizo", "certificadobautizonew","certificadobautizoedit","certificadomatrimonio","certificadomatrimonionew","certificadomatrimonioedit"
        ];

        if (in_array($vistas, $listaBlanca)) {
            if (is_file("./vistas/contenidos/" . $vistas . "-view.php")) {
                $contenido = "./vistas/contenidos/" . $vistas . "-view.php";
            } else {
                $contenido = "login";
            }
        } elseif ($vistas == "login") {
            $contenido = "login";
        } elseif ($vistas == "reportebautiso") {
            $contenido = "reportebautiso";
        } elseif ($vistas == "reportematrimonio") {
            $contenido = "reportematrimonio";
        }  elseif ($vistas == "index") {
            $contenido = "login";
        } else {
            $contenido = "404";
        }
        return $contenido;
    }
}
