<?php
    include_once '../class/database.php';
    include_once '../class/doador.php';
        
    $item = new Doador($db);      

    $item->tipo_pagamento = $_POST['tipo_pagamento'];  
    // Se for cartão de Crédito    
    if( $item->tipo_pagamento == 0 ){
        $item->numero_cartao = str_replace( " ", "", $_POST['numero_cartao'] );
        if( strlen($item->numero_cartao) != 16){
            echo "Número do cartão não pode ser vazio ou incompleto!";     
            return false;
        }        

        if(!$item->verifique_cartao()){
            echo "Não foi possível cadastrar esse número de cartão, entre em contato com o seu supervisor!";        
        }
    }else{
        // Se for conta corrente
        $item->conta = str_replace( " ", "", $_POST['conta'] );
        if( strlen($item->conta) == 0){
            echo "Número da Conta Corrente não pode ser vazio!";     
            return false;
        }        
    }

    $item->nome = $_POST['nome'];
    $item->email = $_POST['email'];
    $item->cpf = $_POST['cpf'];
    $item->telefone = $_POST['telefone'];
    $item->data_nascimento = $_POST['data_nascimento'];
    $item->data_cadastro = date('Y-m-d H:i:s');
    $item->intervalo = $_POST['intervalo'];
    $item->valor_doacao = $_POST['valor_doacao'];        

    try {
        if($item->createDoador()){
            echo "Cadastro realizado com sucesso!";
        } else{
            echo 'Atenção, Doador não pode ser criado.';
        }
    
    } catch (\PDOException $e) {
        echo $e->getMessage();
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }   

