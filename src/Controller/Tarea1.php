<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Routing\Annotation\Route;

class Tarea1
{
    /**
     * @Route ("/calculadora/{operador1}/{operador2}", name="calculadora")
     *
     */

    public function calculadora($operador1,$operador2){


        $resultadoResta = $operador1-$operador2;

        $resultadoSuma = $operador1+$operador2;

        $resultadoMultiplicacion = $operador1*$operador2;

        $resultadoDivision = $operador1/$operador2;

        $resultadoModulo = $operador1%$operador2;


        return new Response("<html><body>RESTA= ". $resultadoResta ."<br>SUMA= ".$resultadoSuma ."<br>Multiplicación= ".$resultadoMultiplicacion."<br>Division= ".$resultadoDivision."<br>Modulo= ".$resultadoModulo."</body></html>");
    }

    /**
     * @Route ("/factorial/{operador1}", name="factorial")
     *
     */

    public function factorial($operador1 = 1){
        if ($operador1 < 1) {
            return new Response("<html><body>Error:El número no puede ser negativo</body></html>");

        } elseif (!is_numeric($operador1)) {
            return new Response("<html><body>Error: Debe de ser un número</body></html>");
        }
        $factorial = 1;
        for ($i = 1; $i <= $operador1; $i++) {
            $factorial = $factorial * $i;
        }
        return new Response("<html><body>El factorial de ${operador1} es $factorial</body></html>");
    }

    /**
     * @Route ("/aleatorio", name="aleatorio")
     *
     */

    public function aleatorio(){
        $random = rand(1,100);
        if($random<=50){
            return new Response("<html><body>El número ${random} es menor o igual a 50</body></html>");
        }else{
            return new Response("<html><body>El número ${random} es mayor a 50</body></html>");
        }
    }

    /**
     * @Route("/areatriangulo/{base}/{altura}", name="areatriangulo")
     *
     */

    function areatriangulo($base = 1, $altura = 1){
        if ($base < 1 || $altura < 1 || !is_numeric($base) || !is_numeric($altura)) {
            return new Response("<html><body> Tanto la base como la altura no pueden ser negativas ni una letra </body></html>");
        }
        $area = ($base * $altura) / 2;
        return new Response("<html><body>El area del triangulo es de: ${area}</body></html>");
    }

    /**
     * @Route("/palindromo/{palabra}", name="palindromo")
     *
     *
     */

    function palindromo($palabra = ""){
        if (empty($palabra)) {
            return new Response("<html><body>Debe de ingresar una palabra</body></html>");
        }
        $palabra = strtolower($palabra);
        $invertir = strrev($palabra);
        if ($palabra === $invertir) {

            return new Response("<html><body>La palabra ${palabra} es un palindromo</body></html>");

        } else {
            return new Response("<html><body>La palabra ${palabra} no es un palindromo</body></html>");
        }
    }

    /**
     * @Route("/sumatorio", name="sumatorio")
     *
     *
     */

    function sumatorio(){

        $rand = rand(1,20);
        $suma = 0;
        for($i=0;$i<$rand;$i++){
            $suma=$suma+$i;
        }

        return new Response("<html><body>El sumatorio de ${rand} es de: ${suma}</body></html>");

    }

    /**
     * @Route("/ecuacion/{a}/{b}/{c}", name="ecuacion")
     */

    function ecuacion($a = 1, $b = 1, $c = 1){

            $numero = $b * $b - 4 * $a * $c;
            if ($numero > 0) {
                $x1 = (-$b + sqrt($numero)) / (2 * $a);
                $x2 = (-$b - sqrt($numero)) / (2 * $a);
                return new Response("<html><body>Resultado ecuación: <br> x1= ${x1} <br> x2= ${x2}</body></html>");
            } else {
                if ($numero == 0) {
                    $x1 = -$b / (2 * $a);
                    return new Response("<html><body>Ecuación x1 = ${x1}</body></html>");
                } else {
                    return new Response("<html><body>La ecuación no se puede resolver.</body></html>");
                }
            }
    }

    /**
     * @Route("/esPrimo/{numero}", name="esPrimo")
     */

    function esPrimo($numero = 1){

        if ($numero < 1 || !is_numeric($numero)) {
            return new Response("<html><body>Introduzca un número positivo mayor a 0</body></html>");
        }

        $esPrimo = true;
        for ($i = 2; $i < $numero; $i++) {
            if ($numero % $i == 0) {
                $esPrimo = false;
                break;
            }
        }

        if($esPrimo===true){
            return new Response("<html><body>$numero SI es primo</body></html>");
        }else{
            return new Response("<html><body>$numero NO es primo</body></html>");
        }
    }




}