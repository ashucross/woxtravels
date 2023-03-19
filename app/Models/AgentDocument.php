<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentDocument extends Model
{
    use HasFactory;

    protected $guard = 'agent_documents';

	/**
      * The attributes that are mass assignable.
      *
      * @var array
	*/
	protected $fillable = [
        'agentId', 'meta_key', 'Meta_val', 'description'
    ];

}


