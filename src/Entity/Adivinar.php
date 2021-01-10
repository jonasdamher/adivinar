<?php
// src/AppBundle/Entity/Adivinar.php
namespace App\Entity;

class Adivinar
{
    protected ?int $valor = null;

    private int $min = 1;
    private int $max = 10000000000;
    private int $maxDividido = 0;

    public function __construct()
    {
        $this->maxDividido = $this->dividirNumMax($this->max);
    }

    public function getMax(): int
    {
        return $this->max;
    }

    public function setMax(int $max): void
    {
        $this->max = $max;
    }

    public function getValor(): int
    {
        return $this->valor;
    }

    public function setValor(int $numero): void
    {
        $this->valor = $numero;
    }

    private function dividirNumMax($numero)
    {
        return ceil($numero / 20);
    }

    private function hallarRango($desde, $hasta)
    {
        if ($this->max <= $hasta) {
            return false;
        }

        if ($this->valor >= $desde && $this->valor <= $hasta) {
            return [$desde, $hasta];
        }

        $desde = $hasta + 1;
        $hasta += $this->maxDividido;
        return $this->hallarRango($desde, $hasta);
    }

    public function numero()
    {
        $rango = $this->hallarRango(
            $this->min,
            $this->maxDividido
        );
 
        if ($this->min == $this->valor) {
            return $this->min;
        }

        if ($this->max == $this->valor) {
            return $this->max;
        }

        if (!$rango) {
            for ($i = $this->min; $i <= $this->max; $i++) {
                if ($i == $this->valor) {
                    return $i;
                }
            }
        }

        $this->min = $rango[0];
        $this->max = $rango[1];

        if ($this->valor == $this->min) {
            return  $this->min;
        }

        if ($this->valor == $this->max) {
            return  $this->max;
        }

        $this->maxDividido = $this->dividirNumMax($this->max);

        return $this->numero();
    }
}
