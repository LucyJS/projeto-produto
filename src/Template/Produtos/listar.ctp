<br>
<button type="button" id="cadastrar" >Novo</button>
<button type="button" id="editar">Editar</button>
<button type="button" id="excluir">Excluir</button>

<form action="#n" name="formularioListaProduto">
    
    <table>
   
        <thead>
            <tr>
                <th> </th>
                <th>Código</th>
                <th>Descrição</th>
                <th>Saldo</th>
                <th>Preço</th>
                <th>Ativo?</th>
            </tr>
        </thead>
        <tbody>

        <?php
        foreach ($listaProdutos as $row) {
            ?>
            <tr>
                <th><input type="radio" name="produtoSelecionado" value="<?php echo  $row->codigo ?>"></th>
                <th><?php echo $row->codigo;?></th>
                <th><?php echo $row->descricao;?></th>
                <th><?php echo number_format($row->saldo, 2);?></th>
                <th><?php echo number_format($row->preco, 2);?></th>
                <th><input type="checkbox" name="ativo" id="ativo" value="<?php if($row->ativo === 'true') echo 'checked="checked"';?> " /></th>
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
                Cadastro     
                <span id="modal-fechar" >X</span>
            </div>  
            
            <form class="modal-body">
                <label>Código</label>
                <input type="number" name="produto[codigo]" value="" />

                <label>Ativo?</label>
                <input type="checkbox" name="produto[saldo]" value="" /><br>

                <label>Descrição</label>
                <input type="text" name="produto[descricao]" value="" />
                <label>Saldo</label>
                <input type="number" name="produto[saldo]" value="" />
                <label>Preço</label>R$<input type="number" name="produto[preco]" value="" />                
            </form>

            <div class="modal-footer">
                               
            </div>
            
            <button class="botao-modal" onclick="cancelarCadastro()">Cancelar</button>
            <button class="botao-modal" onclick="cadastrarProduto()">Gravar</button> 
        </div>
</div>
<?= $this->Html->css('listar') ?>
<?= $this->Html->script('listar') ?>