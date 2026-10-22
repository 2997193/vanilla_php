<?php
class Ciclo
{
    public const GRADO_MEDIO = 'Medio';
    public const GRADO_SUPERIOR = 'Superior';

    public function __construct(
        public readonly string $codCiclo,
        public readonly string $nombre,
        public readonly string $grado,
    ) {
    }

    public function titulacion(): string
    {
        return $this->grado === self::GRADO_SUPERIOR ? 'Técnico Superior' : 'Técnico';
    }

    public function getNombre(): string
    {
        return strtoupper($this->nombre);
    }
}

$daw = new Ciclo('DAW', 'Desarrollo de Aplicaciones Web', Ciclo::GRADO_SUPERIOR
);

echo 'El ciclo ' . $daw->getNombre() . " tiene la titulacion de " . $daw->titulacion(). "\n";