<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Envato\Tools;
use Carbon\Carbon;
use DB;
use App\shopping;
use Illuminate\Support\Facades\Storage;
class ShoppingClienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('promotions.client.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      return view('promotions.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //dd($request->factXML->getClientOriginalName());
          //$request->factPDF->store('logos');
          //$guessExtension = $request->file('your_input_name')->guessExtension();

          $request->validate([
            'factXML' => 'required|min:4',
            'factPDF'=>'required|mimes:pdf',
            'referenceFac'=>'required|unique:shoppings',
            'fechaEmision'=>'required'
          ]);

          date_default_timezone_set('America/Mexico_City');

          $user_id =\Auth::User()->id;
          $dir_user = Tools::getUserDirFActura();
          $filename=date("d-m-Y_H-i-s");
          if ($isExistDir= !is_dir($dir_user))
            $createDirSussess = mkdir($dir_user, 0755, true);

            $request->factXML->storeAs('tmp_valid_xml',$request->factXML->getClientOriginalName());

           $uploadedFactXML = $request->file('factXML');
           $uploadedFactPDF = $request->file('factPDF');
           //dd($uploadedFactXML->getClientOriginalExtension());
           //dd($request->path());
           if ($uploadedFactXML->getClientOriginalExtension() != "xml") {
             // code...
             $errors = array( 'factXML' =>'Se necesita la factura con la extencion xml');
             return redirect()->back()->withErrors($errors);
           }

           if ($uploadedFactXML->isValid() &&  $uploadedFactPDF->isValid()) {
               $uploadedFactXML->move($dir_user, $filename.".xml");
               $uploadedFactPDF->move($dir_user, $filename.".pdf");
           }

        $cfdi =  Tools::loadXMLFactura($uploadedFactXML);
        if ($cfdi->validateXMLSchema()) {
          $cfdi->getXMLData();
          if ($cfdi->getFecha() == Carbon::parse($request['fechaEmision'])->format('Y-m-d')) {
            if ($cfdi->getFolio() == $request['referenceFac']) {
              //  si todod esta bien se almacenara la informacion

              DB::transaction(function () use ($request,$user_id,$cfdi,$filename) {

              $shopping =shopping::create([
                'user_id' => $user_id,
                'referenceFac'=>$request['referenceFac'],
                'rode'=>((float)$cfdi->getTotal()),
                'shopping_date'=>Carbon::parse($request['fechaEmision'])->format('Y-m-d'),
                'url_fact'=>$filename
              ]);

                $shopping->save();
              });
              return redirect()->route('home');
            }else {
              // el folio  no es igual al presentado en la factura
              $errors = array( 'folio' =>'El folio ingresado no conincide con el de la factura');
              return redirect()->back()->withErrors($errors);
            }
          }else {
            //  la fecha ingresada es diferente al presentado en la factura
            $errors = array( 'fechaEmision' =>'La fecha ingresada es diferente al presentado en la factura.');
            return redirect()->back()->withErrors($errors);
          }
        }else {
          //dd($cfdi->getErrorMessage());
          $errors = array( 'SAT' =>$cfdi->getErrorMessage());
          unlink(storage_path()."/app/tmp_valid_xml/".$request->factXML->getClientOriginalName());
          return redirect()->back()->withErrors($errors);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return " vamos  ver compras registradas";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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

    public function shoppinAll(){
    $searchoption = json_encode(shopping::all()->sortBy('referenceFac', SORT_NATURAL | SORT_FLAG_CASE)->pluck('', 'referenceFac'));
    $shopping = shopping::where('user_id',\Auth::User()->id)->paginate(9);
      return view('shoppingCLI.index',compact('shopping', 'searchoption'));
    }
}
