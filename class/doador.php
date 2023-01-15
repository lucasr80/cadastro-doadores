<?php

class Doador{

        // Conexão
        private $conn;

        // Tabela
        private $db_table = "doadores";

        // Columns
        public $id;
        public $nome;
        public $email;
        public $cpf;
        public $telefone;
        public $data_nascimento;
        public $data_cadastro;
        public $intervalo;
        public $valor_doacao;
        public $tipo_pagamento;
        public $conta;
        public $numero_cartao;
        public $existe_cartao;

        // Conexão DataBase
        public function __construct($db){
            $this->conn = $db;
        }

        // INSERIR REGISTRO
        public function createDoador(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table . 
                        "(  nome,  email,  cpf,  telefone,  data_nascimento,  data_cadastro,  intervalo,  valor_doacao,  tipo_pagamento,  conta,  numero_cartao ) VALUES " .
                        "( :nome, :email, :cpf, :telefone, :data_nascimento, :data_cadastro, :intervalo, :valor_doacao, :tipo_pagamento, :conta, :numero_cartao )";
                    
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->nome = htmlspecialchars(strip_tags($this->nome));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->cpf = htmlspecialchars(strip_tags($this->cpf));
            $this->telefone = htmlspecialchars(strip_tags($this->telefone));
            $this->data_nascimento = htmlspecialchars(strip_tags($this->data_nascimento));
            $this->data_cadastro = htmlspecialchars(strip_tags($this->data_cadastro));
            $this->intervalo = htmlspecialchars(strip_tags($this->intervalo));
            $this->valor_doacao = htmlspecialchars(strip_tags($this->valor_doacao));
            $this->tipo_pagamento = htmlspecialchars(strip_tags($this->tipo_pagamento));
            $this->conta = htmlspecialchars(strip_tags($this->conta));
            $this->numero_cartao = htmlspecialchars(strip_tags($this->numero_cartao));

            // bind data
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":cpf", $this->cpf);
            $stmt->bindParam(":telefone", $this->telefone);
            $stmt->bindParam(":data_nascimento", $this->data_nascimento);
            $stmt->bindParam(":data_cadastro", $this->data_cadastro);
            $stmt->bindParam(":intervalo", $this->intervalo);
            $stmt->bindParam(":valor_doacao", $this->valor_doacao);
            $stmt->bindParam(":tipo_pagamento", $this->tipo_pagamento);
            $stmt->bindParam(":conta", $this->conta);
            $stmt->bindParam(":numero_cartao", $this->numero_cartao);

            try {
                if($stmt->execute()){
                    return true;
                 }
                 return false;             
            } catch (\PDOException $e) {
                echo $e->getMessage();        
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }
        
                
        }

        // verifique se já existe o cartao
        public function verifique_cartao(){          
            $sqlQuery = "SELECT numero_cartao FROM ". $this->db_table ." WHERE numero_cartao like ( ? )";

            $stmt = $this->conn->prepare($sqlQuery);

            $pesquisar = htmlspecialchars(strip_tags($this->numero_cartao));
            $pesquisar = substr($pesquisar, 0, 6) . "______" . substr($pesquisar, 12, 4);
            $stmt->bindParam(1, $pesquisar);            
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

            // Se já existe um cartão, não pode adicionar
            if($dataRow['numero_cartao']){
                return false;
            }
            return true;             
        } 

    }