<?php

class MensagensControlador extends ControladorBase{
    private $usuarioAcessoBD;
    private $dados;
    
    public function __construct() 
    {
        $this->usuarioAcessoBD = $this->carregarAcessoBD("usuarioAcessoBD");
        $this->dados = array();
        
        parent::__construct();
        $this->usuarioAcessoBD->codigo = $this->getUsuarioLogado();
        $this->dados["usuario"] =  $this->usuarioAcessoBD->Listar();
        $grupos = $this->carregarAcessoBD("grupoAcessoBD");
        
        $this->dados["grupos"] = $grupos->ListarGruposUsuario($this->dados["usuario"]->getCodigo()); 
    }

    public function listar()
    {
        $this->carregarView('layout/topo', $this->dados);
        $this->carregarView('layout/menu', $this->dados);
        $this->carregarView('mensagens/listar', $this->dados);
        $this->carregarView('layout/rodape');
    }

    public function conversas()
    {
        $this->carregarView('layout/topo', $this->dados);
        $this->carregarView('layout/menu', $this->dados);
        $this->carregarView('mensagens/conversas', $this->dados);
        $this->carregarView('layout/rodape');
    }
    
}
