<?php
    class Factory
    {
        public static function Elegirvehiculo($tipo)
        {
            switch ($tipo)
            {
                case 'Auto':
                    return new Auto();
                    break;
                case 'Camioneta':
                    return new Camioneta();
                    break;

                case 'Tracto camion':
                    return new Tractocamion();
                    break;
            }
        }
    }
?>