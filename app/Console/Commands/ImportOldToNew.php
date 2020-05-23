<?php

namespace App\Console\Commands;

use App\Exam;
use App\Professor;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportOldToNew extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:old';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Faz a cópia do banco de dados do infoprovas original para o novo.';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $conn_old = DB::connection('infoprovas_old');
        $provas = $conn_old->select('SELECT * FROM prova');
        foreach($provas as $prova){
            $params = [
                    'id'=>$prova->id,
                    'subject_id' => $prova->idDisciplina,
                    'professor_id' => $prova->idProfessor,
                    'exam_type_id' => $prova->idTipoProva,
                    'semester' => $prova->ano . "." . $prova->periodo,
                    'google_id' => "infoprovas_antigo",
                    'created_at' => $prova->dataEnviada,
                    'file' => 'to_be_filled',
                ];
            $new_prova = (new Exam())->create($params);
            echo $new_prova->id . "\n";
        }
    }

}
