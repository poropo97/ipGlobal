<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Payment;

use Illuminate\Http\Request;

class paymentController extends Controller
{
    //
    public function getPayment(Request $request)
    {
      // como el middleware es quien se ocupa de verificar que el pago exista solo tenemos que devolverlo
      return response([
        'payment' => $request->payment
      ],200);
    }

    public function getPaymentHtml(Request $request)
    {
      return view('payment')->with('payment',$request->payment);
    }

    // Crear el pago
    public function postPayment(Request $request)
    {
      // validamos los datos
      $validator = Validator::make(request()->all(), [
        'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        'payed_at' => 'nullable|dateTime'
      ]);
      // error de validación
      if ($validator->fails())
        return response($validator->messages(), 400);

      // creamos el registro a partir del modelo
      $payment = Payment::create($request->all());
      // el usuario será el logeado, en este caso como no habrá sera el user_id = 1, ya por defecto en base de datos
      // $payment->user_id = auth()->user()->id?? 1;

      // normalmente no añadiría jamas lógica de negocio en un modelo, en la mayoria de mis anteriores codigos lo he puesto por exagonal
      $payment->sendSMS();

      return response([
        'message' => "la operación HTTP ha sido exitosa y el registro del pago fue creado correctamente."
      ],200);

    }
}
