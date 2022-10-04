<?php
    require_once '../../model/conexaobd.php';
    function validarDados($nome, $sobrenome, $cpf, $telefone, $email, $senha, $senha2) {

        $msgErro = "";

        if (empty($nome)) {
            $msgErro = $msgErro . "NOME inválido! <BR>";
        }

        if ( empty($sobrenome) ) {
            $msgErro = $msgErro . "SOBRENOME inválido! <BR>";
        }

        if ( empty($cpf) ) {
            $msgErro = $msgErro . "CPF inválido! <BR>";
        }

        if ( empty($telefone) ) {
            $msgErro = $msgErro . "Telefone inválido! <BR>";
        }

        if ( empty($email) ) {
            $msgErro = $msgErro . "EMAIL inválido! <BR>";
        }

        if ( empty($senha) ) {
            $msgErro = $msgErro . "SENHA inválido! <BR>";
        } elseif ( empty($senha2) || $senha!=$senha2) {
            $msgErro = $msgErro . "SENHA2 inválida! <BR>";
        }

        return $msgErro;
    }

    function validarDadosSala($email, $cnpj, $nomeFantasia, $cep, $estado, $cidade, $bairro, $rua, $numero, $complemento, $telefone, $descricao) {
    
        $msgErro = "";

        if (empty($email)) {
            $msgErro = $msgErro . "EMAIL inválido! <BR>";
        }
        if (empty($cnpj)) {
            $msgErro = $msgErro . "CNPJ inválido! <BR>";
        }
        if (empty($nomeFantasia)) {
            $msgErro = $msgErro . "NOME inválido! <BR>";
        }
        if (empty($cep)) {
            $msgErro = $msgErro . "CEP inválido! <BR>";
        }
        if (empty($estado)) {
            $msgErro = $msgErro . "ESTADO inválido! <BR>";
        }
        if (empty($cidade)) {
            $msgErro = $msgErro . "CIDADE inválida! <BR>";
        }
        if (empty($bairro)) {
            $msgErro = $msgErro . "BAIRRO inválido! <BR>";
        }
        if ( empty($rua) ) {
            $msgErro = $msgErro . "RUA inválida! <BR>";
        }
        if ( empty($numero) ) {
            $msgErro = $msgErro . "NUMERO inválido! <BR>";
        }
        if ( empty($complemento) ) {
            $msgErro = $complemento . "COMPLEMENTO inválido! <BR>";
        }
        if ( empty($telefone) ) {
            $msgErro = $telefone . "TELEFONE inválido! <BR>";
        }
        if ( empty($descricao) ) {
            $msgErro = $descricao . "DESCRIÇÃO inválida! <BR>";
        }

        return $msgErro;
    }
    

    function validarDadosAttUsuario($id, $imagem, $senha, $senhaModal) {
        $msgErro = "";
        if($senha==$senhaModal) {
            require_once '../../model/perfilDAO.php';
            $conexao = conectarBD();
            $dados = carregarConfig($conexao, $id);
            if($dados['senha']==$senha) {
                if ($imagem["error"]!=0) {
                    $msgErro = $msgErro . "Erro ao fazer upload da imagem! <BR>";
                } else if ($imagem["size"]>65000) {
                    $msgErro = $msgErro . "Imagem maior que 65Kb! <BR>";
                } else if(($imagem["type"]!="image/gif") &&
                    ($imagem["type"]!="image/jpeg") &&
                    ($imagem["type"]!="image/pjpeg") &&
                    ($imagem["type"]!="image/png") &&
                    ($imagem["type"]!="image/x-png") &&
                    ($imagem["type"]!="image/bmp")  ) {
                        $msgErro= $imagem["type"];
                }
            }
        } else {
            $msgErro = $msgErro . "Senha inválida! <BR>";
        }
        return $msgErro;
    }

    function validarData($dt) {
        $dataSep = explode("/", $dt);
        if ( count($dataSep) != 3 ) {
            return false;
        } else {
            $dia = $dataSep[0];
            $mes = $dataSep[1];
            $ano = $dataSep[2];
            return checkdate($mes, $dia, $ano);
        }
    }

    function converterDataParaBanco ($data) {
        if ( validarData($data) ) {
            $dtSep = explode("/", $data);
            $dia = $dtSep[0];
            $mes = $dtSep[1];
            $ano = $dtSep[2];
            return "$ano-$mes-$dia";
        } else {
            return null;
        }
    }

    function converterNumerico ($string) {
        $output = preg_replace( '/[^0-9]/', '', $string );
        return $output;
    }
?>

