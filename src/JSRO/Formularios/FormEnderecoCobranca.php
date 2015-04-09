<?php

namespace JSRO\Formularios;

use JSRO\ClienteAbstract;

class FormEnderecoCobranca extends ClienteAbstract
{

    public function formInsertEnderecoCobranca()
    {
        echo '
        <form role="form" class="form-horizontal">
            <div class="form-group">
                <label for="endereco" class="control-label col-md-2">Endereço para cobrança:</label>
                <div class="col-md-10">
                    <input type="text" id="endereco" name="endereco" value="" class="form-control" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="button" class="btn btn-primary" value="Inserir">
                </div>
            </div>
        </form>
        ';
    }

    public function formUpdateEnderecoCobranca($arg)
    {
        echo '
            <form role="form" class="form-horizontal">
                <div class="form-group">
                    <label for="endereco" class="control-label col-md-2">Endereço para cobrança:</label>
                    <div class="col-md-10">
                        <input type="text" id="endereco" name="endereco" value="'.$arg["enderecoCobranca"].'" class="form-control" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="button" class="btn btn-primary" value="Atualizar">
                    </div>
                </div>
            </form>
            ';
    }
}