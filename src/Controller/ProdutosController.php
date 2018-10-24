<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

use App\Controller\AppController;
use App\Model\Entity\Produto;
use Cake\ORM\TableRegistry;




class ProdutosController extends AppController
{
   
    public function listar()
    {   
        $produtos = TableRegistry::get('Produtos');
        $query = $produtos->find();
        $this->set('listaProdutos', $query);

        $this->render();         
    }


    
    public function cadastrar()
    {   

        $produtos = TableRegistry::get('Produtos');
        $query = $produtos->find();
        
        $this->set('listaProdutos', $query);
        $this->render();        
    }

    public function cadastrarBanco()
    {   


        $this->render();        
    }

    public function editar()
    {   


        $this->render();        
    }

    public function editarBanco()
    {   



        $this->render();        
    }

    public function deletarProduto($codigo)
    {   
        $produtos = TableRegistry::get('Produtos');
        
      
        $temProduto = $produtos->exists(array( "codigo" => $codigo ));

        if($temProduto){
            $produto = $produtos->get(1);
            $result = $produtos->delete($produto);            
            if($result){
                $resposta = array(
                    "error" => false,
                    "message" => "Produto excluido com sucesso!"
                );
            } else {
                $resposta = array(
                    "error" => true,
                    "message" => "Não foi possível apagar o produto. Porque ele não existe."
                );
            }
        } else {
            $resposta = array(
                "error" => true,
                "message" => "Registro não existe no sistema."
            );
        }

        echo json_encode($resposta);
        $this->render('/Element/ajaxreturn',"ajax");     
    }
}
