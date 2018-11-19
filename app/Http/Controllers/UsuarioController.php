<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UsuarioController extends Controller
{
    //
    
    
    public function login(Request $request)
    {
        
        try{
            
            if($request->has('correo') || $request->has('contraseña'))
            {
                
                $correo = $request->get('correo');
                $contraseña = $request->get('contraseña');
                
                $usuario = Usuario::where('correo',$correo)
                            ->where('contraseña',$contraseña)
                            ->first();
                
                
                if($usuario == null)
                {
                    return response()->json(['type' => 'error', 'message' => 'No existe usuario'], 500);
                }else
                {
                    return $usuario;
                }
                
            }
            
            
            
        }catch(\Exception $e1){
            
            return response()->json(['type' => 'error', 'message' => $e1->getMessage()], 500);
            
        }
                
    }

    
    public function registro(Request $request)
    {
        
        try{
            if(!$request->has('nombres') || !$request->has('correo') || !$request->has('contraseña') || !$request->has('tipoUsuario') )
            {
                throw new \Exception('Se esperaba campos mandatorios');
            }
            
            $usuario =  new Usuario();
            $usuario->nombres = $request->get('nombres');
            $usuario->correo = $request->get('correo');
            $usuario->contraseña = $request->get('contraseña');
            $usuario->tipoUsuario = $request->get('tipoUsuario');
            
            $usuario->save();
            
            return response()->json(['type'=>'success','message'=>'Registro Completo'],200);
            
        }catch(\Exception $e)
        {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
    
}
