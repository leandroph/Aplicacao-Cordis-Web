	
<?php 
    include_once("../php/bd/conecta.php");

    $id = $_REQUEST['id'];
    $tipo = $_REQUEST['tipo'];

    // $result_sub_cat = "SELECT id, nome FROM tb_estados WHERE id_pais = $id_categoria";
	// $resultado_sub_cat = mysqli_query($id_conexao, $result_sub_cat);
	
	// while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
	// 	$sub_categorias_post[] = array(
	// 		'id'	=> $row_sub_cat['id'],
	// 		'nome' => $row_sub_cat['nome'],
	// 	);
	// }
	// echo(json_encode($sub_categorias_post));
	
	


// $pdo = new PDO('mysql:host=localhost;dbname=bd_clinica_cordis', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

//     $id_categoria = $_REQUEST['id_categoria'];
//     $sql = 'SELECT uf, nome FROM tb_estados WHERE pais = ?';
//     $stm = $pdo->prepare($sql);
//     $stm->bindValue(1, $id_categoria);
//     $stm->execute();
//     sleep(1);
//     echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
//     $pdo = null;

// $opcao = isset($_GET['opcao']) ? $_GET['opcao'] : '';
// $valor = isset($_GET['valor']) ? $_GET['valor'] : '';

if (!empty($tipo)) {
    switch ($tipo) {
        case 'pais': {
                echo getAllPais($id, $id_conexao);
                break;
            }
        case 'estado': {
                echo getFilterEstado($id, $id_conexao);
                break;
            }
        case 'cidade': {
                echo getFilterCidade($valor);
                break;
            }
    }
}

function getAllPais($id_categoria, $id_conexao)
{
    $result_sub_cat = "SELECT id, nome FROM tb_estados WHERE id_pais = $id_categoria";
	$resultado_sub_cat = mysqli_query($id_conexao, $result_sub_cat);
	
	while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
		$sub_categorias_post[] = array(
			'id'	=> $row_sub_cat['id'],
			'nome' => $row_sub_cat['nome'],
		);
	}
	echo(json_encode($sub_categorias_post));
}

function getFilterEstado($id_categoria, $id_conexao)
{
    $result_sub_cat = "SELECT id, nome FROM tb_cidades WHERE id_estado = $id_categoria";
	$resultado_sub_cat = mysqli_query($id_conexao, $result_sub_cat);
	
	while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
		$sub_categorias_post[] = array(
			'id'	=> $row_sub_cat['id'],
			'nome' => $row_sub_cat['nome'],
		);
	}
	echo(json_encode($sub_categorias_post));
}

function getFilterCidade($estado)
{
    $sql = 'SELECT nome FROM tb_cidades WHERE uf = ?';
    $stm = $pdo->prepare($sql);
    $stm->bindValue(1, $estado);
    $stm->execute();
    sleep(1);
    echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
    $pdo = null;
}
?>