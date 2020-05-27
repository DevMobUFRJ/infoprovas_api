<?php

namespace App\Console\Commands;

use App\Exam;
use App\Professor;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MoveOldFilesToNewFolder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:old_files';

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
        $exams = Exam::all();
        foreach($exams as $exam){
            // Provas antigas devem estar na pasta storage/app/provas
            $old_file_path = 'provas/' . $exam->id . ".pdf";
            $new_file_path = Exam::generate_file_path($exam);
            if(!$exam->update(['file' => $new_file_path])){
                echo "ERRO atualizando prova no Banco de dados. id: " . $exam->id;
            }

            try{
                Storage::move($old_file_path, $new_file_path);
                echo $exam->id . "\n";
            } catch (\Exception $e){
                echo "Erro ao mover arquivo da prova id: " . $exam->id;
            }
        }
    }

}
