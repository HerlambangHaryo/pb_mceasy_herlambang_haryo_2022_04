<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Jenssegers\Agent\Agent;
use DB;

class DashboardController extends Controller
{
    //
    public $template    = 'studio_v30';
    public $content     = 'Dashboard';

    public function index()
    {
        // ----------------------------------------------------------- Agent
            $agent          = new Agent();

            $additional_view = '';
            
            if($agent->isMobile() == 1)
            {
                $additional_view = '_mobile';
            }

        // ----------------------------------------------------------- Initialize
            $panel_name     = 'Index';
            
            $template       = $this->template;
            $content        = $this->content;
            $active_as      = $content;

            $view_file      = 'table';
            $view           = 'content.'.$this->template.'.backend.'.strtolower($this->content).'.'.$view_file;
            

        // ----------------------------------------------------------- Action
            $data           = array();

        // ----------------------------------------------------------- Send
            return view($view.$additional_view, 
                compact(
                    'data', 
                    'content', 
                    'panel_name', 
                    'active_as', 
                    'view_file', 
                    'template'
                )
            );
        ///////////////////////////////////////////////////////////////
    }
}
