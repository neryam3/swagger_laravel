<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreSuperheroeRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Superheroe;

/** @OA\Info(title="API Super Heroes", version="1.0")*/

/** @OA\Server(url="http://127.0.0.1:8000")*/

class SuperheroeController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/superheroes",
    *     summary="Mostrar Super Heroes",
    *     @OA\Response(
    *         response=200,
    *         description="Ok"
    *     ),
    *     @OA\Response(
    *         response=401,
    *         description="Unauthorized"
    *     ),
    *    @OA\Response(
    *         response=500,
    *         description="Internal Server Error"
    *     )
    * )
    */
    public function index()
    {
        try {
            $superheroes = Superheroe::all();
            return response($superheroes, 200)->header('Content-Type', 'application/json');

        } catch (\Exception $error) {
               return response()->json([
                'error' => $error   
               ]);
         }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /** @OA\POST(
    *     path="/api/superheroes",
    *     summary="Registrar nuevo super heroes",
    *     @OA\Response(
    *         response=200,
    *         description="Ok"
    *     ),
    *     @OA\Response(
    *         response=400,
    *         description="Bad Request"
    *     ),
    *     @OA\Response(
    *         response=401,
    *         description="Unauthorized"
    *     ),
    *    @OA\Response(
    *         response=500,
    *         description="Internal Server Error"
    *     )
    * )
    */
    public function store(Request $request)
    {
       try {
        $request->validate([
            'name' => 'required|max:255',
            'producer' => 'required|max:255',
        ]);
        $superheroe = Superheroe::create($request->all());
        return response($superheroe, 200)->header('Content-Type', 'application/json');
       } catch (\Exception $error) {
           return response()->json([
            'error' => $error   
           ]);
       }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Superheroe  $superheroe
     * @return \Illuminate\Http\Response
     */

    /** @OA\Get(
    *     path="/api/superheroes/{superheroe}",
    *     summary="Mostrar un super heroe",
    *     @OA\Response(
    *         response=200,
    *         description="Ok"
    *     ),
    *     @OA\Response(
    *         response=400,
    *         description="Bad Request"
    *     ),
    *     @OA\Response(
    *         response=401,
    *         description="Unauthorized"
    *     ),
    *    @OA\Response(
    *         response=500,
    *         description="Internal Server Error"
    *     )
    * )
    */
    public function show($id)
    {
        try {
            $superheroe = Superheroe::find($id);
            return response($superheroe, 200)->header('Content-Type', 'application/json');
        } catch (\Exception $error) {
             return response()->json([
              'error' => $error   
             ]);
         }
        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Superheroe  $superheroe
     * @return \Illuminate\Http\Response
     */


     /**
     * Display the specified resource.
     *
     * @param  \App\Superheroe  $superheroe
     * @return \Illuminate\Http\Response
     */

    /** @OA\PUT(
    *     path="/api/superheroes/{superheroe}",
    *     summary="Modificar un super heroe",
    *     @OA\Response(
    *         response=200,
    *         description="Se modificó correctamente"
    *     ),
    *     @OA\Response(
    *         response=400,
    *         description="Bad Request"
    *     ),
    *     @OA\Response(
    *         response=401,
    *         description="Unauthorized"
    *     ),
    *     @OA\Response(
    *         response=409,
    *         description="Conflict"
    *     )
    * )
    */

    public function update(Request $request, $id)
    {

        try {
            $request->validate([
                'name' => 'required|max:255',
                'producer' => 'required|max:255',
            ]);
            $superheroe = Superheroe::find($id);
            $superheroe->name = $request->name;
            $superheroe->producer = $request->producer;
            $superheroe->save();
            return response($superheroe, 200)->header('Content-Type', 'application/json');
         } catch (\Exception $error) {
             return response()->json([
              'error' => $error   
             ]);
         }
          
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Superheroe  $superheroe
     * @return \Illuminate\Http\Response
     */


     /** @OA\DELETE(
    *     path="/api/superheroes/{superheroe}",
    *     summary="Eliminar un super heroe",
    *     @OA\Response(
    *         response=200,
    *         description="Se eliminó correctamente."
    *     ),
    *     @OA\Response(
    *         response=400,
    *         description="Bad Request"
    *     ),
    *     @OA\Response(
    *         response=401,
    *         description="Unauthorized"
    *     )
    * )
    */
    public function destroy($id)
    {
        try {
            $superheroe = Superheroe::find($id);
            if ($superheroe) {
                $superheroe->delete();
                return response('Se ejecutó correctamente!', 200)->header('Content-Type', 'text/plain');
            }else {
                return response('Bad Request!', 400)->header('Content-Type', 'text/plain');
            }
         } catch (\Exception $error) {
             \Log::info('aquí');
             return response()->json([
              'error' => $error   
             ]);
         }
        
    }
}
