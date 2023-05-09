<?php   
    session_start();
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require $root."/gerenciador_de_estoque/conn/conect.php";

    class Produto {
            public $db;
            // private $codigo = $_POST['codigo'];
            // private $nome = $_POST['nome'];
            // private $preco = $_POST['preco'];
           
        
            public function __construct() {
                $this->db = new Database();
            }

            public function getProdutos() {
                $sql = "SELECT * FROM db_estoque.produto";
                $result = $this->db->conn->query($sql);
                $produtos = [];

                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $produtos[] = $row;
                    }
                }               
                return $produtos;
            }
            
            public function addProduto($codigo, $nome, $preco) {
                
                $sql = "INSERT INTO produto (codigo, nome, preco) VALUES ('$codigo', '$nome', '$preco')";
                if ($this->db->conn->query($sql) === TRUE) {
                    echo 'Produto adicionado com sucesso.';
                } else {
                    echo 'Erro ao adicionar produto: ' . $this->db->conn->error;
                }
            }
            
            public function editarProduto($codigo, $dados) {
                $novoCodigo = $dados['codigo'];
                $nome = $dados['nome'];
                $preco = $dados['preco'];

                $sql = "UPDATE db_estoque.produto SET codigo='$novoCodigo', nome='$nome', preco='$preco' WHERE (`codigo` = '$codigo')";
                if ($this->db->conn->query($sql) === TRUE) {
                    echo 'Produto atualizado com sucesso.';
                } else {
                    echo 'Erro ao atualizar produto: ';
                }
            }

            public function delete($codigo) {
                try {
                    $sql = "DELETE FROM db_estoque.produto WHERE codigo = '$codigo';";
                    if ($this->db->conn->query($sql) === TRUE) {
                        echo 'Deletado.';
                    } else {
                        echo 'Erro ao atualizar produto: ';
                    }
                } catch (\Exception $th) {
                    var_dump( $th);die;
                }
            }

            public function encontrar($codigo) {
                $sql = "SELECT * FROM db_estoque.produto where codigo = '$codigo' limit 1";
                $result = $this->db->conn->query($sql);
                // $produtos = [];

                // if($result->num_rows > 0) {
                //     while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                //         $produtos[] = $row;
                //     }
                // }               
                return $result->fetch_array(MYSQLI_ASSOC);
            }


        }

        // class Produto {
//     private $codigo;
//     private $nome;
//     private $preco;
    
//     public function __construct($codigo, $nome, $preco) {
//         $this->codigo = $codigo;
//         $this->nome = $nome;
//         $this->preco = $preco;
//     }


//     public function __set($atributo, $valor) {
//         $this->$atributo = $valor;
//     }

//     public function cadastrar() {
//         global $mysqli; // Essa variável foi criada fora da classe


//         $stmt = $mysqli->prepare("INSERT INTO produto (codigo, nome, preco) VALUES (?, ?, ?)");
       
//         $stmt->bind_param('sds', $this->codigo, $this->nome, $this->preco);
//         $stmt->prepare();
//         $stmt->close();
        
        
//     }

//     public function validando() {
//         if(empty($this->codigo) || empty($this->nome) || empty($this->preco)) {
//             // return false;
//             echo 'esta vasil';
//         }
//         return true;
//     }
// }


// $produto = new Produto('codigo', 'nome', 'preco');
?>

