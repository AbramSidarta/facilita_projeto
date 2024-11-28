<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\OrdemDeServico;
use Carbon\Carbon;

class DeleteOldEntregues extends Command
{
    // Nome e descrição do comando
    protected $signature = 'ordens:delete-old-entregues';
    protected $description = 'Apaga ordens de serviço com status "Entregue" com mais de 6 meses';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Define a data limite (6 meses atrás)
        $thresholdDate = Carbon::now()->subMonths(6);

        // Busca as ordens antigas
        $oldOrders = OrdemDeServico::where('status', 'Entregue')
            ->where('created_at', '<', $thresholdDate)
            ->get();

        // Conta e deleta as ordens encontradas
        $count = $oldOrders->count();
        if ($count > 0) {
            OrdemDeServico::where('status', 'Entregue')
                ->where('created_at', '<', $thresholdDate)
                ->delete();

            $this->info("{$count} ordens antigas com status 'Entregue' foram apagadas.");
        } else {
            $this->info('Nenhuma ordem antiga encontrada.');
        }
    }
}
