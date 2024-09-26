<?php

/* 
* ClasseTFilter
* Essa classe provê a interface para definição de filtros de seleção
*/

class TFilter extends TExpression{
    private $variable; // Variável
    private $operator; // Operador
    private $value; // Valor

    /* 
    * Método __construct()
    * Instância um novo filtro
    * @param $variable = variavel
    * @param $operator = operador (>,<)
    * @param $variable = valor a ser comparado
    */

    public function __construct($variable, $operator, $value){
        $this->variable = $variable;
        $this->operator = $operator;
        $this->value = $value;

        // Transforma o valor de acordo com certas regras
        // Antes de atribuir a propriedade $this -> value

        $this -> value = $this -> transform($value);
    }

    /*
    * Método Transform()
    * Recebe um valor e faz as modificações necessárias
    * Para ele ser implementado pelo banco de dados
    * Podendo ser integer/string/boolean ou array
    * @param $value = valor a ser transformado
    */

    private function transform($value){
        // Caso seja um array
        if(is_array($value)){
           
            // Percorre os valores
            foreach($value as $x){
                
                // Se for inteiro
                if(is_integer($x)){
                    $foo[] = $x;
                }

                // Se for string adiciona aspas
                else if(is_string($x)){
                    $foo[] = "'$x'";
                }    
            }

            // Converte o array em string separada por ","
            $result = '('.implode(',', $foo).')';

        }
        // Caso seja uma string
        else if(is_string($value)){
            
            // Adiciona aspas
            $result = "$value";

        }

        // Caso seja um valor nulo
        else if(is_null($value)){

            // Armazena nulo
            $result = 'NULL';

        }

        // Caso seja um booleano
        else if(is_bool($value)){

            // Armazena TRUE ou FALSE
            $result = $value ? 'true' : 'false';
            
        }

        else{
            $result = $value;
        }

        // Retorna o valor
        return $result;
    }

    /* Método dump()
    * Retorna o filtro em forma de expressão
    */

    public function dump(){
        // Concatena a expressão
        return "{$this -> variable} {$this -> operator} {$this -> value}";
    }
}
?>