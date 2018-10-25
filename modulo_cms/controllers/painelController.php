<?php
class painelController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        VerificarLogin();
    }
    
    public function index()
    {   
        $dados = array();
        
        $p = new Paginas();
        $dados['paginas'] = $p->getPaginas();
        
        $this->loadTemplateInPainel('paineis/home',$dados);
//        $this->loadTemplate('pagina',$dados);
    }
    
    public function menus()
    {
        $dados = array();
        
        $m = new Menu();
        $dados['menus'] = $m->getItensMenu();
        
        $this->loadTemplateInPainel('paineis/menus',$dados);
    }
    
    public function menus_excluir($id = "")
    {
        $dados = array();
        
        if ( ! empty($id)) {
            $id = addslashes($id);
            
            $m = new Menu();
            $m->excluir($id);
            
            header("Location: ".BASE_URL."painel/menus");
        }
        
        $this->loadTemplateInPainel('paineis/menus',$dados);
    }
    
    public function menus_editar($id = "")
    {
        $dados = array();
        
        if ( ! empty($id)) {
            $id = addslashes($id);
            $m = new Menu();
            
            $menu_post = filter_input_array(INPUT_POST);
            if (isset($menu_post['nome']) && ( ! empty($menu_post['nome']))) {
                $nome = addslashes($menu_post['nome']);
                $url = addslashes($menu_post['url']);
                
                $m->atualizar($id,$nome,$url);
                header("Location: ".BASE_URL."painel/menus");
                exit;
            }
            $dados['menu'] = $m->getMenu($id);
            
            $this->loadTemplateInPainel('paineis/menus_editar',$dados);
        }
        else {
            $this->loadTemplateInPainel('paineis/menus',$dados);
        }
    }
    
    public function menus_adicionar()
    {
        $dados = array();
        
        $menu_post = filter_input_array(INPUT_POST);
        if (isset($menu_post['nome']) && ( ! empty($menu_post['nome']))) {
            $nome = addslashes($menu_post['nome']);
            $url = addslashes($menu_post['url']);
            
            $m = new Menu();
            $m->adicionar($nome,$url);
            
            header("Location: ".BASE_URL."painel/menus");
            exit;
        }
        
        $this->loadTemplateinPainel("paineis/menus_adicionar",$dados);
    }
    
    public function paginas_excluir($id = "")
    {
        if ( ! empty($id)) {
            $id = addslashes($id);
            
            $p = new Paginas();
            $p->excluir($id);
        }
        
        header("Location: ".BASE_URL."painel");
    }
    
    public function paginas_editar($id = "")
    {
        $dados = array();
        
        if ( ! empty($id)) {
            $id = addslashes($id);
            $p = new Paginas();
            
            $pagina_post = filter_input_array(INPUT_POST);
            if (isset($pagina_post['titulo']) && ( ! empty($pagina_post['titulo']))) {
                $url = addslashes($pagina_post['url']);
                $titulo = utf8_decode(addslashes($pagina_post['titulo']));
                $corpo = utf8_decode(addslashes($pagina_post['corpo']));
                
                $p->atualizar($id,$url,$titulo,$corpo);
                
                header("Location: ".BASE_URL."painel");
                exit;
            }
            else {
                $dados['pagina'] = $p->getPaginaPorId($id);
                $this->loadTemplateInPainel("paineis/paginas_editar",$dados);
            }
        }
        else {
            header("Location: ".BASE_URL."painel");
        }
    }
    
    public function paginas_adicionar()
    {
        $dados = array();
        
        $pagina_post = filter_input_array(INPUT_POST);
        if (isset($pagina_post['url']) && ( ! empty($pagina_post['url']))) {
            $url = addslashes($pagina_post['url']);
            $titulo = addslashes($pagina_post['titulo']);
            $corpo = addslashes($pagina_post['corpo']);
            
            $p = new Paginas();
            $p->adicionar($url,$titulo,$corpo);
            
            if (isset($pagina_post['menu_add'])
            && ( ! empty($pagina_post['menu_add']))) {
                $m = new Menu();
                $m->adicionar($titulo,$url);
            }
            
            header("Location: ".BASE_URL."painel");
        }
        else {
            $this->loadTemplateInPainel("paineis/paginas_adicionar",$dados);
        }
    }
    
    public function config()
    {
        $dados = array();
        
        $config_form = filter_input_array(INPUT_POST);
        if (isset($config_form['site_titulo'])
        && ( ! empty($config_form['site_titulo']))) {
            $site_titulo = addslashes($config_form['site_titulo']);
            $site_template = addslashes($config_form['site_template']);
            $home_welcome = addslashes($config_form['home_welcome']);
            $home_banner = $_FILES['home_banner'];
            
            $c = new Config();
            $c->definirPropriedade('site_titulo', $site_titulo);
            $c->definirPropriedade('site_template', $site_template);
            $c->definirPropriedade('home_welcome', $home_welcome);
            $c->definirPropriedade('home_banner', $home_banner);
            
            header("Location: ".BASE_URL."painel/config");
        }
        
        $this->loadTemplateInPainel("paineis/config",$dados);
    }
}
?>