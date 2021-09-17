<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Imports\ProductsImport;
use Excel;
use Log;
use DB;

class ImportProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import CSV products data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::beginTransaction();
        try{
            Log::info("Iniciando la importación de productos...");

            Excel::import(new ProductsImport, storage_path('app/data/example-data.csv'));

            Log::info("Se ha importado correctamente todos los datos");
        }catch(\Exception $e){
            DB::rollback();
            Log::error("Ha habido un error al importar los datos: ".$e->getMessage());
        }
        DB::commit();
    }
}
