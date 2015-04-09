<?php

namespace JSRO\Formularios;

use JSRO\ClienteAbstract;

class FormClienteJuridico extends ClienteAbstract
{
        public function formInsertClienteJuridico()
        {
            echo '
            <form role="form" class="form-horizontal">
                <div class="form-group">
                    <label for="nome" class="control-label col-md-2">Nome:</label>
                    <div class="col-md-10">
                        <input type="text" id="nome" name="nome" value="" class="form-control" required="required">
                    </div>
                </div>
                 <div class="form-group">
                    <label for="cnpj" class="control-label col-md-2">Cnpj:</label>
                    <div class="col-md-10">
                        <input type="text" id="cnpj" name="cnpj" value="" class="form-control" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="endereco" class="control-label col-md-2">Endereço:</label>
                    <div class="col-md-10">
                        <input type="text" id="endereco" name="endereco" value="" class="form-control" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label col-md-2">Email:</label>
                    <div class="col-md-10">
                        <input type="text" id="email" name="email" value="" class="form-control" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label col-md-2">Classificação:</label>
                    <div class="col-md-10">
                        <div class="radio">
                            <label>
                                <input type="radio" name="classificacao" value="1">
                                <span class="glyphicon glyphicon-star"></span>
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="classificacao" value="2">
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="classificacao" value="3">
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="classificacao" value="4">
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="classificacao" value="5">
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                            </label>
                        </div>
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

        public function formUpdateClienteJuridico($arg)
        {
            echo '
                <form role="form" class="form-horizontal">
                    <div class="form-group">
                        <label for="nome" class="control-label col-md-2">Nome:</label>
                        <div class="col-md-10">
                            <input type="text" id="nome" name="nome" value="'.$arg["nome"].'" class="form-control" required="required">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="cnpj" class="control-label col-md-2">Cnpj:</label>
                        <div class="col-md-10">
                            <input type="text" id="cnpj" name="cnpj" value="'.$arg["cnpj"].'" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="endereco" class="control-label col-md-2">Endereço:</label>
                        <div class="col-md-10">
                            <input type="text" id="endereco" name="endereco" value="'.$arg["endereco"].'" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label col-md-2">Email:</label>
                        <div class="col-md-10">
                            <input type="text" id="email" name="email" value="'.$arg["email"].'" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label col-md-2">Classificação:</label>
                        <div class="col-md-10">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="classificacao" '.$this->getClassificacaoAtual(1, $arg["classificacao"]).' value="1" required>
                                    <span class="glyphicon glyphicon-star"></span>
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="classificacao" '.$this->getClassificacaoAtual(2, $arg["classificacao"]).' value="2">
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="classificacao" '.$this->getClassificacaoAtual(3, $arg["classificacao"]).' value="3">
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="classificacao" '.$this->getClassificacaoAtual(4, $arg["classificacao"]).' value="4">
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="classificacao" '.$this->getClassificacaoAtual(5, $arg["classificacao"]).' value="5">
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </label>
                            </div>
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