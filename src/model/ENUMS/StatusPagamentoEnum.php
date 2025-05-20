<?php

enum StatusPagamentoEnum: string
{
    case PENDENTE = 'pendente';
    case PROCESSANDO = 'processando';
    case APROVADO = 'aprovado';
    case RECUSADO = 'recusado';
    case REEMBOLSADO = 'reembolsado';
}
