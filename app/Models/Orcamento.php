<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
    use HasFactory;

    /**
     * Desativa a criação dos campos automáticos de timestamps.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
	 * Atributos da tabela de orçamentos no banco de dados que o app
     * pode preencher.
	 *
	 * @var array
	 */
	protected $fillable = [
        'id', 'cliente', 'data', 'hora', 'vendedor', 'valor_orcado', 'descricao',
	];
}