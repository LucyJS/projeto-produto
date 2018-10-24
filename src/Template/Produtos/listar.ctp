
<h1>Lista de Produtos</h1>

<button type="button" id="cadastrar" >Novo</button>
<button type="button" id="editar">Editar</button>
<button type="button" id="excluir">Excluir</button>

<form action="#n" name="formularioListaProduto">

    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Descrição</th>
                <th>Saldo</th>
                <th>Preço</th>
                <th>Ativo</th>
            </tr>
        </thead>
        <tbody>

        <?php
        foreach ($listaProdutos as $row) {
            ?>
            <tr>
                <th><input type="radio" name="produtoSelecionado" value="<?php echo  $row->codigo ?>">Código</th>
                <th><?php echo $row->codigo;?></th>
                <th><?php echo $row->descricao;?></th>
                <th><?php echo $row->saldo;?></th>
                <th><?php echo $row->preco;?></th>
                <th><input type="checkbox" " value="<?php echo $row->ativo?>"></th>
            </tr>
            <?php
        }
        ?>

        <tbody>
    </table>
</form>

<div class="modal" id="modalCadastro">
        <div class="modal-content">
            <div class="modal-header">
                Cadastrar Produto <span id="modal-fechar">FECHAR</span>
            </div>  
            <form>
                <label>Descrição</label>
                <input type="text" name="produto[descricao]" value="" />
            </form>
            <button class="botao-modal" onclick="cadastrarProduto()">Cadastrar</button>
        </div>
    </div>
<?= $this->Html->css('listar') ?>
<?= $this->Html->script('listar') ?>