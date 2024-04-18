<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\StoreConvertRequest;

class ConvertController extends Controller
{
    public function convertForm()
    {
        return view('pages.convert-form');
    }

    public function storeConvertForm(StoreConvertRequest $request)
    {
        $requestDTO = $request->validated();
        $requestDTO['list_pewaris'] = \json_decode($requestDTO['list_pewaris'], true);

        $pdf = Pdf::loadView('pdf.pernyataan-ahli-waris', [
            'data' => $requestDTO
        ]);
        return $pdf->stream('surat_pernyataan_ahli_waris.pdf');
    }
}
