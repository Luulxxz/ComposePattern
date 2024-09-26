<?php

// Carrega as classes necessárias

include_once 'TExpressopion.class.php';
include_once 'TCriteria.class.php';
include_once 'TFilter.class.php';

// Aqui vemos um exemplo do critério utilizando o operador OR
// A idade deve ser menor que 16 anos e maior que 60 anos

$criteria = new TCCiteria();
$criteria->add(new TFilter('idade', '<', 16), TExpression::OR_OPERATOR);
$criteria->add(new TFilter('idade', '>', 60), TExpression::OR_OPERATOR);

echo $criteria->dump();
echo "<br>\n";

// Aqui vemos um exemplo do critério utilizando o operador lógico AND
// juntamente com os operadores de conjunto IN (dentro do conjunto) e
// NOT IN (fora do conjunto)
// a idade deve estar dentro do conjunto (24, 25, 26) e deve estar fora do conjunto (10)

$criteria = new TCCiteria();
$criteria->add(new TFilter("idade", "IN", array(24, 25, 26)));
$criteria->add(new TFilter("idade", "NOT IN", array(10)));

echo $criteria ->dump();
echo "<br>\n";

// Aqui vemos um exemplo utilizando o operador de comparação LIKE
// o nome deve inciar por "pedro" ou "maria"

$criteria = new TCCiteria();
$criteria->add(new TFilter("nome", "like", 'pedro%'), TExpression::OR_OPERATOR);
$criteria->add(new TFilter("nome", "like", 'maria%'), TExpression::OR_OPERATOR);

echo $criteria->dump();
echo "<br>\n";

// Aqui vemos um exemplo de critério utiliza

$criteria = new TCCiteria();
$criteria->add(new TFilter("telefone", "IS NOT", NULL));
$criteria->add(new TFilter("sexo", "=", 'F'));

echo $criteria->dump();
echo "<br>\n";

$criteria = new TCCiteria();
$criteria->add(new TFilter("UF", "IN", array('RS', 'SC', 'PR')));
$criteria->add(new TFilter("UF", "NOT IN", array('AC', 'PI')));
echo $criteria->dump();
echo "<br>\n";

$criteria1 = new TCCiteria();
$criteria1->add(new TFilter('sexo', '=', 'F'));
$criteria1->add(new TFilter('idade', '>', '18'));

$criteria2 = new TCCiteria();
$criteria2->add(new TFilter('sexo', '=', 'M'));
$criteria2->add(new TFilter('idade', '<', '16'));

$criteria = new TCCiteria();
$criteria->add($criteria1, TExpression::OR_OPERATOR);
$criteria->add($criteria2, TExpression::OR_OPERATOR);

echo $criteria->dump();
echo "<br>\n";
?>