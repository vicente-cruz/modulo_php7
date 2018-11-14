<?php
class homeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $dados = array();
        
        $produtos = new Products();
        $categorias = new Categories();
        
        $limit = 3;
        $p_filter = filter_input(INPUT_GET, 'p');
        $currentPage = ( ! empty($p_filter) ? $p_filter : 1 );
        $offset = ($currentPage * $limit) - $limit;
        
        $dados['produtos'] = $produtos->buscarProdutos($offset,$limit);
        $dados['totalItens'] = $produtos->buscarNumeroTotal();
        $dados['totalPaginas'] = ceil($dados['totalItens']/$limit);
        $dados['paginaAtual'] = $currentPage;
        
        $dados['categorias'] = $categorias->buscarCategorias();
        
        $this->loadTemplate('home',$dados);
    }
}
?>