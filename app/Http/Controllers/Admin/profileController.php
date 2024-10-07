<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponse;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin/profile');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // Validação dos dados do formulário
        $validation = Validator::make($request->all(), [
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users,email,'.Auth::user()->id,
            'phone'             => 'required|string|max:255',
            'image'             => 'nullable|mimes:jpeg,png,jpg,gif|max:5120', // 5MB de limite
            'site_link'         => 'nullable|string|max:255',
            'github_link'       => 'nullable|string|max:255',
            'instagram_link'    => 'nullable|string|max:255',

        ]);

        // Verificar se há erros de validação
        if ($validation->fails()) {

            // Verificação adicional para garantir que campos obrigatórios não estejam vazios
            $requiredFields = ['name', 'email', 'phone'];

            foreach ($requiredFields as $field) {
                if (empty($request->$field)) {
                    return $this->error("O campo $field é obrigatório.", 400, []);
                }
            }

            return $this->error($validation->errors()->first(),400,[]);
        }else{
            // Upload da imagem, se houver
            if ($request->hasFile('image')) {
                $image_name = 'images/avatars/'.$request->name.time() . '.' . $request->image->extension();
                $request->image->move(public_path('assets/images/avatars/'), $image_name);
            }else{
                $image_name = Auth::user()->image;
            }
    
            // Atualizar ou criar o perfil do usuário
            $user = User::updateOrCreate(
                ['id' => Auth::user()->id],
                [
                    'name'              => $request->name,
                    'email'             => $request->email,
                    'phone'             => $request->phone,
                    'site_link'         => $request->site_link,
                    'github_link'       => $request->github_link,
                    'instagram_link'    => $request->instagram_link,
                    'image'             => $image_name
                ]
                );
            return $this->success([],'Atualizado com sucesso.');
        }

    }

    // Outros métodos podem ser implementados conforme a necessidade.
}
