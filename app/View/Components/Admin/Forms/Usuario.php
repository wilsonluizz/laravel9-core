<?php

namespace App\View\Components\Admin\Forms;

use Illuminate\View\Component;

class Usuario extends Component
{
    /**
     * Create a new component instance.
     * @return void
     */

    public $type;
    public $usuario;
    public $perfis;


    public function __construct($type, $usuario = null, $perfis = null)
    {
        
        /**
         * Tipo de formulário: Criar ou editar
         * @var string 'create' ou 'edit'
         */
        $this->type = $type;

        /**
         * Por definição, no construtor é NULL porque não é variável obrigatória (para novos usuários)
         * @var object
         */
        $this->usuario = $usuario;
        $this->perfis = $perfis;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.forms.usuario');
    }
}
