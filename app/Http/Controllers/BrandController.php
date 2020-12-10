<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Brand $brand
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, Brand $brand)
    {
        $brand->name = $request->name;
        if( $brand->save() ){
            try{
                if($request->file('pdfFile')) {
                    $file = $request->file('pdfFile');
                    $filename = time() . '.' . $request->file('pdfFile')->extension();
                    $filePath = public_path() . '/files/uploads/';
                    $file->move($filePath, $filename);
                }
                $data = $request->all();
                $pdf = PDF::loadView('brand.pdf', $data);

                Mail::send('brand.mail', $data, function($message)use($data,$pdf) {
                    $message->to($data["email"], $data["name"])
                        ->subject('Commercial Register')
                        ->attachData($pdf->output(), "agreement.pdf");
                });
                return response()->json(['message'=> 'Your email successfully has been sent'],Response::HTTP_OK);
            }catch(\Exception $exception){
                return response()->json(['message'=>$exception->getMessage()],Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }
        return response()->json(['message'=>'DB Error'],Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
