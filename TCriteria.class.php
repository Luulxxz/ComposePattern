<?php

/*
* Classe TCriteria
* Esta classe prove uma interface utilizada para definição de critérios
*/

class TCriteria extends TExpression{
    private $expressions; // Armazena a lista de instruções
    private $operators; // Armazena a lista de operadores
    private $properties; // Propriedades do critério

    // Método contstrutor
    function __construct(){
        $this->expressions = array();
        $this->properties = array();
        $this->operators = array();
    }

    /*
    * Método add
    * Adiciona uma expressão ao critério
    * @param $expressions = expressão (objeto TExpression)
    * @param $operator = operador lógico de comparação
    */

    public function add(TExpression $expression, $operator = self::AND_OPERATOR){
       
        // Na primeira vez, não precisamos de operador lógico para concatenar
        if(empty($this->expressions)){
            $operator = NULL;
        }

        // Agrega o resultado da expressão a lista de expressões
        $this->expressions[] = $expression;
        $this->operators[] = $operator;
    }

    /*
    * Método dump()
    * Retorna a expressão final
    */

    public function dump(){

        // Concatena a lista de expressões
        if(count($this->expressions) > 0){
            $result = '';
            foreach($this->expressions as $i => $expression){
                $operator = $this -> operators[$i];

                // Concatena o operadot com as respectiva expressão
                $result .= $operator. $expression->dump(). '';
            }

            $result = trim($result);
            return "({$result})";
        }
    }

    /*
    * Método SetPropriety()
    * Define o valor de uma propriedade
    * @param $propriety = propriedade
    * @param $value = valor
    */

    public function SetProperty(){
        if(isset($value)){
            $this -> properties[$property] = $value;
        }

        else{
            $this -> properties[$property] = NULL;
        }
    }

    /*
    * Método GetPropriety()
    * Retorna o valor de uma propriedade
    * @param $propriety = propriedade
    */

    public function getProperty($property){
      if(isset($this->properties[$property])){
        return $this->properties[$property];
      }
    }
}
?>