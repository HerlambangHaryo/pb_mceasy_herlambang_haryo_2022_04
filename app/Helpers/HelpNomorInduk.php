<?php 

use App\Models\Employee;

    if(!function_exists('define_nomorinduk'))
    {
        function define_nomorinduk()
        {
            // ----------------------------------------------------------- Initialize
                $isi = ''; 

            // ----------------------------------------------------------- Action  
	            $model = Employee::orderBy('id', 'Desc')->first();

	            $new_id = $model->id + 1;

	            if(strlen($new_id) == 1)
	            {
	            	$isi = 'IP06' .'00'. $new_id;
	            }
	            elseif(strlen($new_id) == 2)
	            {
	            	$isi = 'IP06' .'0'. $new_id;
	            }
	            elseif(strlen($new_id) == 3)
	            {
	            	$isi = 'IP06' . $new_id;
	            }

            // ----------------------------------------------------------- Send
                $word = $isi;
                return $word;

            ///////////////////////////////////////////////////////////////
        }
    }