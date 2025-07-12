<?php

namespace App\src\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use App\src\Product\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Prism\Prism\Enums\Provider;
use Prism\Prism\Prism;
use Prism\Prism\Exceptions\PrismException;
use Throwable;

class GenerateProductReviewController extends Controller
{
    public function __invoke(Request $request)
    {
        try {
             // Recibir el producto que se requiere
            $product = Product::findOrFail($request->product_id);
                // Generar reseña del producto
                // Usar Prism para generar una reseña persuasiva
                // Basado en los datos del producto
                // Usar el modelo de lenguaje Groq llama-3.1-8b-instant

                // Crear un prompt para la generación de la reseña

            $prompt = <<<EOT
                Eres un analista experto en ecommerce. Basado en estos datos genera una reseña persuasiva:
                    - Producto: {$product->name}
                    - Categoría: {$product->description}
                    - Precio: {$product->price}
                    - Calificación promedio: {$product->rating} / 5
                    - Total vendidos: {$product->total_sold}
                    - Stock restante: {$product->stock}
                    Si el stock es bajo, genera sentido de urgencia. Sé honesto, util y atractivo para el ccomprador
            EOT;

                $review = Prism::text()
                    ->using(Provider::Groq, 'llama-3.1-8b-instant')
                    ->withPrompt($prompt)
                    ->asText();



                return response()->json([
                    'review' => $review->text
                ]);
                } catch (PrismException $e) {
                    Log::error('Text generation failed:', ['error' => $e->getMessage()]);
                } catch (Throwable $e) {
                    Log::error('Generic error:', ['error' => $e->getMessage()]);
                }
      
       
    }
}
