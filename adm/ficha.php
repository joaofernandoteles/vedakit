<?php

require_once 'assets/include/config.php';
require_once 'vendor/autoload.php';
require_once 'vendor/spipu/html2pdf/src/Html2Pdf.php';
require_once 'vendor/tecnickcom/tcpdf/tcpdf.php';

$conexao = new conexao();
$con = $conexao->conecta();

$query = $con->prepare('CALL Proc_VariacaoPdf_S (:IDVariacao)');
$query->bindValue(':IDVariacao', $_GET['IDVariacao']);
$query->execute();
$res = $query->fetch(PDO::FETCH_OBJ);
$Obs = $res->Obs;

$content = '
<style>
    p {
        margin: 0;
        padding: 2px 0;
        font-size: 8pt;
    }
    p span {
        font-size: 7pt;
    }
    h1 {
        margin: 0;
        padding: 0;
        font-size: 12pt;
    }
    h2 {
        margin: 0;
        padding: 0;
        font-size: 10pt;
    }
    tr {
        margin: 0;
        padding: 0;
    }
    .top {
        position: relative;
    }
    .text {
        position: absolute;
        width: 100%;
        margin-left: 50px;
        text-align: center;
        margin-top: 15px;
    }
    table {
        border-collapse: collapse;
    }
    .bt {
        border-top: solid 1px;
    }
    .bb {
        border-bottom: solid 1px;
    }
    .bl {
        border-left: solid 1px;
    }
    .br {
        border-right: solid 1px;
    }
    .borda {
        border: solid 1px;
    }
</style>
<page backtop="196px">
    <page_header> 
        <table id="header">
            <tr>
                <td colspan="2" class="top borda" style="padding: 5px 0 0 5px">
                    <img src="assets/img/logo.png" width="100" style="float: left;">
                    <div class="text">
                        <h1>Ficha Técnica</h1>
                        <h2>'. $res->Tipo .'</h2>
                    </div>
                </td>
                <td rowspan="3" class="borda" style="text-align: center; width: 35%">
                    <img src="assets/img/produtos/' . $res->Imagem . '" width="250" style="margin:auto 5px">
                </td>
            </tr>
            <tr>
                <td class="bl bt bb" style="padding: 0 5px; width: 42%">
                    <p><b>Referencia: </b>' . $res->Referencia . '</p>
                    <p><b>Cliente: </b>' . $res->Cliente . '</p>
                    <p><b>Fornecedor: </b>' . $res->SubCliente . '</p>
                    <p><b>Construção: </b>' . $res->Construcao . '</p>
                </td>
                <td class="br bt bb" style="padding: 0 5px; width: 23%">
                    <p><b>Dt. Cadastro: </b>' . date('d/m/Y', strtotime($res->DataCadastro)) . '</p>
                    <p><b>Divisão: </b>' . $res->Cliente . '</p> <!-- nao sei o que colocar aqui --> 
                    <p><b>Ref. Fornecedor: </b>' . $res->RefFornecedor . '</p>
                    <p><b>Forma: </b>' . $res->Forma . '</p>
                </td>
            </tr>
            <!-- Row C -->
            <tr>
                <td class="bl bt bb" style="padding: 0 5px;">
                    <p><b>Variação: </b>' . $res->Nome . '</p>
                    <p><b>Style name: </b>' . $res->StyleName . '</p>
                    <p><b>Tam / Prs:: </b>' . $res->Tipo . '</p>  <!-- nao sei o que colocar aqui --> 
                </td>
                <td class="br bt bb" style="padding: 0 5px;">
                    <p><b>Stock Nbr: </b>' . $res->StockNumber . '</p>
                    <p><b>Coleção: </b>' . $res->Colecao . '</p>
                    <p><b>Ref. Cliente: </b>' . $res->RefFornecedor . '</p>
                </td>
            </tr>
        </table>
    </page_header> 
    <table>
        <tr style="background-color: #afafaf;">
            <td class="borda" style="width: 30%; padding: 0 4px;">
                <p><b>MATERIAIS</b></p>
            </td>
            <td class="borda" style="width: 70%; padding: 0 4px">
                <p><b>ESPECIFICAÇÃO DOS MATERIAIS</b></p>
            </td>
        </tr>';
$query->closeCursor();
$query = $con->prepare('CALL Proc_MateriaisPDF_S (:IDVariacao)');
$query->bindValue(':IDVariacao', $_GET['IDVariacao']);
$query->execute();
$resMaterias = $query->fetchAll(PDO::FETCH_OBJ);
$query->closeCursor();
foreach ($resMaterias as $resMaterias) {
    $content .= '
    <tr style="background-color: #dbdbdb;">
        <td class="borda" style="width: 30%; padding: 0 4px;">
            <p><b>' . $resMaterias->Nome . '</b></p>
        </td>
        <td class="borda" style="width: 70%;"></td>
    </tr>';
    $query = $con->prepare('CALL Proc_SubMateriaisPDF_S (:IDVariacao, :IDMaterial)');
    $query->bindValue(':IDVariacao', $_GET['IDVariacao']);
    $query->bindValue(':IDMaterial', $resMaterias->IDMaterial);
    $query->execute();
    $resEspeci = $query->fetchAll(PDO::FETCH_OBJ);
    $query->closeCursor();
    foreach ($resEspeci as $resEspeci) {
        $content .= '
        <tr>
            <td class="borda" style="width: 30%; padding: 0 4px;">
                <p><span><b>' . $resEspeci->SubMaterial . '</b></span></p>
            </td>
            <td class="borda" style="width: 70%; padding: 0 4px">
                <p>' . $resEspeci->Nome . '</p>
            </td>
        </tr>';
    }
}
$content .= '
        <tr>
            <td colspan="2" class="bt bl br" style="padding: 0 4px;">
                <p><b>OBSERVAÇÕES</b></p>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="bb bl br" style="padding: 0 4px 5px;">
                <p>' . $Obs . '</p>
            </td>
        </tr>
    </table>
</page>';

$html2pdf = new Spipu\Html2Pdf\Html2Pdf();
$html2pdf->writeHTML($content);
ob_end_clean();
$html2pdf->output();
