<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ordem_de_servicos', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('ORC_venda');
            $table->string('cliente');
            $table->string('servico');
            $table->string('end');
            $table->string('fone' , 20);
            $table->string('valor');
            $table->string('pago');
            $table->string('falta');
            $table->date('data_de_recebimento');
            $table->date('data_de_entrega');
            $table->string('hora_de_entrega');
            $table->date('prazo_da_impressao_data')->nullable();
            $table->string('prazo_da_impressao_hora')->nullable();
            $table->string('dia_do_recebimento_do_controle')->nullable();
            $table->string('hora_do_recebimento_do_controle')->nullable();
            $table->boolean('servico_externo')->nullable();
            $table->string('formas_de_pagamento')->nullable();
            $table->string('observacoes_pedido')->nullable();
            $table->string('layout');
            $table->string('embalagem');
            $table->string('observacoes_layout')->nullable();
            $table->string('nome_funcionario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordem_de_servicos');
    }
};
