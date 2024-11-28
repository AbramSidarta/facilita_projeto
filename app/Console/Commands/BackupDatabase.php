<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class BackupDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Realiza o backup do banco de dados.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Nome do arquivo de backup
        $backupFileName = 'backup_' . now()->format('Y_m_d_H_i_s') . '.sql';

        // Caminho para salvar o backup
        $backupPath = storage_path('app/backups/' . $backupFileName);

        // Criação do diretório, caso não exista
        Storage::makeDirectory('backups');

        // Comando para realizar o dump do banco
        $databaseConfig = config('database.connections.mysql');
        $command = sprintf(
            'mysqldump --user=%s --password=%s --host=%s %s > %s',
            $databaseConfig['username'],
            $databaseConfig['password'],
            $databaseConfig['host'],
            $databaseConfig['database'],
            $backupPath
        );

        // Executa o comando
        $result = null;
        $output = [];
        exec($command, $output, $result);

        // Verifica se o comando foi bem-sucedido
        if ($result === 0) {
            $this->info("Backup do banco de dados criado com sucesso: {$backupPath}");
        } else {
            $this->error("Erro ao criar o backup. Verifique o comando mysqldump.");
        }
    }
}
