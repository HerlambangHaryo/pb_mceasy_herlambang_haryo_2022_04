<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Paidleavereason;
use Jenssegers\Agent\Agent; 

class PaidleavereasonsController extends Controller
{
    //
    public $template    = 'studio_v30';
    public $mode        = '';
    public $content     = 'Paidleavereasons';

    public function index()
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

            $view_file      = 'data';
            $view           = 'content.'.$this->template.'.backend.'.strtolower($this->content).'.'.$additional_view.'.'.$view_file;

        // ----------------------------------------------------------- Action
            $data           = Paidleavereason::get();

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
            $panel_name     = 'Paid leave reasons';
            
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

            $data = Paidleavereason::create([ 
                'nama'          => $request->nama 
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

    public function edit(Paidleavereason $Paidleavereason)
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
                    'Paidleavereason'
                )
            );
        ///////////////////////////////////////////////////////////////
    }

    public function update(Request $request, Paidleavereason $Paidleavereason)
    {
        // ----------------------------------------------------------- Auth
            $user = auth()->user();  

        // ----------------------------------------------------------- Initialize
            $content        = $this->content;

        // ----------------------------------------------------------- Action
            $this->validate($request, [
                'nama'      => 'required', 
            ]);

            $model = Paidleavereason::findOrFail($Paidleavereason->id);

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

    public function show(Paidleavereason $Paidleavereason)
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
                    'Paidleavereason'
                )
            );
        ///////////////////////////////////////////////////////////////
    }

    public function destroy(Paidleavereason $Paidleavereason)
    {
        // ----------------------------------------------------------- Auth
            $user = auth()->user();  

        // ----------------------------------------------------------- Initialize
            $content        = $this->content;

        // ----------------------------------------------------------- Action  
            $Paidleavereason->delete();

        // ----------------------------------------------------------- Send
            if($Paidleavereason)
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
}
