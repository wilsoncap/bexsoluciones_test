<?php

namespace App\src\visit\console\comands;

use App\src\visit\services\VisitServices;
use Illuminate\Console\Command;
use function Laravel\Prompts\text;
use App\src\visit\http\request\VisitRequest; // Importa tu Form Request
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request as BaseRequest;

class StoreVisit extends Command
{
    public function __construct(private VisitServices $visitService)
    {
        parent::__construct();
    }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'visit:store';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea una nueva visita en la base de datos.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $name = text('Ingresa el nombre de la visita:', required: true);
            $email = text('Ingresa el correo electrónico:', required: true);
            $latitude = text('Ingresa la latitud:', required: true);
            $longitude = text('Ingresa la longitud:', required: true);

            $data = compact('name', 'email', 'latitude', 'longitude');

            // Crea una instancia del FormRequest directamente con los datos.
            // Esto dispara la validación al instanciarlo.
            $visitRequest = VisitRequest::createFromBase(BaseRequest::create('/', 'POST', $data));
            $visitRequest->setContainer(app())->validateResolved();

            $this->visitService->storeVisit($visitRequest);
            $this->info('Visita creada correctamente');
            return 0;

        } catch (ValidationException $e) {

            foreach ($e->errors() as $field => $messages) {
                foreach ($messages as $msg) {
                    $this->error("❌ $field: $msg");
                }
            }
            return 1;

        } catch (\Throwable $th) {
            $this->error('💥 Error inesperado: ' . $th->getMessage());
            return 1;
        }
    }
}
