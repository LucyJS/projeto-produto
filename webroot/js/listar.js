

document.getElementById("cadastrar").addEventListener("click", abrirModalCadastro);
document.getElementById("modal-fechar").addEventListener("click", fecharModalCadastro);
document.getElementById("excluir").addEventListener("click", excluirProdutoSelecionado);



function cadastrarProduto(){
    var cadastroComSucesso = true;
    var mensagemErro = "Não foi possível inserir!";
    if(cadastroComSucesso) {
        alert("Produto inserido com sucesso!");
        fecharModalCadastro();
    } else {
        alert(mensagemErro); 
    }
}

function excluirProdutoSelecionado(){
    var produtoSelecionado = getRadioValue("produtoSelecionado");

    if(produtoSelecionado == undefined){
        alert("Selecione um produto para excluir!");
        return;
    }

    if(confirm("Deseja excluir?")){
    
        // fazer uma requisição ajax no servidor para chamar o controler/action produtos/deletar-produto
        var urlExclusao = "/produtos/deletar-produto/" + produtoSelecionado;

        // fazer requisição no servidor
        var req = new XMLHttpRequest();
        req.onreadystatechange = function(){
            if(this.readyState == 4){       
                alert("Excluindo produto " + produtoSelecionado);
            }
        }
        req.open('GET', urlExclusao, true);
        req.send();

    } 
}

function abrirModalCadastro(){ 
    var modal = getModal();
    modal.style.display = "block";
}

function fecharModalCadastro(){ 
    var modal = getModal();
    modal.style.display = "none";
}

function getModal(){
    var modal = document.getElementById("modalCadastro");
    return modal;
}

function getRadioValue(field) {
    var radios = document.getElementsByName(field);    
    for (var i = 0, length = radios.length; i < length; i++)
    {
        if (radios[i].checked)
        {   
            return radios[i].value;
            // only one radio can be logically checked, don't check the rest
            break;
        }
    }
    return undefined;
}
