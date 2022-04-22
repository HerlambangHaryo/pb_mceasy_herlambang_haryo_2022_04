<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Employee;
use Jenssegers\Agent\Agent; 

class EmployeesController extends Controller
{
    //
    public $template    = 'studio_v30';
    public $mode        = '';
    public $content     = 'Employees';

    public function index()
    {
        // ----------------------------------------------------------- Auth
            $user = auth()->user();  

        // ----------------------------------------------------------- Agent
            $agent              = new Agent(); 
            $additional_view    = define_additionalview($agent->isMobile());

        // ----------------------------------------------------------- Initialize
            $panel_name     = $this->content;
            
            $template       = $this->template;
            $mode           = $this->mode;
            $content        = $this->content;
            $active_as      = $content;

            $view_file      = 'data';
            $view           = 'content.'.$this->template.'.backend.'.strtolower($this->content).'.'.$additional_view.'.'.$view_file;

        // ----------------------------------------------------------- Action
            $data           = Employee::get();

        // ----------------------------------------------------------- Send
            return view($view, 
                compact(
                    'user', 
                    'data', 
                    'content', 
                    'panel_name', 
                    'active_as', 
                    'view_file', 
                    'template',
                    'mode'
                )
            );
        ///////////////////////////////////////////////////////////////
    }

    public function create()
    {
        // ----------------------------------------------------------- Auth
            $user = auth()->user();  

        // ----------------------------------------------------------- Agent
            $agent              = new Agent(); 
            $additional_view    = define_additionalview($agent->isMobile());

        // ----------------------------------------------------------- Initialize
            $panel_name     = $this->content;
            
            $template       = $this->template;
            $mode           = $this->mode;
            $content        = $this->content;
            $active_as      = $content;

            $view_file      = 'create';
            $view           = 'content.'.$this->template.'.backend.'.strtolower($this->content).'.'.$additional_view.'.'.$view_file;

        // ----------------------------------------------------------- Action 

        // ----------------------------------------------------------- Send
            return view($view,  
                compact( 
                    'user', 
                    'content', 
                    'panel_name', 
                    'active_as', 
                    'view_file', 
                    'template',
                    'mode'
                )
            );
        ///////////////////////////////////////////////////////////////
    }

    public function store(Request $request)
    {
        // ----------------------------------------------------------- Auth
            $user = auth()->user();  

        // ----------------------------------------------------------- Initialize
            $content        = $this->content;

        // ----------------------------------------------------------- Action
            $this->validate($request, [
                'nama'          => 'required', 
            ]);


            $data = Employee::create([ 
                'nomor_induk'           => define_nomorinduk(), 
                'nama'                  => $request->nama, 
                'tanggal_lahir'         => $request->tanggal_lahir, 
                'alamat'                => $request->alamat, 
                'kota'                  => $request->kota, 
                'tanggal_bergabung'     => $request->tanggal_bergabung,
                'akumulasi_cuti'        => define_akumulasicuti($request->tanggal_bergabung) 
            ]);

        // ----------------------------------------------------------- Send
            if($data)
            {
                return redirect()
                    ->route($content.'.index')
                    ->with(['Success' => 'Data successfully saved!']);
            }
            else
            {
                return redirect()
                    ->route($content.'.index')
                    ->with(['Error' => 'Data Gagal Disimpan!']);
            }
        ///////////////////////////////////////////////////////////////
    }

    public function edit(Employee $Employee)
    {
        // ----------------------------------------------------------- Auth
            $user = auth()->user();  

        // ----------------------------------------------------------- Agent
            $agent              = new Agent(); 
            $additional_view    = define_additionalview($agent->isMobile());

        // ----------------------------------------------------------- Initialize
            $panel_name     = $this->content;
            
            $template       = $this->template;
            $mode           = $this->mode;
            $content        = $this->content;
            $active_as      = $content;

            $view_file      = 'edit';
            $view           = 'content.'.$this->template.'.backend.'.strtolower($this->content).'.'.$additional_view.'.'.$view_file;

        // ----------------------------------------------------------- Action
        
        // ----------------------------------------------------------- Send
            return view($view,  
                compact(
                    'user', 
                    'content', 
                    'panel_name', 
                    'active_as', 
                    'view_file', 
                    'template',
                    'mode',
                    'Employee'
                )
            );
        ///////////////////////////////////////////////////////////////
    }

    public function update(Request $request, Employee $Employee)
    {
        // ----------------------------------------------------------- Auth
            $user = auth()->user();  

        // ----------------------------------------------------------- Initialize
            $content        = $this->content;

        // ----------------------------------------------------------- Action
            $this->validate($request, [
                'nama'      => 'required', 
            ]);

            $model = Employee::findOrFail($Employee->id);

            $model->update([
                'nama'      => $request->nama 
            ]);

        // ----------------------------------------------------------- Send
            if($model)
            {
                return redirect()
                    ->route($content.'.index')
                    ->with(['Success' => 'Data Berhasil Disimpan!']);
            }else{
                return redirect()
                    ->route($content.'.index')
                    ->with(['error' => 'Data Gagal Disimpan!']);
            }
        ///////////////////////////////////////////////////////////////
    }

    public function show(Employee $Employee)
    {
        // ----------------------------------------------------------- Auth
            $user = auth()->user();  

        // ----------------------------------------------------------- Agent
            $agent              = new Agent(); 
            $additional_view    = define_additionalview($agent->isMobile());

        // ----------------------------------------------------------- Initialize
            $panel_name     = 'Paid leave reasons';
            
            $template       = $this->template;
            $mode           = $this->mode;
            $content        = $this->content;
            $active_as      = $content;

            $view_file      = 'show';
            $view           = 'content.'.$this->template.'.backend.'.strtolower($this->content).'.'.$additional_view.'.'.$view_file;

        // ----------------------------------------------------------- Action

        // ----------------------------------------------------------- Send
            return view($view,  
                compact(
                    'user', 
                    'content', 
                    'panel_name', 
                    'active_as', 
                    'view_file', 
                    'template',
                    'mode',
                    'Employee'
                )
            );
        ///////////////////////////////////////////////////////////////
    }

    public function destroy(Employee $Employee)
    {
        // ----------------------------------------------------------- Auth
            $user = auth()->user();  

        // ----------------------------------------------------------- Initialize
            $content        = $this->content;

        // ----------------------------------------------------------- Action  
            $Employee->delete();

        // ----------------------------------------------------------- Send
            if($Employee)
            {        
                return redirect()
                    ->route($content.'.index')
                    ->with(['Deleted' => 'Data successfully deleted!']);
            }
            else
            {
                return redirect()
                    ->route($content.'.index')
                    ->with(['Error' => 'Data Gagal Disimpan!']);
            }
        ///////////////////////////////////////////////////////////////
    }

    public function Jawabannodua()
    {
        // ----------------------------------------------------------- Auth
            $user = auth()->user();  
            
        // ----------------------------------------------------------- Agent
            $agent              = new Agent(); 
            $additional_view    = define_additionalview($agent->isMobile());

        // ----------------------------------------------------------- Initialize
            $panel_name     = $this->content;
            
            $template       = $this->template;
            $mode           = $this->mode;
            $content        = $this->content;
            $active_as      = $content;

            $view_file      = 'data';
            $view           = 'content.'.$this->template.'.backend.'.strtolower($this->content).'.'.$additional_view.'.'.$view_file;

        // ----------------------------------------------------------- Action
            $data           = Employee::orderby('tanggal_bergabung', 'Asc')
                                ->offset(0)
                                ->limit(3)
                                ->get();

        // ----------------------------------------------------------- Send
            return view($view, 
                compact(
                    'user', 
                    'data', 
                    'content', 
                    'panel_name', 
                    'active_as', 
                    'view_file', 
                    'template',
                    'mode'
                )
            );
        ///////////////////////////////////////////////////////////////
    }
}
