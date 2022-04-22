<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Employee;
use App\Models\Paidleave;
use App\Models\Paidleavereason;
use Jenssegers\Agent\Agent; 

use DB;

class PaidleaveController extends Controller
{
    //
    public $template    = 'studio_v30';
    public $mode        = '';
    public $content     = 'Paidleave';

    public function index()
    {
        // ----------------------------------------------------------- Auth
            $user = auth()->user();  

        // ----------------------------------------------------------- Agent
            $agent              = new Agent(); 
            $additional_view    = define_additionalview($agent->isMobile());

        // ----------------------------------------------------------- Initialize 
            $panel_name     = 'Paid leave';
            
            $template       = $this->template;
            $mode           = $this->mode;
            $content        = $this->content;
            $active_as      = $content;

            $view_file      = 'data';
            $view           = 'content.'.$this->template.'.backend.'.strtolower($this->content).'.'.$additional_view.'.'.$view_file;

        // ----------------------------------------------------------- Action
            $data           = Paidleave::get();

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
            $panel_name     = 'Paid leave';
            
            $template       = $this->template;
            $mode           = $this->mode;
            $content        = $this->content;
            $active_as      = $content;

            $view_file      = 'create';
            $view           = 'content.'.$this->template.'.backend.'.strtolower($this->content).'.'.$additional_view.'.'.$view_file;

        // ----------------------------------------------------------- Action 
            $model_Paidleavereason  = Paidleavereason::orderby('nama', 'asc')
                                        ->get();

            $model_Employee         = Employee::where('user_id', $user->id)
                                            ->first();

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
                    'model_Paidleavereason',
                    'model_Employee'
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
                'tanggal_awal'          => 'required', 
                'tanggal_akhir'         => 'required',
                'paidleavereason_id'    => 'required',
            ]);
 
            $data = Paidleave::create([ 
                'employee_id'           => $user->id, 
                'tanggal_awal'          => $request->tanggal_awal, 
                'tanggal_akhir'         => $request->tanggal_akhir, 
                'lama_cuti'             => define_daydiff($request->tanggal_awal, $request->tanggal_akhir), 
                'paidleavereason_id'    => $request->paidleavereason_id, 
                'keterangan'            => $request->keterangan 
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

    public function edit(Paidleave $Paidleave)
    {
        // ----------------------------------------------------------- Auth
            $user = auth()->user();  

        // ----------------------------------------------------------- Agent
            $agent              = new Agent(); 
            $additional_view    = define_additionalview($agent->isMobile());

        // ----------------------------------------------------------- Initialize
            $panel_name     = 'Paid leave';
            
            $template       = $this->template;
            $mode           = $this->mode;
            $content        = $this->content;
            $active_as      = $content;

            $view_file      = 'edit';
            $view           = 'content.'.$this->template.'.backend.'.strtolower($this->content).'.'.$additional_view.'.'.$view_file;

        // ----------------------------------------------------------- Action
            $model_Paidleavereason  = Paidleavereason::orderby('nama', 'asc')
                                        ->get();

            $model_Employee         = Employee::where('user_id', $Paidleave->employee_id)
                                            ->first();
        
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
                    'Paidleave',
                    'model_Paidleavereason',
                    'model_Employee'
                )
            );
        ///////////////////////////////////////////////////////////////
    }

    public function update(Request $request, Paidleave $Paidleave)
    {
        // ----------------------------------------------------------- Auth
            $user = auth()->user();  

        // ----------------------------------------------------------- Initialize
            $content        = $this->content;

        // ----------------------------------------------------------- Action
            $this->validate($request, [
                'tanggal_awal'          => 'required', 
                'tanggal_akhir'         => 'required',
                'paidleavereason_id'    => 'required',
            ]);

            $model = Paidleave::findOrFail($Paidleave->id);

            $model->update([
                'tanggal_awal'          => $request->tanggal_awal, 
                'tanggal_akhir'         => $request->tanggal_akhir, 
                'lama_cuti'             => define_daydiff($request->tanggal_awal, $request->tanggal_akhir), 
                'paidleavereason_id'    => $request->paidleavereason_id, 
                'keterangan'            => $request->keterangan 
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

    public function show(Paidleave $Paidleave)
    {
        // ----------------------------------------------------------- Auth
            $user = auth()->user();  

        // ----------------------------------------------------------- Agent
            $agent              = new Agent(); 
            $additional_view    = define_additionalview($agent->isMobile());

        // ----------------------------------------------------------- Initialize
            $panel_name     = 'Paid leave';
            
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
                    'Paidleave'
                )
            );
        ///////////////////////////////////////////////////////////////
    }

    public function destroy(Paidleave $Paidleave)
    {
        // ----------------------------------------------------------- Auth
            $user = auth()->user();  

        // ----------------------------------------------------------- Initialize
            $content        = $this->content;

        // ----------------------------------------------------------- Action  
            $Paidleave->delete();

        // ----------------------------------------------------------- Send
            if($Paidleave)
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


    public function Jawabannoempat ()
    {
        // ----------------------------------------------------------- Auth
            $user = auth()->user();  

        // ----------------------------------------------------------- Agent
            $agent              = new Agent(); 
            $additional_view    = define_additionalview($agent->isMobile());

        // ----------------------------------------------------------- Initialize 
            $panel_name     = 'Paid leave';
            
            $template       = $this->template;
            $mode           = $this->mode;
            $content        = $this->content;
            $active_as      = $content;

            $view_file      = 'data';
            $view           = 'content.'.$this->template.'.backend.'.strtolower($this->content).'.'.$additional_view.'.'.$view_file;

        // ----------------------------------------------------------- Action
            $pre_data       = Paidleave::select('employee_id')
                                ->groupby('employee_id')
                                ->having(DB::raw('count(*)'), '>', 1)
                                ->get(); 

            $data           = Paidleave::whereIn('employee_id', $pre_data)
                                ->get();

                                //->selectRaw('query,count(*) as count')->groupBy('query')->havingRaw('count(*) > 3')->orderBy('query', 'DESC')->paginate(15);

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
