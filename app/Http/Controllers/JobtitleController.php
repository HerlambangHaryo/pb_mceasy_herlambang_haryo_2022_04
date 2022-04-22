<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Jobtitle;
use Jenssegers\Agent\Agent;
use DB; 
class JobtitleController extends Controller
{
    //
    public $template    = 'studio_v30';
    public $mode        = '';
    public $content     = 'Jobtitle';

    public function index()
    {
        // ----------------------------------------------------------- Auth
            $user = auth()->user();  

        // ----------------------------------------------------------- Agent
            $agent              = new Agent(); 
            $additional_view    = define_additionalview($agent->isMobile());

        // ----------------------------------------------------------- Initialize
            $panel_name     = 'Job title';
            
            $template       = $this->template;
            $mode           = $this->mode;
            $content        = $this->content;
            $active_as      = $content;

            $view_file      = 'data';
            $view           = 'content.'.$this->template.'.backend.'.strtolower($this->content).'.'.$additional_view.'.'.$view_file;

        // ----------------------------------------------------------- Action
            $data           = Jobtitle::get();

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
            $panel_name     = 'Job title';
            
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

            $data = Jobtitle::create([ 
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

    public function edit(Jobtitle $Jobtitle)
    {
        // ----------------------------------------------------------- Auth
            $user = auth()->user();  

        // ----------------------------------------------------------- Agent
            $agent              = new Agent(); 
            $additional_view    = define_additionalview($agent->isMobile());

        // ----------------------------------------------------------- Initialize
            $panel_name     = 'Job title';
            
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
                    'Jobtitle'
                )
            );
        ///////////////////////////////////////////////////////////////
    }

    public function update(Request $request, Jobtitle $Jobtitle)
    {
        // ----------------------------------------------------------- Auth
            $user = auth()->user();  

        // ----------------------------------------------------------- Initialize
            $content        = $this->content;

        // ----------------------------------------------------------- Action
            $this->validate($request, [
                'nama'      => 'required', 
            ]);

            $model = Jobtitle::findOrFail($Jobtitle->id);

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

    public function show(Jobtitle $Jobtitle)
    {
        // ----------------------------------------------------------- Auth
            $user = auth()->user();  

        // ----------------------------------------------------------- Agent
            $agent              = new Agent(); 
            $additional_view    = define_additionalview($agent->isMobile());

        // ----------------------------------------------------------- Initialize
            $panel_name     = 'Job title';
            
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
                    'Jobtitle'
                )
            );
        ///////////////////////////////////////////////////////////////
    }

    public function destroy(Jobtitle $Jobtitle)
    {
        // ----------------------------------------------------------- Auth
            $user = auth()->user();  

        // ----------------------------------------------------------- Initialize
            $content        = $this->content;

        // ----------------------------------------------------------- Action  
            $Jobtitle->delete();

        // ----------------------------------------------------------- Send
            if($Jobtitle)
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
