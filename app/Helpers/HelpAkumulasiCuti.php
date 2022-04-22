<?php 

    if(!function_exists('define_akumulasicuti'))
    {
        function define_akumulasicuti($year1)
        {
            // ----------------------------------------------------------- Initialize
                $isi = ''; 

            // ----------------------------------------------------------- Action  
				$date1 	= date_create($year1);
				$date2 	= date_create(date('Y-m-d'));
				$diff 	= date_diff($date1,$date2);
				
				$year 	= $diff->format('%y');

				$isi 	= $year * 12;

            // ----------------------------------------------------------- Send
                $word = $isi;
                return $word;

            ///////////////////////////////////////////////////////////////
        }
    }

    if(!function_exists('define_daydiff'))
    {
        function define_daydiff($year1, $year2)
        {
            // ----------------------------------------------------------- Initialize
                $isi = ''; 

            // ----------------------------------------------------------- Action  
                $date1  = date_create($year1);
                $date2  = date_create($year2);
                $diff   = date_diff($date1,$date2);
                
                $day    = $diff->format('%a');

                $isi    = $day ;

            // ----------------------------------------------------------- Send
                $word = $isi;
                return $word;

            ///////////////////////////////////////////////////////////////
        }
    }