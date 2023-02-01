<?php

require_once '../include/config.php';

$conexao = new conexao();
$con = $conexao->conecta();

if ($_GET['option'] == 'addEspecificacao') {
	echo '<div class="row" id="especi' . $_POST['quant'] . '">
		<div class="col-12 col-md-2 form-group">
			<select name="IDMaterial' . $_POST['quant'] . '" onchange="exibesubmaterial(' . $_POST['quant'] . ')" id="IDMaterial' . $_POST['quant'] . '" class="form-select" required>
				<option value="" class="d-none">Selecione...</option>';
	$query = $con->query("CALL Proc_Materiais_S");
	while ($res = $query->fetch(PDO::FETCH_OBJ)) {
		echo '<option value="' . $res->IDMaterial . '">' . $res->Nome . '</option>';
	}
	$query->closeCursor();
	echo '</select>
		</div>
		<div class="col-12 col-md-3 form-group">
			<select name="IDSubMaterial' . $_POST['quant'] . '" disabled id="IDSubMaterial' . $_POST['quant'] . '" class="form-select" required></select>
		</div>
		<div class="col-12 col-md-5 form-group">
			<input type="text" name="Nome' . $_POST['quant'] . '" id="Nome' . $_POST['quant'] . '" class="form-control" required>
		</div>
		<div class="col-12 col-md-1 form-group">
			<a onclick="deletaEspecificacao(' . $_POST['quant'] . ')"  class="form-control btn bg-gradient-danger btn-sm py-1 px-3"><i class="fa-solid fa-trash font-20 my-2"></i></a>
		</div>
		<div class="col-12 col-md-1 form-group">
			<a onclick="copiarEspe(' . $_POST['quant'] . ')" title="Copiar Especificação" class="form-control btn bg-gradient-warning btn-sm py-1 px-3"><i class="fa-solid fa-copy font-20 my-2"></i></a>
		</div>
	</div>';
}

if ($_GET['option'] == 'exibesubmaterial') {
	$query = $con->prepare('CALL Proc_SubMateriais_S_E (:IDMaterial)');
	$query->bindValue(':IDMaterial', $_POST['IDMaterial']);
	$query->execute();
	echo '<option value="" class="d-none">Selecione...</option>';
	while ($res = $query->fetch(PDO::FETCH_OBJ))
		echo '<option value="' . $res->IDSubMaterial . '">' . $res->Nome . '</option>';
}

if ($_GET['option'] == 'copia') {
	$i = 0;
	while ($i < count($_POST['CopiaIDVariacao'])) {
		$query = $con->prepare('CALL Proc_Especificacao_I (:IDSubMaterial, :IDVariacao, :Nome)');
		$query->bindValue(':IDVariacao', $_POST['CopiaIDVariacao'][$i]);
		$query->bindValue(':IDSubMaterial', $_POST['CopiaIDSubMaterial']);
		$query->bindValue(':Nome', $_POST['CopiaNome']);
		$query->execute();
		$i++;
	}
}
