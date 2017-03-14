<?php
include_once '../static/top.php';
require_once '../../../model/Usuario.php';

$usuarios = new Usuario();
$rows = $usuarios->getUsuarios();
?>
<div class="x_title">
    <h3>Usuários:</h3>
    <div class="clearfix"></div>
</div>
<div class="x_panel">
    <table class="table table-hover" border="0" align="center" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Login</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($rows as $row) :
                ?>
                <tr>
                    <th scope="row"><?= $row->getIdUsuario() ?> </th>
                    <td> <?= $row->getLogin() ?> </td>
                    <td>
                        <button class="btn btn-info" onclick="excluir(<?= $row->getIdUsuario() ?>);">Remover</button>
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
