<?php
include_once '../static/top.php';
require_once '../../../model/Dispositivo.php';

$dispositivos = new Dispositivo();
$rows = $dispositivos->getDispositivos();
?>
<div class="x_title">
    <h3>Dispositivos:</h3>
    <div class="clearfix"></div>
</div>
<div class="x_panel">
    <table class="table table-hover" border="0" align="center" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Endereço</th>
                <th>Localização X</th>
                <th>Localização Y</th>
                <th>Responsável</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($rows as $row) :
                ?>
                <tr>
                    <th scope="row"><?= $row->getIddispositivo() ?> </th>
                    <td> <?= $row->getEndereco_comp() ?> </td> 
                    <td> <?= $row->getLocalizacao_x() ?> </td>
                    <td> <?= $row->getLocalizacao_y() ?> </td>
                    <td> <?= $row->getNome_resp() ?> </td>
                    <td> <?= $row->getTelefone_resp() ?> </td>
                    <td> <?= $row->getEmail_resp() ?> </td>
                    <td>
                        <button class="btn btn-info" onclick="excluir(<?= $row->getIddispositivo() ?>);">Remover</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button type="button" class="btn btn-success pull-right" onclick="location.href = 'inserir.php'">Inserir
    </button>
</div>

<?php
include_once '../static/bottom.php';
?>
